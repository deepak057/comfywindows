<?php


//Theme options
if ( ! function_exists( 'sq_options' ) ) {
    if (is_customize_preview()) {
        function sq_option($option = false, $default = false)
        {
            return get_theme_mod($option, $default);
        }
    }
}

//array with theme options
global $kleo_options;
$kleo_options = get_theme_mods();

if ( ! function_exists( 'sq_options' ) ) {

    function sq_options() {
        global $kleo_options;

        $output = apply_filters( 'kleo_options', $kleo_options );

        return $output;
    }

}

if ( ! function_exists( 'sq_option' ) ) {

    /**
     * Function to get options in front-end
     * @param string|bool $option The option we need from the DB
     * @param string|bool $default If $option doesn't exist in DB return $default value
     * @return string|array
     */
    function sq_option( $option = false, $default = false, $filters = false )
    {
        if ( $option === FALSE ) {
            return  FALSE;
        }
        global $kleo_options;

        if (isset($kleo_options[$option]) && $kleo_options[$option] !== '') {
            $output_data = $kleo_options[$option];
        } else {
            $output_data = $default;
        }

        if ( $filters === true ) {
            $output_data = apply_filters( 'sq_option', $output_data, $option );
        }

        return $output_data;
    }

}


/***************************************************
:: Post type helpers
 ***************************************************/

/**
 * Generate post type labels
 * @param $token
 * @param $singular
 * @param $plural
 * @param $menu
 * @return array|mixed|void
 */
if ( ! function_exists( 'kleo_generate_post_type_labels' ) ) {
    function kleo_generate_post_type_labels( $token, $singular, $plural, $menu )
    {
        $labels = array(
            'name' => sprintf( _x('%s', 'post type general name', 'easy-kb'), $plural ),
            'singular_name' => sprintf( _x('%s', 'post type singular name', 'easy-kb'), $singular ),
            'add_new' => sprintf( _x( 'Add New %s', $token, 'easy-kb' ), $singular),
            'add_new_item' => sprintf(esc_html__('Add New %s', 'easy-kb'), $singular),
            'edit_item' => sprintf(esc_html__('Edit %s', 'easy-kb'), $singular),
            'new_item' => sprintf(esc_html__('New %s', 'easy-kb'), $singular),
            'all_items' => sprintf(esc_html__('All %s', 'easy-kb'), $plural),
            'view_item' => sprintf(esc_html__('View %s', 'easy-kb'), $singular),
            'search_items' => sprintf(esc_html__('Search %s', 'easy-kb'), $plural),
            'not_found' => sprintf(esc_html__('No %s found', 'easy-kb'), strtolower($plural)),
            'not_found_in_trash' => sprintf(esc_html__('No %s found in Trash', 'easy-kb'), strtolower($plural)),
            'parent_item_colon' => '',
            'menu_name' => sprintf(esc_html__('%s', 'easy-kb'), $menu)
        );
        $labels = apply_filters( 'kleo_generate_post_type_labels_' . $token, $labels );
        return $labels;
    }
}


/**
 * Get an array of registered post types with different options
 *
 * @param array $args
 * @return array
 */
if ( ! function_exists( 'kleo_post_types' )) {
    function kleo_post_types( $args = array() ) {
        $kleo_post_types = array();

        if (isset($args['extra'])) {
            $kleo_post_types = $args['extra'];
        }

        $post_args = array(
            'public' => true,
            '_builtin' => false
        );

        $types_return = 'objects'; // names or objects, note names is the default
        $post_types = get_post_types($post_args, $types_return);

        if (isset($args['exclude'])) {
            $except_post_types = array( 'kleo-kb', 'topic', 'reply' );
        }

        foreach ($post_types as $post_type) {
            if (isset($except_post_types) && in_array($post_type->name, $except_post_types)) {
                continue;
            }
            $kleo_post_types[$post_type->name] = $post_type->labels->name;
        }

        return $kleo_post_types;
    }
}