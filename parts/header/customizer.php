<?php
/**
 * UNCG Online Theme Customizer.
 *
 * @package uncgonline
 */

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
    ) );

    acf_add_options_sub_page( array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Options',
        'parent_slug' => 'theme-general-settings',
    ) );
}

/**
 * Set default values for customizer fields.
 */
function uncgonline_customizer_defaults() {
    $uncgonline_customizer_defaults = array();

    $uncgonline_customizer_defaults['header_background_color'] = 'gray';

    $uncgonline_customizer_defaults['main_navigation_state_color'] = 'gray';

    $uncgonline_customizer_defaults['button_color'] = 'gray';

    $uncgonline_customizer_defaults['link_color'] = 'blue';
    $uncgonline_customizer_defaults['link_hover_color'] = 'gray';

    $uncgonline_customizer_defaults['blockquote_background_color'] = 'gray';

    $uncgonline_customizer_defaults['custom_css'] = '';
    $uncgonline_customizer_vals['custom_css_file'] = false;

    return $uncgonline_customizer_defaults;
}

/**
 * Set values from custom fields.
 *
 * @return array
 */
function uncgonline_customizer_values() {
    $uncgonline_customizer_vals = uncgonline_customizer_defaults();

    if ( get_field( 'header_background_color', 'option' ) ) {
        $uncgonline_customizer_vals['header_background_color'] = get_field( 'header_background_color', 'option' );
    }

    if ( get_field( 'main_navigation_state_color', 'option' ) ) {
        $uncgonline_customizer_vals['main_navigation_state_color'] = get_field( 'main_navigation_state_color', 'option' );
    }

    if ( get_field( 'button_color', 'option' ) ) {
        $uncgonline_customizer_vals['button_color'] = get_field( 'button_color', 'option' );
    }

    if ( get_field( 'link_color', 'option' ) ) {
        $uncgonline_customizer_vals['link_color'] = get_field( 'link_color', 'option' );
    }

    if ( get_field( 'link_hover_color', 'option' ) ) {
        $uncgonline_customizer_vals['link_hover_color'] = get_field( 'link_hover_color', 'option' );
    }

    if ( get_field( 'blockquote_background_color', 'option' ) ) {
        $uncgonline_customizer_vals['blockquote_background_color'] = get_field( 'blockquote_background_color', 'option' );
    }

    if ( get_field( 'custom_css', 'option' ) ) {
        $uncgonline_customizer_vals['custom_css'] = get_field( 'custom_css', 'option' );
    }

    if ( get_field( 'custom_css_file', 'option' ) ) {
        $uncgonline_customizer_vals['custom_css_file'] = get_field( 'custom_css_file', 'option' );
    }

    return $uncgonline_customizer_vals;
}


/**
 * Add CSS from the customizer to the head.
 */
function uncgonline_customizer_css() {
    $uncgonline_customizer_vals = uncgonline_customizer_values();

    ?>
    <style type="text/css">
        .site-header {
            background-color: <?php echo esc_html( $uncgonline_customizer_vals['header_background_color'] ); ?>;
        }

        .main-navigation #primary-menu,
        .home-unit-links a.unit-link:focus .unit-icon, .home-unit-links a.unit-link:hover .unit-icon {
            background-color: <?php echo esc_html( $uncgonline_customizer_vals['main_navigation_state_color'] ); ?>;
        }

        .main-navigation ul a:focus,
        .main-navigation ul a:hover,
        .main-navigation ul li.current_page_item > a {
            color: <?php echo esc_html( $uncgonline_customizer_vals['header_background_color'] ); ?>;
        }

        .search-box input {
            border-color: <?php echo esc_html( $uncgonline_customizer_vals['button_color'] ); ?>;
        }

        .search-button:active .search-icon-wrapper,
        .search-button:focus .search-icon-wrapper,
        .search-button:hover .search-icon-wrapper,
        .search-button[aria-expanded="true"] .search-icon-wrapper,
        .unit-icon {
            background-color: <?php echo esc_html( $uncgonline_customizer_vals['button_color'] ); ?>;
        }

        @media screen and (min-width: 1210px) {
            .main-navigation > ul > li:focus > a,
            .main-navigation > ul li:hover > .sub-menu,
            .main-navigation > ul li:focus > .sub-menu,
            .main-navigation > ul li[aria-expanded="true"] > .sub-menu,
            .main-navigation > ul li[aria-expanded="true"] > a,
            .main-navigation ul li a:focus,
            .main-navigation ul li:hover a,
            .main-navigation ul li.current_page_item a,
            .main-navigation li.current-menu-parent a {
                background-color: <?php echo esc_html( $uncgonline_customizer_vals['main_navigation_state_color'] ); ?>;
            }

            .main-navigation ul .sub-menu a:focus,
            .main-navigation ul .sub-menu a:hover,
            .main-navigation ul .sub-menu li.current-menu-item a {
                color: <?php echo esc_html( $uncgonline_customizer_vals['header_background_color'] ); ?> !important;
            }
        }

        .site-content .button,
        .site-content .button:visited,
        .site-content a.wp-block-button__link,
        .site-content a.wp-block-button__link:visited,
        .site-content button,
        .site-content input[type=button],
        .site-content input[type=reset],
        .site-content input[type=submit],
        .wp-block-uncgonline-block-indent .indent-icon {
            background-color: <?php echo esc_html( $uncgonline_customizer_vals['button_color'] ); ?>;
        }

        .site-content .button:active,
        .site-content .button:focus,
        .site-content .button:hover,
        .site-content .button:visited:active,
        .site-content .button:visited:focus,
        .site-content .button:visited:hover,
        .site-content a.wp-block-button__link:active,
        .site-content a.wp-block-button__link:focus,
        .site-content a.wp-block-button__link:hover,
        .site-content a.wp-block-button__link:visited:active,
        .site-content a.wp-block-button__link:visited:focus,
        .site-content a.wp-block-button__link:visited:hover,
        .site-content button:active,
        .site-content button:focus,
        .site-content button:hover,
        .site-content input[type=button]:active,
        .site-content input[type=button]:focus,
        .site-content input[type=button]:hover,
        .site-content input[type=reset]:active,
        .site-content input[type=reset]:focus,
        .site-content input[type=reset]:hover,
        .site-content input[type=submit]:active,
        .site-content input[type=submit]:focus,
        .site-content input[type=submit]:hover {
            background-color: <?php echo esc_html( $uncgonline_customizer_vals['main_navigation_state_color'] ); ?>;
        }

        .site-content a {
            color: <?php echo esc_html( $uncgonline_customizer_vals['link_color'] ); ?>;
        }

        .site-content  a:visited {
            color: <?php echo esc_html( $uncgonline_customizer_vals['link_color'] ); ?>;
        }

        .site-content  a:active,
        .site-content  a:focus,
        .site-content  a:hover {
            color: <?php echo esc_html( $uncgonline_customizer_vals['link_hover_color'] ); ?>;
        }

        .wp-block-table table thead th {
            background-color: <?php echo esc_html( $uncgonline_customizer_vals['button_color'] ); ?>;
        }

        .pagination.spartan-pagination li a,
        .pagination.spartan-pagination li a:visited {
            background-color: <?php echo esc_html( $uncgonline_customizer_vals['button_color'] ); ?>;
        }

        .pagination.spartan-pagination li a:hover,
        .pagination.spartan-pagination li a:focus
        {
            background-color: <?php echo esc_html( $uncgonline_customizer_vals['main_navigation_state_color'] ); ?>;
        }

        figcaption {
            color: <?php echo esc_html( $uncgonline_customizer_vals['button_color'] ); ?>;
        }

        .page-content .search-form input {
            border-color: <?php echo esc_html( $uncgonline_customizer_vals['button_color'] ); ?>;
        }

        blockquote, q {
            background-color: <?php echo esc_html( $uncgonline_customizer_vals['blockquote_background_color'] ); ?>;
            color: <?php echo esc_html( $uncgonline_customizer_vals['main_navigation_state_color'] ); ?>;
        }

        <?php
        if ( $uncgonline_customizer_vals[ 'custom_css_file' ] ) {
            wp_enqueue_style( 'custom-css-file', esc_url( $uncgonline_customizer_vals[ 'custom_css_file' ] ) );
        }

        echo sanitize_text_field( $uncgonline_customizer_vals['custom_css'] );
        ?>
    </style>
    <?php
} // End uncgonline_customizer_css.
add_action( 'wp_head', 'uncgonline_customizer_css' );
