<?php

$default_settings = $this->get_default_settings();
if ( is_multisite() ) {
    global $wpdb;
    $current_blog = $wpdb->blogid;

// Get all blogs in the network and activate plugin on each one
    $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
    foreach ( $blog_ids as $blog_id ) {
        switch_to_blog( $blog_id );
        
        if ( !get_option( 'flpll_settings' ) ) {
            update_option( 'flpll_settings', $default_settings );
        }

        restore_current_blog();
    }
} else {
    if ( !get_option( 'flpll_settings' ) ) {
        update_option( 'flpll_settings', $default_settings );
    }
}	

