<?php
/*
Plugin Name: Easy Knowledge-Base
Plugin URI: http://seventhqueen.com
Description: Easy to use Knowledge base
Version: 1.0
Author: SeventhQueen
Author URI: http://seventhqueen.com
*/



// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Define Constants
//	 02. Load textdomain
//   03. Require Files
//   04. Enqueue Assets
//   05. Register shortcode and taxonomies
// =============================================================================



// Define Constants
// =============================================================================

if ( ! defined( 'EASY_KB_VERSION' ) ) {
    define( 'EASY_KB_VERSION', '1.0' );
}

// Plugin Folder Path
if ( ! defined( 'EASY_KB_PLUGIN_DIR' ) ) {
    define( 'EASY_KB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Folder URL
if ( ! defined( 'EASY_KB_PLUGIN_URL' ) ) {
    define( 'EASY_KB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}


// Load textdomain
// =============================================================================

add_action( 'plugins_loaded', 'easy_kb_load_textdomain' );
function easy_kb_load_textdomain() {
    load_plugin_textdomain( 'easy-kb', false, dirname(plugin_basename(__FILE__)) . "/languages/" );
}

// Require Files
// =============================================================================

function easy_kb_init() {
    require_once( trailingslashit( EASY_KB_PLUGIN_DIR ) . 'lib/helpers.php' );
}

add_action( 'init', 'easy_kb_init', 6 );



// Enqueue Site Styles
// =============================================================================

function easy_kb_enqueue_site_styles() {

    if ( ! is_admin() ) {

        // Register the styles
        wp_register_style( 'easy-kb', trailingslashit(EASY_KB_PLUGIN_URL) . 'assets/css/easy-kb.min.css', array(), EASY_KB_VERSION, 'all' );
        //enqueue required styles
        wp_enqueue_style( 'easy-kb' );

    }
}

add_action( 'wp_enqueue_scripts', 'easy_kb_enqueue_site_styles' );




// Add theme options
// =============================================================================


add_filter( 'kleo_theme_settings', 'easy_kb_options' );

function easy_kb_options( $kleo )
{

    $kleo['sec']['kleo_section_kb'] = array(
        'title' => esc_html__('Knowledge Base', 'easy-kb'),
        'priority' => 16
    );

    $kleo['set'][] = array(
        'id' => 'kb_custom_archive',
        'type' => 'switch',
        'title' => esc_html__('Enable Custom KB Archive Page', 'easy-kb'),
        'default' => '0',
        'section' => 'kleo_section_kb',
        'description' => esc_html__('Will have the assigned page as archive. Make sure to include this shortcode in the content [kb_post_wall]', 'easy-kb'),
        'customizer' => false,
    );

    $pages_array = array( '' => 'None' );
    $pages = get_pages();
    foreach ( $pages as $page ) {
        $pages_array[$page->ID] = $page->post_title;
    }

    $kleo['set'][] = array(
        'id' => 'kb_post_type_slug',
        'title' => __('Page to use for Archive', 'easy-kb'),
        'type' => 'select',
        'default' => '',
        'choices' => $pages_array,
        'section' => 'kleo_section_kb',
        'customizer' => false,
        'condition' => array( 'kb_custom_archive', '1' )
    );

    return $kleo;
}


// Register shortcode and taxonomies
// =============================================================================

/***************************************************
:: Register knowledge base post type and taxonomies
 ***************************************************/

if (! function_exists( 'sq_kb_setup_post_type' ) ) {

    add_action( 'init', 'sq_kb_setup_post_type' );
    function sq_kb_setup_post_type()
    {

        // Setup & register knowledge base post type
        $has_archive = true;
        $slug = apply_filters( 'easy-kb-slug', 'kb' );

        /* Assign a custom page for the archive */
        if ( sq_option( 'kb_custom_archive', false ) && sq_option( 'kb_post_type_slug') ) {
            $archive_page = get_post( sq_option( 'kb_post_type_slug') );
            if ( $archive_page ) {
                $slug = $archive_page->post_name;
                $has_archive = false;
            }
        }

        $args = array(
            'labels' => kleo_generate_post_type_labels( 'kb', 'KB', 'Knowledge Base', 'Knowledge Base' ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_icon' => 'dashicons-sos',
            'query_var' => true,
            'rewrite' => array(
                'slug' => $slug,
                'feeds' => true,
                'with_front' => true
            ),
            'has_archive' => $has_archive,
            'hierarchical' => false,
            'menu_position' => 20,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions', 'author' )
        );
        $args = apply_filters( 'sq_kb_post_type_args', $args );
        register_post_type( 'kb', $args );

        // Setup & register knowledge base tag taxonomy
        $args = array(
            "label" 						=> _x( 'KB Tags', 'tag label', "easy-kb" ),
            "singular_label" 				=> _x( 'KB Tag', 'tag singular label', "easy-kb" ),
            'public'                        => true,
            'hierarchical'                  => false,
            'show_ui'                       => true,
            'show_in_nav_menus'             => false,
            'args'                          => array( 'orderby' => 'term_order' ),
            'rewrite' => array(
                'slug'         => $slug . '-tag',
                'with_front'   => true,
                'hierarchical' => true
            ),
            'query_var' => true
        );
        $args = apply_filters( 'sq_kb_tags_args', $args );
        register_taxonomy( 'kb-tags', 'kb', $args );

        // Setup & register knowledge base category taxonomy
        $args = array(
            "label" 						=> _x( 'KB Categories', 'category label', "easy-kb" ),
            "singular_label" 				=> _x( 'KB Category', 'category singular label', "easy-kb" ),
            'public'                        => true,
            'hierarchical'                  => true,
            'show_ui'                       => true,
            'show_in_nav_menus'             => false,
            'args'                          => array( 'orderby' => 'term_order' ),
            'rewrite' => array(
                'slug'         => $slug . '-cat',
                'with_front'   => true,
                'hierarchical' => true
            ),
            'query_var' => true
        );
        $args = apply_filters( 'sq_kb_categories_args', $args );
        register_taxonomy( 'kb-categories', 'kb', $args );

    }

}



/***************************************************
:: Knowledge base post wall shortcode
 ***************************************************/

function sq_kb_post_wall() {

    // Get knowledge base sections
    $kb_sections = get_terms('kb-categories','orderby=name');

    $return = '';

    if($kb_sections) {

        $return .= '<div class="row">';

        // For each knowledge base root section
        foreach ($kb_sections as $section) :

            if ($section->parent == 0) {

                $return .= '<div class="col-xs-12 col-sm-6 col-md-4"><div class="kb_section">';

                // Display root section name
                $return .= '<h4 class="kb-section-name"><i class="icon icon-folder"></i><a href="' . esc_url(get_term_link($section)) . '" title="' . esc_attr($section->name) . '" >' . esc_html($section->name) . '</a></h4>';
                $return .= '<ul class="kb-wall-list">';

                // Display sub sections
                foreach ($kb_sections as $sub_section) {
                    if ($section->term_id == $sub_section->parent) {
                        $return .= '<li class="kb-section-name"><i class="icon icon-folder"></i>';
                        $return .= '<a href="' . esc_url(get_term_link($sub_section)) . '" rel="bookmark" title="' . esc_attr($sub_section->name) . '">' . esc_html($sub_section->name) . '</a>';
                        $return .= '</li>';
                    }
                }

                // Fetch posts in the root section
                $kb_args = array(
                    'post_type' => 'kb',
                    'posts_per_page' => 5,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'kb-categories',
                            'terms' => $section,
                        ),
                    ),
                );
                $the_query = new WP_Query($kb_args);

                // Display posts in the root section
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                        $return .= '<li class="kb-article-name"><i class="icon icon-newspaper"></i>';
                        $return .= '<a href="' . esc_url(get_permalink($the_query->ID)) . '" rel="bookmark" title="' . esc_attr(get_the_title($the_query->ID)) . '">' . esc_html(get_the_title($the_query->ID)) . '</a>';
                        $return .= '</li>';
                    endwhile;
                    $return .= '<li class="kb-view-more"><i class="icon icon-arrow-right5"></i>';
                    $return .= '<a href="' . esc_url(get_term_link($section)) . '" title="' . esc_attr($section->name) . '" >View more from "' . esc_html($section->name) . '"</a>';
                    $return .= '</li>';
                endif;

                wp_reset_postdata();

                $return .= '</ul>';
                $return .= '</div></div>';

            }

        endforeach;

        $return .= '</div>';

    }

    return $return;
}
add_shortcode('kb_post_wall', 'sq_kb_post_wall');


/***************************************************
:: Knowledge base post edit options
 ***************************************************/

add_shortcode('sq_kb_frontedit', 'sq_kb_frontedit');
function sq_kb_frontedit( $atts ){

    $action = $editor = '';
    extract( shortcode_atts( array(
        'action' => 'add',
    ), $atts, 'sq_kb_editor' ) );

    $action = esc_attr($action);

    if( ( ( $action == 'add' ) || ( $action == 'edit' && is_single() ) ) && ( current_user_can('editor') || current_user_can('administrator') ) ) {

        if ($action == 'add') {
            $post = false;
            $post_id = 0;
            $post_title = isset($_POST['sq_frontedit_title']) ? $_POST['sq_frontedit_title'] : '';
            $post_content = isset($_POST['sq_frontedit_wp_editor']) ? $_POST['sq_frontedit_wp_editor'] : '';
        } else if ($action == 'edit') {
            global $post;
            $post_id = $post->ID;
            $post_title = isset($_POST['sq_frontedit_title']) ? $_POST['sq_frontedit_title'] : $post->post_title;
            $post_content = isset($_POST['sq_frontedit_wp_editor']) ? $_POST['sq_frontedit_wp_editor'] : $post->post_content;
        }

        ob_start();
        ?>

        <?php if ($action == 'edit') { ?>
            <ul class="sq_frontedit_actions">
                <li><a href="#" class="sq_frontedit_action sq_frontend_edit_action"><?php esc_html_e( "Edit", "easy-kb" ); ?></a></li>
                <li><a href="#" class="sq_frontedit_action sq_frontend_revisions_action"><?php esc_html_e( "History", "easy-kb" ); ?></a></li>
                <li><a href="<?php echo get_edit_post_link( $post_id ); ?>" class="sq_frontedit_action" target="_blank"><?php esc_html_e( "Advanced", "easy-kb" ); ?></a></li>
            </ul>
            <script>
                jQuery(document).ready(function(){
                    jQuery('.sq_frontend_edit_action').on('click', function(){
                        jQuery('.sq_frontedit_action:not(".sq_frontend_edit_action")').removeClass('active');
                        jQuery(this).toggleClass('active');
                        jQuery('.sq_frontedit_revisions').hide();
                        jQuery('.sq_frontedit').slideToggle();
                        return false;
                    });
                    jQuery('.sq_frontend_revisions_action').on('click', function(){
                        jQuery('.sq_frontedit_action:not(".sq_frontend_revisions_action")').removeClass('active');
                        jQuery(this).toggleClass('active');
                        jQuery('.sq_frontedit').hide();
                        jQuery('.sq_frontedit_revisions').slideToggle();
                        return false;
                    });
                });
            </script>
        <?php } ?>

        <?php global $sq_frontedit_status; ?>
        <?php if ( $sq_frontedit_status ) { ?>
            <div class="sq_frontedit_status <?php echo esc_attr( $sq_frontedit_status['status'] ); ?>">
                <span><?php echo esc_html( $sq_frontedit_status['message'] ); ?></span>
            </div>
        <?php } ?>

        <div class="sq_frontedit <?php echo $action; ?>" style="display:none;">
            <form id="sq_frontedit_<?php echo $action; ?>" action="" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <h4><?php esc_html_e( "Title", "easy-kb" ); ?></h4>
                        <input type="text" name="sq_frontedit_title" value="<?php echo esc_attr( $post_title ); ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <h4><?php esc_html_e( "Content", "easy-kb" ); ?></h4>
                        <style>html .mceContentBody { max-width: none !important; }</style>
                        <?php wp_editor( $post_content, 'sq_frontedit_wp_editor', array() ); ?>
                    </div>
                </div>
                <input type="hidden" name="sq_frontedit" value="<?php echo $action; ?>">

                <?php if ( $action == 'edit' ) { ?>
                    <input type="hidden" name="sq_frontedit_id" value="<?php echo $post_id; ?>">
                <?php } ?>

                <input type="hidden" name="sq_frontedit_nonce_<?php echo $action; ?>" value="<?php echo wp_create_nonce( 'sq_frontedit_nonce_' . $action ); ?>">
                <br>
                <button class="sq_frontedit_action save"><?php esc_html_e( "Save article", "easy-kb" ); ?></button>
            </form>

        </div>

        <?php if ( $action == 'edit' ) : ?>

            <div class="sq_frontedit_revisions" style="display:none;">
                <?php $revisions = wp_get_post_revisions( $post_id ); ?>
                <?php if ( $revisions ) : ?>
                    <h4><?php esc_html_e( "Article revisions", "easy-kb" ); ?></h4>
                    <ul class="sq_frontedit_post_revisions">
                        <?php $date_format = get_option( 'date_format' ); ?>
                        <?php foreach ($revisions as $revision) : ?>

                            <li>
                                <b><?php esc_html_e( "Title:", "easy-kb" ); ?></b> <?php echo esc_html( $revision->post_title ); ?><br>
                                <b><?php esc_html_e( "Date Modified:", "easy-kb" ); ?></b> <?php echo mysql2date($date_format, $revision->post_modified); ?><br>
                                <b><?php esc_html_e( "Author:", "easy-kb" ); ?></b> <?php echo esc_html( $revision->post_author ); ?><br>
                                <b><?php esc_html_e( "Revision ID:", "easy-kb" ); ?></b>
                                    <?php echo $revision->ID; ?> ( <a href="javascript:kleoRestoreRevisionPost(<?php echo $revision->ID; ?>);"><?php esc_html_e('Restore this revision', 'easy-kb'); ?></a> )
                            </li>

                        <?php endforeach; ?>
                    </ul>
                    <form id="sq_frontedit_restore" action="" method="post">
                        <input type="hidden" name="sq_frontedit" value="restore">
                        <input type="hidden" name="sq_frontedit_id" value="" id="sq_frontedit_restore_id">
                        <input type="hidden" name="sq_frontedit_nonce_restore" value="<?php echo wp_create_nonce( 'sq_frontedit_nonce_restore' ); ?>">
                    </form>
                    <script>
                        function kleoRestoreRevisionPost(post_id) {
                            if ( post_id ) {
                                jQuery('#sq_frontedit_restore_id').val(post_id);
                                jQuery('#sq_frontedit_restore').submit();
                            }
                        }
                    </script>
                <?php else : ?>

                    <p><?php esc_html_e( "This post does not have any revisions yet.", "easy-kb" ); ?></p>

                <?php endif; ?>
            </div>

        <?php endif; ?>

        <?php
        $editor = ob_get_clean();
    }
    return $editor;
}

add_filter( 'the_content', 'sq_kb_frontedit_post_content', 20 );
function sq_kb_frontedit_post_content( $content ) {

    global $post;
    if ( is_single() && $post->post_type == 'kb' ){
        $kb_editor = sq_kb_frontedit( array('action' => 'edit') );
        $content =  $kb_editor . $content;
    }

    return $content;
}

add_action('wp', 'sq_kb_frontedit_process_data');
function sq_kb_frontedit_process_data(){

    $action = ( isset( $_POST['sq_frontedit'] ) && $_POST['sq_frontedit'] != '' ) ? $_POST['sq_frontedit'] : false;

    if( $action ){

        if( isset( $_REQUEST['sq_frontedit_nonce_' . $action] ) ){ $nonce = $_REQUEST['sq_frontedit_nonce_' . $action]; }else{ $nonce = ''; }

        if( ( current_user_can('editor') || current_user_can('administrator') ) && ( wp_verify_nonce( $nonce, 'sq_frontedit_nonce_' . $action ) ) ){

            if( !session_id() ){ session_start(); }
            $post_id = (isset($_POST['sq_frontedit_id']) && is_numeric($_POST['sq_frontedit_id'])) ? $_POST['sq_frontedit_id'] : 0;

            // Add or edit post
            if( $action == 'add' || $action == 'edit') {

                $post_title = isset($_POST['sq_frontedit_title']) ? $_POST['sq_frontedit_title'] : '';
                $post_content = isset($_POST['sq_frontedit_wp_editor']) ? $_POST['sq_frontedit_wp_editor'] : '';

                if ($post_title == '' || $post_content == '' ) {
                    $_SESSION['sq_frontedit_status']['status'] = "error";
                    $_SESSION['sq_frontedit_status']['message'] = esc_html__( "Please fill the title and the content.", "easy-kb" );
                }

                if (!isset($_SESSION['sq_frontedit_status']['status'])) {

                    $post_data = array();
                    $post_data['post_title'] = $post_title;
                    $post_data['post_content'] = $post_content;

                    // Add post
                    if($action == 'add') {
                        if( $new_post_id = wp_insert_post( $post_data ) ){
                            $_SESSION['sq_frontedit_status']['status'] = "success";
                            $_SESSION['sq_frontedit_status']['message'] = esc_html__( "The article has been added successfully.", "easy-kb" );
                            exit( wp_redirect( get_permalink( $new_post_id ) ) );
                        }else{
                            $_SESSION['sq_frontedit_status']['status'] = "error";
                            $_SESSION['sq_frontedit_status']['message'] = esc_html__( "The article couldn't be added.", "easy-kb" );
                        }
                    }

                    // Edit post
                    if( $action == 'edit' && $post_id > 0 ){
                        $post_data['ID'] = $post_id;
                        if ( $updated_post_id = wp_update_post( $post_data ) ) {
                            $_SESSION['sq_frontedit_status']['status'] = "success";
                            $_SESSION['sq_frontedit_status']['message'] = esc_html__("The article has been updated successfully.", "easy-kb");
                            session_write_close();
                            exit( wp_redirect( get_permalink( $updated_post_id ) ) );
                        } else {
                            $_SESSION['sq_frontedit_status']['status'] = "error";
                            $_SESSION['sq_frontedit_status']['message'] = esc_html__("The article couldn't be updated.", "easy-kb");
                        }
                    }

                }

            }

            // Restore post revision
            if( $action == 'restore' ){
                if( $post_id > 0 ){
                    $restored_post_id = wp_restore_post_revision( $post_id );
                    if( isset($restored_post_id) && is_numeric($restored_post_id) && $restored_post_id > 0 ){
                        $_SESSION['sq_frontedit_status']['status'] = "success";
                        $_SESSION['sq_frontedit_status']['message'] = esc_html__( "The article revision was restored successfully.", "easy-kb" );
                        exit( wp_redirect( get_permalink( $restored_post_id ) ) );
                    }else{
                        $_SESSION['sq_frontedit_status']['status'] = "error";
                        $_SESSION['sq_frontedit_status']['message'] = esc_html__( "Please select a valid revision to restore.", "easy-kb" );
                    }
                }

            }

        } else {

            die(esc_html__( "Not allowed!", "easy-kb" ));

        }

    }

}

add_action( 'wp_head', 'sq_kb_frontedit_set_status' );
function sq_kb_frontedit_set_status(){
    global $sq_frontedit_status;
    if( isset( $_SESSION['sq_frontedit_status'] ) ) {
        $sq_frontedit_status = $_SESSION['sq_frontedit_status'];
        unset( $_SESSION['sq_frontedit_status'] );
    }
}


add_filter( 'template_include', 'sq_kb_custom_taxonomy_archive_template' );
function sq_kb_custom_taxonomy_archive_template( $template ) {
    if ( is_post_type_archive('kb') || is_tax( 'kb-tags' ) || is_tax( 'kb-categories' ) ) {
        $new_template = locate_template( array( 'archive-kb.php' ) );
        if ( $new_template != '' ) {
            return $new_template;
        }
    }
    return $template;
}



