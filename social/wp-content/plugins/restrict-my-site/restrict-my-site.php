<?php
/*
Plugin Name: Restrict my site
Plugin URI: http://seventhqueen.com
Description: Restrict site to not logged in user
Version: 1.0.1
Author: SeventhQueen
Author URI: http://seventhqueen.com
License: GPL2
*/

if ( ! defined( 'RMS_VERSION' ) ) {
    define( 'RMS_VERSION', '1.0' );
}

// Plugin Folder Path
if ( ! defined( 'RMS_PLUGIN_DIR' ) ) {
    define( 'RMS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Folder URL
if ( ! defined( 'RMS_PLUGIN_URL' ) ) {
    define( 'RMS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin Root File
if ( ! defined( 'RMS_PLUGIN_FILE' ) ) {
    define( 'RMS_PLUGIN_FILE', __FILE__ );
}


function restrict_my_site_init() {
    require_once( trailingslashit( RMS_PLUGIN_DIR ) . '/rms.php' );
}

add_action( 'init', 'restrict_my_site_init', 6);