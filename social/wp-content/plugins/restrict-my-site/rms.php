<?php
/**
 * Plugin logic
 *
 * @link       http://seventhqueen.com
 * @since      1.0.0
 *
 * @package    Restrict_My_Site
 */

if ( ! class_exists( 'Kleo' ) ) {
    return;
}

/***************************************************
:: Theme settings
 ***************************************************/


add_filter( 'kleo_theme_settings', 'kleo_private_settings' );

function kleo_private_settings( $kleo ) {
    //
    // Settings Sections
    //

    $kleo['sec']['kleo_section_private'] = array(
        'title' => __( 'Private site', 'buddyapp' ),
        'priority' => 16
    );

    $kleo['set'][] = array(
        'id' => 'restricted_site',
        'title' => __('Make my site private', 'buddyapp'),
        'type' => 'select',
        'default' => 'no',
        'choices' => array( 'no' => 'No', 'yes' => 'Yes'),
        'section' => 'kleo_section_private',
        'description' => __('Restrict all pages from not logged in users.', 'buddyapp'),
    );


    $pages_array = array( '' => 'None' );
    $pages = get_pages();
    foreach ( $pages as $page ) {
        $pages_array[$page->ID] = $page->post_title;
    }

    $kleo['set'][] = array(
        'id' => 'restrict_login_page',
        'title' => __('Redirect to login page', 'buddyapp'),
        'type' => 'select',
        'default' => '',
        'choices' => $pages_array,
        'section' => 'kleo_section_private',
        'description' => __('Select a page to redirect restricted users.', 'buddyapp'),
        'condition' => array( 'restricted_site', 'yes' )
    );

    $kleo['set'][] = array(
        'id' => 'restricted_site_excludes',
        'title' => __('Pages exceptions', 'buddyapp'),
        'type' => 'multi-select',
        'default' => '',
        'choices' => $pages_array,
        'section' => 'kleo_section_private',
        'description' => __('Page restrictions exceptions. Select pages to make public', 'buddyapp'),
        'condition' => array( 'restricted_site', 'yes' )
    );

    return $kleo;

}

function kleo_restrict_site() {

    if ( is_user_logged_in() || sq_option( 'restricted_site', 'no' ) != 'yes' ) {
        return false;
    }

    if ( function_exists( 'bp_is_active' ) ) {
        if ( bp_is_activation_page() || bp_is_register_page() ) {
            return false;
        }
    }

    $excluded = sq_option( 'restricted_site_excludes', '' );

    if ( ! empty( $excluded ) && $excluded != '' && is_page( $excluded ) ) {
        return false;
    }

    /* Redirect to login */

    $redirect_page = home_url( '/wp-login.php' );

    //Custom redirect page
    if ( sq_option( 'restrict_login_page' ) ) {
        if (get_permalink( sq_option('restrict_login_page') )) {
            $redirect_page = get_permalink(sq_option('restrict_login_page'));

            // If we are actually on the redirect page - bail out
            if ( is_page( sq_option( 'restrict_login_page' ) ) ) {
                return false;
            }
        }
    }

    //Extra check so we don't enter a loop
    if( kleo_full_url() === $redirect_page ) {
        return false;
    }

    $redirect = '?redirect_to=' . esc_url( kleo_full_url() );
    $return_url = esc_url( $redirect_page . $redirect );

    wp_redirect( $return_url );
    exit;

}
if ( ! is_admin() ) {
    add_action( 'template_redirect', 'kleo_restrict_site' );
}