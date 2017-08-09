<?php

defined('ABSPATH') or die('No script kiddies please!');

/*
  Plugin Name: Facebook Like Page Locker Lite
  Plugin URI:  http://wphappycoders.com/demo/facebook-like-page-locker-lite/
  Description: A simple wordpress plugin to lock your page till someone likes your facebook page
  Version:     1.0.3
  Author:      WP Happy Coders
  Author URI:  http://wphappycoders.com
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages
  Text Domain: facebook-like-page-locker-lite
 */

/**
 * Necessary constants define
 * */
global $wpdb;
defined('FLPLL_VERSION') or define('FLPLL_VERSION', '1.0.3');
defined('FLPLL_IMG_DIR') or define('FLPLL_IMG_DIR', plugin_dir_url(__FILE__) . 'images');
defined('FLPLL_CSS_DIR') or define('FLPLL_CSS_DIR', plugin_dir_url(__FILE__) . 'css');
defined('FLPLL_JS_DIR') or define('FLPLL_JS_DIR', plugin_dir_url(__FILE__) . 'js');
defined('FLPLL_PATH')or define('FLPLL_PATH', plugin_dir_path(__FILE__));
defined('FLPLL_TD') or define('FLPLL_TD', 'fb-like-page-locker-lite');

if (!class_exists('FLPLL_Class')) {

    class FLPLL_Class {

        /**
         * Plugin's all necessary hooks
         */
        function __construct() {
            add_action('init', array($this, 'flpll_init')); // Fired when init hook is executed
            add_action('admin_menu', array($this, 'flpll_menu')); //Adds plugin menu in the wp-admin
            add_action('admin_enqueue_scripts', array($this, 'register_admin_assets')); //registers js and css for admin
            add_action('wp_enqueue_scripts', array($this, 'register_front_assets')); //registers js and css for frontend
            register_activation_hook(__FILE__, array($this, 'activation_tasks')); //performs all the activation related tasks
            add_action('admin_post_flpll_locker_save_action', array($this, 'locker_save_action')); //saves settings in the database
            add_action('admin_post_flpll_restore_settings', array($this, 'restore_default_settings')); //saves settings in the database
            register_activation_hook(__FILE__, array($this, 'run_activation_tasks'));
            add_action('wp_footer', array($this, 'front_locker')); // front locker
            /**
             * Set Cookie after like is clicked
             */
            add_action('wp_ajax_flpl_ajax_action', array($this, 'flpl_ajax_action'));
            add_action('wp_ajax_nopriv_flpl_ajax_action', array($this, 'flpl_ajax_action'));
        }

        function flpll_init() {
            if (!session_id() && !headers_sent()) {
                session_start();
            }
            load_plugin_textdomain(FLPLL_TD, false, basename(dirname(__FILE__)) . '/languages');
            do_action('flpll_init');
        }

        function activation_tasks() {
            include(FLPLL_PATH . '/inc/cores/activation.php');
        }

        /**
         * Add plugin menu in the wordpress admin
         */
        function flpll_menu() {
            add_menu_page(__('FB Like Locker Lite', FLPLL_TD), __('Facebook Like Locker Lite', FLPLL_TD), 'manage_options', 'flpll', array($this, 'plugin_main_page'), 'dashicons-facebook');
        }

        /**
         * Plugin main page
         */
        function plugin_main_page() {
            include_once(FLPLL_PATH . '/inc/backend/settings.php');
        }

        /**
         * Register JS and CSS for admin
         */
        function register_admin_assets() {
            if (isset($_GET['page']) && $_GET['page'] == 'flpll') {

                $admin_js_variable = array('ajax_nonce' => wp_create_nonce('flpl-admin-nonce'), 'admin_ajax_url' => admin_url('admin-ajax.php'));
                wp_enqueue_script('flpl-admin-js', FLPLL_JS_DIR . '/backend.js', array('jquery'), FLPLL_VERSION);
                wp_enqueue_style('flpl-admin-css', FLPLL_CSS_DIR . '/backend.css', array(), FLPLL_VERSION);
                wp_localize_script('flpl-admin-js', 'flpl_js_object', $admin_js_variable);
            }
        }

        /**
         * Registers Frontend Assets
         */
        function register_front_assets() {
            $flpl_js_obj = array('ajax_url' => admin_url('admin-ajax.php'), 'ajax_nonce' => wp_create_nonce('flpl-ajax-nonce'));
            wp_enqueue_script('flpl-front-js', FLPLL_JS_DIR . '/frontend.js', array('jquery'), FLPLL_VERSION, true);
            wp_enqueue_style('flpl-front-css', FLPLL_CSS_DIR . '/frontend.css', array(), FLPLL_VERSION);
            wp_localize_script('flpl-front-js', 'flpl_js_obj', $flpl_js_obj);
        }

        /**
         * Returns all the registered post types
         * @return array $post_types_array
         */
        function get_registered_post_types() {
            $post_types = get_post_types(array('public' => true));
            unset($post_types['attachment']);
            $post_types_array = array();
            foreach ($post_types as $post_type) {
                $post_type_object = get_post_type_object($post_type);
                $post_types_array[$post_type] = $post_type_object->labels->singular_name;
            }

            return $post_types_array;
        }

        /**
         * Saves settings to database
         */
        function locker_save_action() {
            if (isset($_POST['flpll_locker_nonce_field']) && wp_verify_nonce($_POST['flpll_locker_nonce_field'], 'flpll-locker-save-nonce')) {
                include(FLPLL_PATH . '/inc/cores/save-settings.php');
            } else {
                die('No script kiddies please!!');
            }
        }

        /**
         * Prints array in pre format
         */
        function print_array($array) {
            echo "<pre style='background-color:#fff;'>";
            print_r($array);
            echo "</pre>";
        }

        /**
         * Sanitizes multidemnsional array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 2.0.0
         */
        function sanitize_array($array = array(), $sanitize_rule = array()) {
            if (!is_array($array) || count($array) == 0) {
                return array();
            }

            foreach ($array as $k => $v) {
                if (!is_array($v)) {

                    $default_sanitize_rule = 'text';
                    $sanitize_type = isset($sanitize_rule[$k]) ? $sanitize_rule[$k] : $default_sanitize_rule;
                    $array[$k] = $this->nb_sanitize_value($v, $sanitize_type);
                }
                if (is_array($v)) {
                    $array[$k] = $this->sanitize_array($v, $sanitize_rule);
                }
            }

            return $array;
        }

        function nb_sanitize_value($value = '', $sanitize_type = 'text') {
            switch ($sanitize_type) {
                case 'html':
                    $allowed_html = array(
                        'a' => array(
                            'href' => array(),
                            'title' => array(),
                            'target' => array()
                        ),
                        'br' => array(),
                        'em' => array(),
                        'strong' => array(),
                        'button' => array()
                    );
                    return wp_kses($value, $allowed_html);
                    break;
                default:
                    return sanitize_text_field($value);
                    break;
            }
        }

        function get_default_settings() {
            $flpll_settings = array
                (
                'locker_settings' => array
                    (
                    'enable_locker' => 0,
                    'facebook_app_id' => '',
                    'timer' => '',
                    'countdown_message' => 'Or wait #countdown seconds',
                    'unlock_message' => '',
                    'close_action' => 0,
                    'enable_locker_type' => 'all',
                    'show_locker_on' => array(),
                    'disable_for_admin' => 0
                ),
                'like_settings' => array
                    (
                    'like_type' => 'like_box',
                    'like_box' => array
                        (
                        'facebook_page_url' => '',
                        'facebook_page_name' => '',
                        'width' => '',
                        'height' => '',
                        'small_header' => 0,
                        'hide_cover_photo' => 0,
                        'show_friends_faces' => 0,
                        'show_page_posts' => 0
                    ),
                    'like_button' => array
                        (
                        'url_to_like' => '',
                        'layout' => 'standard'
                    ),
                )
            );
            return $flpll_settings;
        }

        function restore_default_settings() {
            if (isset($_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce'], 'flpll-restore-nonce')) {
                $default_settings = $this->get_default_settings();
                update_option('flpll_settings', $default_settings);
                wp_redirect(admin_url('admin.php?page=flpll&success=1&msg=2'));
            } else {
                die('No script kiddies please!!');
            }
        }

        function run_activation_tasks() {
            include(FLPLL_PATH . '/inc/cores/activation.php');
        }

        /**
         * Front Locker
         */
        function front_locker() {
            include(FLPLL_PATH . '/inc/frontend/front-locker.php');
        }

        /**
         * Frontend Ajax Action
         */
        function flpl_ajax_action() {
            if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'flpl-ajax-nonce')) {

                $cookie_name = "flpl_like_flag";
                $cookie_value = "1";
                setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
                die('success');
            } else {
                die('No script kiddies please!');
            }
        }

    }

    $flpll_obj = new FLPLL_Class();
}