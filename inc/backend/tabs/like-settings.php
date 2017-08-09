<div class="flpl-tab-content-wrap"  id="flpl-tab-like-settings" style="display:none;">
    <div class="flpl-like-settings-wrap">
        <div class="flpl-field-wrap">
            <label><?php _e( 'Like Type', FLPLL_TD ); ?></label>
            <div class="flpl-field">
                <?php
                $like_type = isset( $flpll_settings['like_settings'][ 'like_type' ] ) ? $flpll_settings['like_settings'][ 'like_type' ] : 'like_box';
                ?>
                <label><input type="radio" name="flpll_settings[like_settings][like_type]" value="like_box" <?php checked( $like_type, 'like_box' ); ?> class="flpl-like-type"/><span class="flpl-radio-label"><?php _e( 'Like Box', FLPLL_TD ); ?></span></label>
                <label><input type="radio" name="flpll_settings[like_settings][like_type]" value="like_button" <?php checked( $like_type, 'like_button' ); ?> class="flpl-like-type"/><span class="flpl-radio-label"><?php _e( 'Like Button', FLPLL_TD ); ?></span></label>
            </div>
        </div>
        <div class="flpl-like-box-ref" <?php if ( $like_type != 'like_box' ) { ?>style="display:none;"<?php } ?>>
            <div class="flpl-field-wrap">
                <label><?php _e( 'Facebook Page URL', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <input type="text" name="flpll_settings[like_settings][like_box][facebook_page_url]" placeholder="https://www.facebook.com/facebook" value="<?php echo isset( $flpll_settings['like_settings'][ 'like_box' ][ 'facebook_page_url' ] ) ? esc_url( $flpll_settings['like_settings'][ 'like_box' ][ 'facebook_page_url' ] ) : ''; ?>"/>
                </div>
            </div>
            <div class="flpl-field-wrap">
                <label><?php _e( 'Facebook Page Name', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <input type="text" name="flpll_settings[like_settings][like_box][facebook_page_name]" placeholder="Facebook" value="<?php echo isset( $flpll_settings['like_settings'][ 'like_box' ][ 'facebook_page_name' ] ) ? esc_attr( $flpll_settings['like_settings'][ 'like_box' ][ 'facebook_page_name' ] ) : ''; ?>"/>
                </div>
            </div>
            <div class="flpl-field-wrap">
                <label><?php _e( 'Width', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <input type="text" name="flpll_settings[like_settings][like_box][width]" placeholder="<?php _e( 'The pixel width of the embed (Min. 180 to Max. 500)', FLPLL_TD ) ?>" value="<?php echo isset( $flpll_settings['like_settings'][ 'like_box' ][ 'width' ] ) ? esc_attr( $flpll_settings['like_settings'][ 'like_box' ][ 'width' ] ) : ''; ?>"/>
                </div>
            </div>
            <div class="flpl-field-wrap">
                <label><?php _e( 'Height', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <input type="text" name="flpll_settings[like_settings][like_box][height]" placeholder="<?php _e( 'The pixel height of the embed (Min. 70)', FLPLL_TD ) ?>"  value="<?php echo isset( $flpll_settings['like_settings'][ 'like_box' ][ 'height' ] ) ? esc_attr( $flpll_settings['like_settings'][ 'like_box' ][ 'height' ] ) : ''; ?>"/>
                </div>
            </div>
            <div class="flpl-field-wrap">
                <label><?php _e( 'Use Small Header', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <?php $small_header = (isset( $flpll_settings['like_settings'][ 'like_box' ][ 'small_header' ] )) ? $flpll_settings['like_settings'][ 'like_box' ][ 'small_header' ] : 0; ?>
                    <label><input type="checkbox" name="flpll_settings[like_settings][like_box][small_header]" value="1" <?php checked( $small_header, true ); ?>/><span class="flpl-field-sidenote"><?php _e( 'Check if you want to use small header for the likebox.', FLPLL_TD ); ?></span></label>
                </div>
            </div>
            <div class="flpl-field-wrap">
                <label><?php _e( 'Hide Cover Photo', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <?php $hide_cover_photo = (isset( $flpll_settings['like_settings'][ 'like_box' ][ 'hide_cover_photo' ] )) ? $flpll_settings['like_settings'][ 'like_box' ][ 'hide_cover_photo' ] : 0; ?>
                    <label><input type="checkbox" name="flpll_settings[like_settings][like_box][hide_cover_photo]" value="1" <?php checked( $hide_cover_photo, true ); ?>/><span class="flpl-field-sidenote"><?php _e( 'Check if you want to hide your FB page\'s cover photo.', FLPLL_TD ); ?></span></label>
                </div>
            </div>
            <div class="flpl-field-wrap">
                <label><?php _e( 'Show Friend\'s Faces', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <?php $show_friends_faces = (isset( $flpll_settings['like_settings'][ 'like_box' ][ 'show_friends_faces' ] )) ? $flpll_settings['like_settings'][ 'like_box' ][ 'show_friends_faces' ] : 0; ?>
                    <label><input type="checkbox" name="flpll_settings[like_settings][like_box][show_friends_faces]" value="1" <?php checked( $show_friends_faces, true ); ?>/><span class="flpl-field-sidenote"><?php _e( 'Check if you want to show faces of likes people.', FLPLL_TD ); ?></span></label>
                </div>
            </div>
            <div class="flpl-field-wrap">
                <label><?php _e( 'Show Page Posts', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <?php $show_page_posts = (isset( $flpll_settings['like_settings'][ 'like_box' ][ 'show_page_posts' ] )) ? $flpll_settings['like_settings'][ 'like_box' ][ 'show_page_posts' ] : 0; ?>
                    <label><input type="checkbox" name="flpll_settings[like_settings][like_box][show_page_posts]" <?php checked( $show_page_posts, true ); ?> value="1"/><span class="flpl-field-sidenote"><?php _e( 'Check if you want to show the posts of the pages.', FLPLL_TD ); ?></span></label>
                </div>

            </div>
            <?php do_action( 'flpll_like_box_ref',$flpll_settings);?>
        </div>
        <div class="flpl-like-button-ref"  <?php if ( $like_type != 'like_button' ) { ?>style="display:none;"<?php } ?>>
            <div class="flpl-field-wrap">
                <label><?php _e( 'URL to like', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <input type="text" name="flpll_settings[like_settings][like_button][url_to_like]" placeholder="https://developers.facebook.com/docs/plugins/" value="<?php echo isset( $flpll_settings['like_settings'][ 'like_button' ][ 'url_to_like' ] ) ? esc_url( $flpll_settings['like_settings'][ 'like_button' ][ 'url_to_like' ] ) : ''; ?>"/>
                </div>
            </div>

            <div class="flpl-field-wrap">
                <label><?php _e( 'Layout', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <?php $layout = isset( $flpll_settings['like_settings'][ 'like_button' ][ 'layout' ] ) ? esc_attr( $flpll_settings['like_settings'][ 'like_button' ][ 'layout' ] ) : 'standard'; ?>
                    <select name="flpll_settings[like_settings][like_button][layout]">
                        <option value="standard" <?php selected( $layout, 'standard' ); ?>>standard</option>
                        <option value="box_count" <?php selected( $layout, 'box_count' ); ?>>box_count</option>
                        <option value="button_count" <?php selected( $layout, 'button_count' ); ?>>button_count</option>
                        <option value="button" <?php selected( $layout, 'button' ); ?>>button</option>
                    </select>
                </div>
            </div>
            <div class="flpl-field-wrap">
                <label><?php _e( 'Show Friend\'s Faces', FLPLL_TD ); ?></label>
                <div class="flpl-field">
                    <?php $show_friends_faces = (isset( $flpll_settings['like_settings'][ 'like_button' ][ 'show_friends_faces' ] )) ? $flpll_settings['like_settings'][ 'like_button' ][ 'show_friends_faces' ] : 0; ?>
                    <label><input type="checkbox" name="flpll_settings[like_settings][like_button][show_friends_faces]" value="1" <?php checked( $show_friends_faces, true ); ?>/><span class="flpl-field-sidenote"><?php _e( 'Check if you want to show faces of likes people when user is logged in.', FLPLL_TD ); ?></span></label>
                </div>
            </div>
            <?php do_action( 'flpll_like_button_ref',$flpll_settings);?>

        </div><!--flpl-like-type-ref--->
        
    </div>
    <div class="flpl-preview flpl-like-box-ref" <?php if ( $like_type != 'like_box' ) { ?>style="display:none;"<?php } ?>>
        <div class="flpl-preview-head"><?php _e( "Like Box Preview", FLPLL_TD ); ?></div>
        <img src="<?php echo FLPLL_IMG_DIR . '/like-box-preview.png' ?>"/>
    </div>
    <div class="flpl-preview flpl-like-button-ref" <?php if ( $like_type != 'like_button' ) { ?>style="display:none;"<?php } ?>>
        <div class="flpl-preview-head"><?php _e( "Like Button Preview", FLPLL_TD ); ?></div>
        <img src="<?php echo FLPLL_IMG_DIR . '/like-button-preview.png' ?>"/>
    </div>
    <div class="flpl-clear"></div>


</div>