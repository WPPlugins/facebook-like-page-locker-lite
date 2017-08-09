<?php
$flpll_settings = get_option( 'flpll_settings' );
?>
<?php
//       $this->print_array($flpll_settings);
?>
<div class="flpl-front-locker-outerwarp">
    <?php
    /**
     *  Show locker only if not liked 
     */
    if ( isset( $_COOKIE[ 'flpl_like_flag' ] ) ) {
        return;
    }


    if ( $flpll_settings[ 'locker_settings' ][ 'disable_for_admin' ] == 1 && is_user_logged_in() ) {
        //if disable for logged in user is enabled
        return;
    }
    if ( $flpll_settings[ 'locker_settings' ][ 'enable_locker' ] == 1 ) {
        global $post;
        $id = $post->ID;

        if ( $flpll_settings[ 'locker_settings' ][ 'enable_locker_type' ] == 'certain' ) {
            $post_type = get_post_type( $id );
            if ( !in_array( $post_type, $flpll_settings[ 'locker_settings' ][ 'show_locker_on' ] ) ) {
                return;
            }
        }

        $facebook_app_id = esc_attr( $flpll_settings[ 'locker_settings' ][ 'facebook_app_id' ] );
        foreach ( $flpll_settings[ 'locker_settings' ] as $key => $val ) {
            $$key = $val;
        }
        foreach ( $flpll_settings[ 'like_settings' ] as $key => $val ) {
            $$key = $val;
        }
        ?>
        <div class="flpl-locker-overlay"></div>
        <div class="flpl-front-locker-wrap">
            <div class="flpl-locker">
            <?php do_action( 'flpll_looker_header',$flpll_settings);?>
                <div class="flpl-locker-head"><?php echo $locker_title; ?> <?php if ( isset( $close_action ) ) { ?><span class="flpl-close-locker"><?php echo apply_filters( 'flpll_close_text', __( 'close[x]', FLPLL_TD ) ); ?></span><?php } ?></div>
                <div id="fb-root"></div>
                <script>
                    (function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=<?php echo $facebook_app_id; ?>";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
    <?php if ( $like_type == 'like_button' ) { ?>
                    <div class="flpl-like-button-wrap">

                        <div class="fb-like" data-href="<?php echo $like_button[ 'url_to_like' ]; ?>" data-layout="<?php echo $like_button[ 'layout' ] ?>" data-action="like" data-show-faces="true" ></div>

                    </div>
        <?php
    } else {
        $height = ($like_box[ 'height' ] == '') ? '350px' : esc_attr( $like_box[ 'height' ] );
        $width = ($like_box[ 'width' ] == '') ? '500px' : esc_attr( $like_box[ 'width' ] );
        $small_header = (isset( $like_box[ 'small_header' ] )) ? 'true' : 'false';
        $hide_cover_photo = (isset( $like_box[ 'hide_cover_photo' ] )) ? 'true' : 'false';
        $show_friends_faces = (isset( $like_box[ 'show_friends_faces' ] )) ? 'true' : 'false';
        $show_page_posts = (isset( $like_box[ 'show_page_posts' ] )) ? 'true' : 'false';
        ?>
                    <div class="flpl-lik-box-wrap">
                        <div class="fb-page" data-href="<?php echo esc_url( $like_box[ 'facebook_page_url' ] ); ?>" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" data-small-header="<?php echo $small_header; ?>" data-adapt-container-width="true" data-hide-cover="<?php echo $hide_cover_photo; ?>" data-show-facepile="<?php echo $show_friends_faces; ?>" data-show-posts="<?php echo $show_page_posts; ?>"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo esc_url( $like_box[ 'facebook_page_url' ] ); ?>"><a href="<?php echo esc_url( $like_box[ 'facebook_page_url' ] ); ?>"><?php echo esc_attr( $like_box[ 'facebook_page_name' ] ); ?></a></blockquote></div></div>
                    </div>
        <?php
    }
    ?>
                <div class="flpl-counter-desc">
                <?php
                if ( isset( $locker_countdown ) ) {
                    $message = esc_attr( $countdown_message );
                    $timer = ($timer != '') ? esc_attr( $timer ) : 60;
                    $countdown_span = '<span class="flpl-count-secs">' . $timer . '</span>';
                    $message = str_replace( '#countdown', $countdown_span, $message );
                } else {
                    $message = esc_attr( $unlock_message );
                }
                echo apply_filters('flpll_message',$message);
                ?>

                </div>
                <div class="flpl-clear"></div>
                <?php do_action( 'flpll_looker_footer',$flpll_settings);?>
            </div>
        </div>
    <?php
}
?>
</div>