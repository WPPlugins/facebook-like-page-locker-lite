<div class="flpl-tab-content-wrap" id="flpl-tab-locker-settings">
    <div class="flpl-field-wrap">
        <label><?php _e( 'Enable Locker', FLPLL_TD ); ?></label>
        <div class="flpl-field">
            <label><input type="checkbox" name="flpll_settings[locker_settings][enable_locker]" value="1" <?php checked( $flpll_settings[ 'locker_settings' ][ 'enable_locker' ], true ); ?>/><span class="flpl-field-sidenote"><?php _e( 'Check if you want to activate the locker', FLPLL_TD ); ?></span></label>
        </div>
    </div>
    <div class="flpl-field-wrap">
        <label><?php _e( 'Locker Title', FLPLL_TD ); ?></label>
        <div class="flpl-field">
            <input type="text" name="flpll_settings[locker_settings][locker_title]" value="<?php echo isset( $flpll_settings[ 'locker_settings' ][ 'locker_title' ] ) ? esc_attr( $flpll_settings[ 'locker_settings' ][ 'locker_title' ] ) : ''; ?>" placeholder="<?php _e('Like our fan page',FLPLL_TD);?>"/>
            
        </div>
    </div>
    <div class="flpl-field-wrap">
        <label><?php _e( 'Facebook App ID', FLPLL_TD ); ?></label>
        <div class="flpl-field">
            <input type="text" name="flpll_settings[locker_settings][facebook_app_id]" value="<?php echo isset( $flpll_settings[ 'locker_settings' ][ 'facebook_app_id' ] ) ? esc_attr( $flpll_settings[ 'locker_settings' ][ 'facebook_app_id' ] ) : ''; ?>"/>
            <div class="flpl-field-note">
                <?php _e( 'Please go <a href="https://developers.facebook.com/" target="_blank">here</a> and create an App with website platform and get the App ID.', FLPLL_TD ) ?>
            </div>
        </div>
    </div>

    <div class="flpl-field-wrap">
        <label><?php _e( 'Enable Locker Countdown', FLPLL_TD ); ?></label>
        <div class="flpl-field">
            <?php $locker_countdown = isset( $flpll_settings[ 'locker_settings' ][ 'locker_countdown' ] ) ? 1 : 0; ?>
            <label><input type="checkbox" name="flpll_settings[locker_settings][locker_countdown]" value="1" <?php checked( $locker_countdown, 1 ); ?>/><span class="flpl-field-sidenote"><?php _e( 'Check if you want to activate the locker to be unlocked after certain time.', FLPLL_TD ); ?></span></label>
            <div class="flpl-field-note"><?php _e( 'Note: If you uncheck this option, locker won\'t be unlocked unless the users likes the page.' ) ?></div>
        </div>
    </div>
    <div class="flpl-field-wrap">
        <label><?php _e( 'Time in seconds', FLPLL_TD ); ?></label>
        <div class="flpl-field">
            <input type="text" name="flpll_settings[locker_settings][timer]" placeholder="60" value="<?php echo isset( $flpll_settings[ 'locker_settings' ][ 'timer' ] ) ? esc_attr( $flpll_settings[ 'locker_settings' ][ 'timer' ] ) : ''; ?>"/>
            <div class="flpl-field-note"><?php _e( 'Please give time in seconds till when you want the locker to show in the page.', FLPLL_TD ); ?></div>
        </div>
    </div>
    <div class="flpl-field-wrap">
        <label><?php _e( 'Countdown message', FLPLL_TD ); ?></label>
        <div class="flpl-field">
            <textarea name="flpll_settings[locker_settings][countdown_message]" rows="5" placeholder="<?php _e( 'Or wait #countdown seconds', FLPLL_TD ); ?>"><?php echo (isset( $flpll_settings[ 'locker_settings' ][ 'countdown_message' ] ) && $flpll_settings[ 'locker_settings' ][ 'countdown_message' ] != '' ) ? esc_attr( $flpll_settings[ 'locker_settings' ][ 'countdown_message' ] ) : __( 'Or wait #countdown seconds', FLPLL_TD ); ?></textarea>
            <div class="flpl-field-note"><?php _e( 'Please use #countdown where you want to display the seconds countdown in the message.', FLPLL_TD ); ?></div>
        </div>
    </div>

    <div class="flpl-field-wrap">
        <label><?php _e( 'Unlock Message', FLPLL_TD ); ?></label>
        <div class="flpl-field">
            <input type="text" name="flpll_settings[locker_settings][unlock_message]" placeholder="<?php _e( 'Please like our page to unlock the page content.', FLPLL_TD ); ?>" value="<?php echo isset( $flpll_settings[ 'locker_settings' ][ 'unlock_message' ] ) ? esc_attr( $flpll_settings[ 'locker_settings' ][ 'unlock_message' ] ) : ''; ?>"/>
            <div class="flpl-field-note"><?php _e( 'This message will be displayed below the like box/button if you disable the countdown.', FLPLL_TD ); ?></div>
        </div>
    </div>
    <div class="flpl-field-wrap">
        <label><?php _e( 'Enable Close Action', FLPLL_TD ); ?></label>
        <div class="flpl-field">
            <?php $close_action = isset( $flpll_settings[ 'locker_settings' ][ 'close_action' ] ) ? esc_attr( $flpll_settings[ 'locker_settings' ][ 'close_action' ] ) : 0; ?>
            <label><input type="checkbox" name="flpll_settings[locker_settings][close_action]" value="1" <?php checked( $close_action, true ); ?>/><span class="flpl-field-sidenote"><?php _e( 'Check if you want users to be able to close the locker by clicking close button or on outer overlay.', FLPLL_TD ); ?></span></label>
        </div>
    </div>
    <div class="flpl-field-wrap">
        <label><?php _e( 'Show Locker on:', FLPLL_TD ); ?></label>
        <div class="flpl-field">
            <label class="flpl-block"><input type="radio" name="flpll_settings[locker_settings][enable_locker_type]" value="all" class="flpl-enable-locker-type" <?php checked( $flpll_settings[ 'locker_settings' ][ 'enable_locker_type' ], 'all' ); ?>/><?php _e( 'All post types', FLPLL_TD ); ?></label>
            <label class="flpl-block"><input type="radio" name="flpll_settings[locker_settings][enable_locker_type]" value="certain" class="flpl-enable-locker-type" <?php checked( $flpll_settings[ 'locker_settings' ][ 'enable_locker_type' ], 'certain' ); ?>/><?php _e( 'Certain post types', FLPLL_TD ); ?></label>
            <div class="flpl-sub-field flpl-locker-post-types">
                <?php
                $post_types = $this->get_registered_post_types();

                foreach ( $post_types as $post_type => $post_type_label ) {
                    ?>
                    <label class="flpl-block">
                        <input type="checkbox" name="flpll_settings[locker_settings][show_locker_on][]" value="<?php echo $post_type; ?>" <?php if ( $flpll_settings[ 'locker_settings' ][ 'enable_locker_type' ] != 'certain' ) { ?>disabled="disabled"<?php } ?> <?php if ( in_array( $post_type, $flpll_settings[ 'locker_settings' ][ 'show_locker_on' ] ) ) {
                    echo "checked='checked'";
                } ?>/>
                        <span class="flpl-checkbox-trigger"><?php echo $post_type_label; ?></span>
                    </label>
                    <?php
                }
                ?>
            </div>

        </div>

    </div>
    <div class="flpl-field-wrap">
        <label><?php _e( 'Disable Locker for logged in users', FLPLL_TD ); ?></label>
        <div class="flpl-field">
            <label>
                <input type="checkbox" name="flpll_settings[locker_settings][disable_for_admin]" value="1" <?php if(isset($flpll_settings[ 'locker_settings' ][ 'disable_for_admin' ])){ checked( $flpll_settings[ 'locker_settings' ][ 'disable_for_admin' ], true ); }?>/>
            </label>
        </div>
    </div>
    <?php do_action( 'flpll_locker_settings',$flpll_settings);?>
</div>

