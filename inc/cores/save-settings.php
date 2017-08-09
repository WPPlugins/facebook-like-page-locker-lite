<?php
/**
 * [action] => flpll_locker_save_action
    [flpll_locker_nonce_field] => 071db8b265
    [_wp_http_referer] => /facebook-like-page-locker-lite/wp-admin/admin.php?page=flpll
    [enable_locker] => 1
    [flpll_settings] => Array
        (
            [locker_settings] => Array
                (
                    [facebook_app_id] => 
                    [locker_countdown] => 1
                    [timer] => 
                    [countdown_message] => Or wait #countdown seconds
                    [unlock_message] => 
                    [close_action] => 1
                )

            [like_settings] => Array
                (
                    [like_type] => like_box
                    [like_box] => Array
                        (
                            [facebook_page_url] => 
                            [facebook_page_name] => 
                            [width] => 
                            [height] => 
                            [small_header] => 1
                            [hide_cover_photo] => 1
                            [show_friends_faces] => 1
                            [show_page_posts] => 1
                        )

                    [like_button] => Array
                        (
                            [url_to_like] => 
                            [layout] => standard
                        )

                )

        )

    [flpl_settings] => Array
        (
            [enable_locker_type] => certain
            [show_locker_on] => Array
                (
                    [0] => post
                    [1] => page
                )

            [disable_for_admin] => 1
        )

    [save_settings] => Save Settings
 */
//$this->print_array($_POST);
$flpll_settings = $this->sanitize_array($_POST['flpll_settings']);
$flpll_settings = apply_filters('flpll_settings_array',$flpll_settings);
update_option('flpll_settings',$flpll_settings);
wp_redirect(admin_url('admin.php?page=flpll&success=1&msg=1'));
