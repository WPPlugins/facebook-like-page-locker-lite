<div class="wrap">
    <div class="flpl-header">
        <div class="flpl-title"><?php _e( 'Facebook Like Page Locker Lite', FLPLL_TD ); ?></div>
    </div>
    <h2 class="nav-tab-wrapper flpl-nav-wrapper">
        <a href="javascript:void(0);" class="nav-tab nav-tab-active flpl-nav" data-tab="locker-settings"><?php _e( 'Locker Settings', FLPLL_TD ); ?></a>
        <a href="javascript:void(0);" class="nav-tab flpl-nav" data-tab="like-settings"><?php _e( 'Like Settings', FLPLL_TD ); ?></a>
        <a href="javascript:void(0);" class="nav-tab flpl-nav" data-tab="upgrade-settings"><?php _e( 'Upgrade', FLPLL_TD ); ?></a>
        <a href="javascript:void(0);" class="nav-tab flpl-nav" data-tab="about-us-settings"><?php _e( 'About Us', FLPLL_TD ); ?></a>
    </h2>
    <?php
    if ( isset( $_GET[ 'success' ] ) ) {
        $message = (isset( $_GET[ 'msg' ] ) && $_GET[ 'msg' ] == 1) ? __( 'Settings saved', FLPLL_TD ) : __( 'Default settings restored successfully', FLPLL_TD );
        ?>
        <div class="notice notice-success is-dismissible flpl-success-message">
            <p><?php echo $message; ?></p>
        </div>
        <?php
    }
    ?>
    <div class="flpl-add-wrap">
        <form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>">
            <input type="hidden" name="action" value="flpll_locker_save_action"/>

            <?php wp_nonce_field( 'flpll-locker-save-nonce', 'flpll_locker_nonce_field' ); ?>
            <?php
            $flpll_settings = get_option( 'flpll_settings' );
            //$this->print_array( $flpll_settings );
            /**
             * Locker settings
             */
            include_once(FLPLL_PATH . '/inc/backend/tabs/locker-settings.php');

            /**
             * Like settings
             */
            include_once(FLPLL_PATH . '/inc/backend/tabs/like-settings.php');

            /**
             * Upgrade 
             */
            include_once FLPLL_PATH . '/inc/backend/tabs/upgrade.php';
            
            /**
             * About Us 
             */
            include_once FLPLL_PATH . '/inc/backend/tabs/about-us.php';
            ?>

            <div class="flpl-field-wrap">
                <div class="flpl-field">
                    <input type="submit" name="save_settings" value="<?php _e( 'Save Settings', FLPLL_TD ); ?>" class="button-primary"/>
                    <?php $restore_nonce = wp_create_nonce( 'flpll-restore-nonce' ); ?>
                    <a href="<?php echo admin_url( 'admin-post.php?action=flpll_restore_settings&_wpnonce=' . $restore_nonce ); ?>" onclick="return confirm('<?php _e( 'Are you sure you want to restore default settings?', FLPLL_TD ); ?>')"><input type="button" value="<?php _e( 'Restore Default Settings', FLPLL_TD ); ?>" class="button-primary"/></a>
                </div>
            </div>
        </form>
    </div>
    <div class="flpll-sidebar-box">
        <div class="flpll-sidebar-box-inner">
            <h4><?php _e( 'Any queries or need help?' ) ?></h4>
            <a href="https://wordpress.org/support/plugin/facebook-like-page-locker-lite" target="_blank"><?php _e( 'Our Support Forum', FLPLL_TD ); ?></a>
            <h4>
                <?php _e( 'Liked our plugin?', FLPLL_TD ); ?>
            </h4>
            <a href="https://wordpress.org/support/view/plugin-reviews/facebook-like-page-locker-lite" target="_blank"><?php _e( 'Give us rating', FLPLL_TD ); ?></a>

            <h4><?php _e( "Like us on facebook", FLPLL_TD ); ?></h4>
            <div id="fb-root"></div>
            <script>(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-like" data-href="https://www.facebook.com/wphappycoders" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
        </div>
        <div class="flpll-sidebar-box-inner">
            <h4><?php _e( 'Upgrade to PRO' ) ?></h4>
            <p class="flpll-price"><strong>Price: </strong>18 USD</p>
            <ul>
                <li><?php _e( 'Unlimited Lockers', FLPLL_TD ); ?></li>
                <li><?php _e( 'Pagewise Locker', FLPLL_TD ); ?></li>
                <li><?php _e( 'IP Based Unlock', FLPLL_TD ); ?></li>
                <li><?php _e( 'Locker Layout Designer', FLPLL_TD ); ?></li>
                <li><?php _e( 'Multiple Locker Layouts', FLPLL_TD ); ?></li>
                <li><?php _e( 'And many more', FLPLL_TD ); ?></li>
            </ul>

            <a href="http://codecanyon.net/item/facebook-like-page-locker/13791824?ref=wphappycoders" target="_blank"><input type="button" class="button-primary" value="<?php _e( 'Buy Now', FLPLL_TD ); ?>"/></a>
            <a href="http://wphappycoders.com/demo/facebook-like-page-locker" target="_blank"><input type="button" class="button-primary" value="<?php _e( 'Check Demo', FLPLL_TD ); ?>"/></a>
        </div>
    </div>
</div>