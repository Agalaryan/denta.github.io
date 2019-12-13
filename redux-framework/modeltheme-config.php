<?php

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Panel', 'medpluswp' ),
        'page_title'           => esc_html__( 'Theme Panel', 'medpluswp' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'medpluswp_redux',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

  

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'medpluswp' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '', 'medpluswp' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '', 'medpluswp' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'medpluswp' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'medpluswp' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'medpluswp' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'medpluswp' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'medpluswp' );
    Redux::setHelpSidebar( $opt_name, $content );
    /*
     * <--- END HELP TABS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    /*
        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
     */
    include_once('modeltheme-config.arrays.php');
    /**
    ||-> SECTION: General Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'General Settings', 'medpluswp' ),
        'id'    => 'mt_general',
        'icon'  => 'el el-icon-wrench'
    ));
    // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General Settings', 'medpluswp' ),
        'id'         => 'mt_general_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_breadcrumbs',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Breadcrumbs</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_enable_breadcrumbs',
                'type'     => 'switch', 
                'title'    => esc_html__('Breadcrumbs', 'medpluswp'),
                'subtitle' => esc_html__('Enable or disable breadcrumbs', 'medpluswp'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_breadcrumbs_delimitator',
                'type'     => 'text',
                'title'    => esc_html__('Breadcrumbs delimitator', 'medpluswp'),
                'subtitle' => esc_html__('This is a little space under the Field Title in the Options table, additional info is good in here.', 'medpluswp'),
                'desc'     => esc_html__('This is the description field, again good for additional info.', 'medpluswp'),
                'default'  => '/'
            ),
            array(
                'id'   => 'mt_divider_custom_css',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Custom CSS Code</h3>', 'medpluswp' )
            ),
            array(
                'id' => 'mt_custom_css',
                'type' => 'ace_editor',
                'title' => esc_html__('CSS Code', 'medpluswp'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'medpluswp'),
                'mode' => 'css',
                'theme' => 'monokai',
                'default' => "#header{\nmargin: 0 auto;\n}"
            )
        ),
    ));


    // Back to Top
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Back to Top Button', 'medpluswp' ),
        'id'         => 'mt_general_back_to_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mt_backtotop_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Back to Top Button Status', 'medpluswp'),
                'subtitle' => esc_html__('Enable or disable "Back to Top Button"', 'medpluswp'),
                'default'  => true,
            ),
            array(         
                'id'       => 'mt_backtotop_bg_color',
                'type'     => 'background',
                'title'    => esc_html__('Back to Top Button Status Backgrond', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #01AAED', 'medpluswp'),
                'default'  => array(
                    'background-color' => '#01AAED',
                    'background-repeat' => 'no-repeat',
                    'background-position' => 'center center',
                    'background-image' => get_template_directory_uri().'/images/mt-to-top-arrow.svg',
                )
            ),
            array(
                'id'            => 'mt_backtotop_height_width',
                'type'          => 'slider',
                'title'         => esc_html__( 'Button Height/Width', 'medpluswp' ),
                'subtitle'      => esc_html__( 'Set the Height/Width of the "Back to Top button"', 'medpluswp' ),
                'desc'          => esc_html__( 'Default: 40px (Height/Width)', 'medpluswp' ),
                'default'       => 40,
                'min'           => 10,
                'step'          => 1,
                'max'           => 300,
                'display_value' => 'label'
            ),
            array(
                'id'       => 'mt_backtotop_border_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Inner Border Status.', 'medpluswp'),
                'subtitle' => esc_html__('Show or Hide the inner border.', 'medpluswp'),
                'default'  => true,
            ),
        ),
    ));
    
    // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Page Preloader', 'medpluswp' ),
        'id' => 'mt_general_preloader',
        'subsection' => true,
        'fields' => array(
            array(
                'id'   => 'mt_divider_preloader_status',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Page Preloader Status</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_preloader_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Enable Page Preloader', 'medpluswp'),
                'subtitle' => esc_html__('Enable or disable page preloader', 'medpluswp'),
                'default'  => true,
            ),
            array(
                'id'   => 'mt_divider_preloader_styling',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Page Preloader Styling</h3>', 'medpluswp' )
            ),
            array(         
                'id'       => 'mt_preloader_bg_color',
                'type'     => 'background',
                'title'    => esc_html__('Page Preloader Backgrond', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #313131', 'medpluswp'),
                'default'  => array(
                    'background-color' => '#313131',
                ),
                'output' => array(
                    '.medpluswp_preloader_holder'
                )
            ),
            array(
                'id'       => 'mt_preloader_color',
                'type'     => 'color',
                'title'    => esc_html__('Preloader color:', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'medpluswp'),
                'default'  => '#ffffff',
                'validate' => 'color',
            )
        ),
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sidebars', 'medpluswp' ),
        'id'         => 'mt_general_sidebars',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_sidebars',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Generate Infinite Number of Sidebars</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_dynamic_sidebars',
                'type'     => 'multi_text',
                'title'    => esc_html__( 'Sidebars', 'medpluswp' ),
                'subtitle' => esc_html__( 'Use the "Add More" button to create unlimited sidebars.', 'medpluswp' ),
                'add_text' => esc_html__( 'Add one more Sidebar', 'medpluswp' )
            )
        ),
    ));

    /**
    ||-> SECTION: Styling Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Styling Settings', 'medpluswp' ),
        'id'    => 'mt_styling',
        'icon'  => 'el el-icon-magic'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Global Fonts', 'medpluswp' ),
        'id'         => 'mt_styling_global_fonts',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_googlefonts',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Import Infinite Google Fonts</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_google_fonts_select',
                'type'     => 'select',
                'multi'    => true,
                'title'    => esc_html__('Import Google Font Globally', 'medpluswp'), 
                'subtitle' => esc_html__('Select one or multiple fonts', 'medpluswp'),
                'desc'     => esc_html__('Importing fonts made easy', 'medpluswp'),
                'options'  => $google_fonts_list,
                'default'  => array(
                    'Varela+Round:regular,latin',
                    'Poppins:300,regular,500,600,700,latin-ext,latin,devanagari'
                ),
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Skin color', 'medpluswp' ),
        'id'         => 'mt_styling_skin_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Links Colors(Regular, Hover, Active/Visited)</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_global_link_styling',
                'type'     => 'link_color',
                'title'    => esc_html__('Links Color Option', 'medpluswp'),
                'subtitle' => esc_html__('Only color validation can be done on this field type(Default Regular: #01AAED; Default Hover: #0095d0; Default Active: #0095d0;)', 'medpluswp'),
                'default'  => array(
                    'regular'  => '#01AAED', // blue
                    'hover'    => '#0095d0', // blue-x3
                    'active'   => '#0095d0',  // blue-x3
                    'visited'  => '#0095d0',  // blue-x3
                )
            ),
            array(
                'id'   => 'mt_divider_main_colors',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Main Colors & Backgrounds</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_style_main_texts_color',
                'type'     => 'color',
                'title'    => esc_html__('Main texts color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #01AAED', 'medpluswp'),
                'default'  => '#01AAED',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_main_backgrounds_color',
                'type'     => 'color',
                'title'    => esc_html__('Main backgrounds color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #01AAED', 'medpluswp'),
                'default'  => '#01AAED',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_main_backgrounds_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Main backgrounds color (hover)', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #0095d0', 'medpluswp'),
                'default'  => '#0095d0',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_semi_opacity_backgrounds',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Semitransparent blocks background', 'medpluswp' ),
                'default'  => array(
                    'color' => '#01AAED',
                    'alpha' => '.95'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu',
                ),
                'mode'     => 'background'
            ),
            array(
                'id'   => 'mt_divider_text_selection',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Text Selection Color & Background</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_text_selection_color',
                'type'     => 'color',
                'title'    => esc_html__('Text selection color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'medpluswp'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_text_selection_background_color',
                'type'     => 'color',
                'title'    => esc_html__('Text selection background color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #01AAED', 'medpluswp'),
                'default'  => '#01AAED',
                'validate' => 'color',
            )
        ),
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Nav Menu', 'medpluswp' ),
        'id'         => 'mt_styling_nav_menu',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_nav_menu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Menus Styling</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_nav_menu_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Text Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #232331', 'medpluswp'),
                'default'  => '#232331',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar .menu-item > a,
                                .navbar-nav .search_products a,
                                .navbar-default .navbar-nav > li > a',
                )
            ),
            array(
                'id'       => 'mt_nav_menu_color_hover_focus',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Text Color(Hover+Focus)', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #01AAED', 'medpluswp'),
                'default'  => '#01AAED',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar .menu-item:hover > a, #navbar .menu-item:focus > a, #navbar .menu-item.current-menu-item > a',
                )
            ),

            array(
                'id'       => 'mt_nav_menu_bgcolor',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Background Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'medpluswp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'transparent' => true,
                'output' => array(
                                'background-color' => ' #navbar .menu-item > a,
                                                        .navbar-nav .search_products a,
                                                        .navbar-default .navbar-nav > li > a',
                )
            ),
            array(
                'id'       => 'mt_nav_menu_bgcolor_hover_focus',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Background Color(Hover+Focus)', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'medpluswp'),
                'transparent' => true,
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar .menu-item:hover > a, #navbar .menu-item:focus > a, #navbar .menu-item.current-menu-item > a',
                )
            ),
            array(
                'id'       => 'mt_nav_menu_1st_list_holder',
                'type'     => 'spacing',
                'output'   => array( '.navbar .menu > .menu-item' ),
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                // absolute, padding, margin, defaults to padding
                // 'all'      => true,
                // Have one field that applies to all
                'top'           => true,     // Disable the top
                'right'         => true,     // Disable the right
                'bottom'        => true,     // Disable the bottom
                'left'          => true,     // Disable the left
                'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
                'units_extended'=> 'true',    // Allow users to select any type of unit
                'display_units' => 'true',   // Set to false to hide the units if the units are specified
                'title'    => __( 'Menu Items Lists (Padding)', 'medpluswp' ),
                'subtitle' => __( 'Default: Top-Bottom: 34px, Left-Right: 0px;', 'medpluswp' ),
                'default'  => array(
                    'padding-top'    => '20px',
                    'padding-right'  => '0px',
                    'padding-bottom' => '20px',
                    'padding-left'   => '0px'
                )
            ),
            array(
                'id'       => 'mt_nav_menu_1st_list_link_padding',
                'type'     => 'spacing',
                'output'   => array( '#navbar .menu-item > a' ),
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                // absolute, padding, margin, defaults to padding
                // 'all'      => true,
                // Have one field that applies to all
                'top'           => true,     // Disable the top
                'right'         => true,     // Disable the right
                'bottom'        => true,     // Disable the bottom
                'left'          => true,     // Disable the left
                'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
                'units_extended'=> 'true',    // Allow users to select any type of unit
                'display_units' => 'true',   // Set to false to hide the units if the units are specified
                'title'    => __( 'Menu Items Link (Padding)', 'medpluswp' ),
                'subtitle' => __( 'Default: Top-Bottom: 0px, Left-Right: 15px;', 'medpluswp' ),
                'default'  => array(
                    'padding-top'    => '0px',
                    'padding-right'  => '25px',
                    'padding-bottom' => '0px',
                    'padding-left'   => '25px'
                )
            ),
            array(
                'id'            => 'mt_nav_menu_1st_border_radius',
                'type'          => 'slider',
                'title'         => __( 'Menu Items Link (Border Radius)', 'medpluswp' ),
                'subtitle'      => __( 'Befault: 5px.', 'medpluswp' ),
                'default'       => 5,
                'min'           => 0,
                'step'          => 1,
                'max'           => 30,
                'display_value' => 'label',
            ),





            array(
                'id'   => 'mt_divider_nav_submenu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Submenus Styling</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_nav_submenu_background',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Background Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'medpluswp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar .sub-menu, .navbar ul li ul.sub-menu',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Text Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #232331', 'medpluswp'),
                'default'  => '#232331',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar ul.sub-menu li a',
                )
            ),

            array(
                'id'       => 'mt_nav_submenu_hover_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Link Color(Hover)', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #01AAED', 'medpluswp'),
                'default'  => '#01AAED',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar ul.sub-menu li a:hover',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_background_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Link Background(Hover)', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'medpluswp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar ul.sub-menu li a:hover, #navbar .mt-icon-list-item:hover',
                )
            ),

        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Typography', 'medpluswp' ),
        'id'         => 'mt_styling_typography',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_4',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Body Font family</h3>', 'medpluswp' )
            ),
            array(
                'id'          => 'mt_body_typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Body Font family', 'medpluswp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'line-height'  => false,
                'font-weight'  => false,
                'font-size'   => false,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array(
                    'body'
                ),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Poppins', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_5',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Headings</h3>', 'medpluswp' )
            ),
            array(
                'id'          => 'mt_heading_h1',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H1 Font family', 'medpluswp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h1, h3 *', 'h1 span'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Varela Round', 
                    'font-size' => '36px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h2',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H2 Font family', 'medpluswp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h2, h2 *'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Varela Round', 
                    'font-size' => '30px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h3',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H3 Font family', 'medpluswp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h3, h3 *'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Varela Round', 
                    'font-size' => '24px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h4',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H4 Font family', 'medpluswp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h4'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Varela Round', 
                    'font-size' => '18px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h5',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H5 Font family', 'medpluswp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h5'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Varela Round', 
                    'font-size' => '14px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h6',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H6 Font family', 'medpluswp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h6'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Varela Round', 
                    'font-size' => '12px', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_6',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Inputs & Textareas Font family</h3>', 'medpluswp' )
            ),
            array(
                'id'                => 'mt_inputs_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Inputs Font family', 'medpluswp'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'output'            => array('input', 'textarea'),
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for inputs and textareas', 'medpluswp'),
                'default'           => array(
                    'font-family'       => 'Poppins', 
                    'google'            => true
                ),
            ),
            array(
                'id'   => 'mt_divider_7',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Buttons Font family</h3>', 'medpluswp' )
            ),
            array(
                'id'                => 'mt_buttons_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Buttons Font family', 'medpluswp'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'output'            => array(
                    'input[type="submit"]'
                ),
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for buttons', 'medpluswp'),
                'default'           => array(
                    'font-family'       => 'Poppins', 
                    'google'            => true
                ),
            ),

        ),
    ));


    /**
    ||-> SECTION: Header Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Header Settings', 'medpluswp' ),
        'id'    => 'mt_header',
        'icon'  => 'el el-icon-arrow-up'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header - General', 'medpluswp' ),
        'id'         => 'mt_header_general',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_generalheader',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Global Header Options</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_header_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Select Header layout', 'medpluswp' ),
                'options'  => array(
                    'header1' => array(
                        'alt' => esc_html__('Header #1', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/1.png'
                    ),
                    'header2' => array(
                        'alt' => esc_html__('Header #2', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/2.png'
                    ),
                    'header5' => array(
                        'alt' => esc_html__('Header #5', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/5.png'
                    ),
                    'header8' => array(
                        'alt' => esc_html__('Header #8', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/8.png'
                    ),
                    'header9' => array(
                        'alt' => esc_html__('Header #9', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/9.png'
                    ),
                ),
                'default'  => 'header1'
            ),
            array(
                'id'       => 'mt_is_nav_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Navigation Menu?', 'medpluswp'),
                'subtitle' => esc_html__('Enable or disable "sticky positioned navigation menu".', 'medpluswp'),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'medpluswp' ),
                'off'      => esc_html__( 'Disabled', 'medpluswp' )
            ),
            array(
                'id'   => 'mt_divider_header_stat',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Search Icon Settings(from header)</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_header_is_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Search Icon Status', 'medpluswp'),
                'subtitle' => esc_html__('Enable or Disable Search Icon".', 'medpluswp'),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'medpluswp' ),
                'off'      => esc_html__( 'Disabled', 'medpluswp' )
            ),
            array(
                'id'   => 'mt_divider_header_info_1',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info First</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_divider_header_info_1_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Info 1 Status', 'medpluswp' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Info 1', 'medpluswp' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_1_media_type',
                'type'     => 'switch',
                'title'    => esc_html__( 'Media Type', 'medpluswp' ),
                'subtitle' => esc_html__( 'Choose to upload an image icon or select a font icon', 'medpluswp' ),
                'default'  => 1,
                'on'       => 'FontAwesome Icon',
                'off'      => 'Image Icon',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_1_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_html__('Icon for Header Info 1', 'medpluswp'),
                'options'  => $icons,
                'default'  => 'fa fa-clock-o',
                'required' => array( 
                    array('mt_divider_header_info_1_status', '=', '1'), 
                    array('mt_divider_header_info_1_media_type','=','1') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_1_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Upload Image Icon', 'medpluswp'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_1_status', '=', '1'), 
                    array('mt_divider_header_info_1_media_type','=','0') 
                ),
                'default' => array('url' => get_template_directory_uri().'/images/icon1.svg'),
            ),
            array(
                'id' => 'mt_divider_header_info_1_heading1',
                'type' => 'text',
                'title' => esc_html__('Header Info first - Title', 'medpluswp'),
                'subtitle' => esc_html__('Type header info first title', 'medpluswp'),
                'default' => 'Monday - Friday 09:00 - 19:00',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_divider_header_info_1_heading3',
                'type' => 'text',
                'title' => esc_html__('Header Info first - Subtitle', 'medpluswp'),
                'subtitle' => esc_html__('Type header info first subtitle', 'medpluswp'),
                'default' => 'Saturday and Sunday - CLOSED',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id'   => 'mt_divider_header_info_2',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info Second</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_divider_header_info_2_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Info 2 Status', 'medpluswp' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Info 2', 'medpluswp' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_2_media_type',
                'type'     => 'switch',
                'title'    => esc_html__( 'Media Type', 'medpluswp' ),
                'subtitle' => esc_html__( 'Choose to upload an image icon or select a font icon', 'medpluswp' ),
                'default'  => 1,
                'on'       => 'FontAwesome Icon',
                'off'      => 'Image Icon',
                'required' => array( 'mt_divider_header_info_2_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_2_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_html__('Icon for Header Info 2', 'medpluswp'),
                'options'  => $icons,
                'default'  => 'fa fa-mobile-phone',
                'required' => array( 
                    array('mt_divider_header_info_2_status', '=', '1'), 
                    array('mt_divider_header_info_2_media_type','=','1') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_2_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Upload Image Icon', 'medpluswp'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_2_status', '=', '1'), 
                    array('mt_divider_header_info_2_media_type','=','0') 
                ),
                'default' => array('url' => get_template_directory_uri().'/images/icon2.svg'),
            ),
            array(
                'id' => 'mt_divider_header_info_2_heading1',
                'type' => 'text',
                'title' => esc_html__('Header Info Second - Title', 'medpluswp'),
                'subtitle' => esc_html__('Type header info Second title', 'medpluswp'),
                'default' => '+9090 8080 4044',
                'required' => array( 'mt_divider_header_info_2_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_divider_header_info_2_heading3',
                'type' => 'text',
                'title' => esc_html__('Header Info Second - Subtitle', 'medpluswp'),
                'subtitle' => esc_html__('Type header info Second subtitle', 'medpluswp'),
                'default' => 'contact@medplus.com',
                'required' => array( 'mt_divider_header_info_2_status', '=', '1' ),
            ),
            array(
                'id'   => 'mt_divider_header_info_3',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info Third</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_divider_header_info_3_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Info 3 Status', 'medpluswp' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Info 3', 'medpluswp' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_3_media_type',
                'type'     => 'switch',
                'title'    => esc_html__( 'Media Type', 'medpluswp' ),
                'subtitle' => esc_html__( 'Choose to upload an image icon or select a font icon', 'medpluswp' ),
                'default'  => 1,
                'on'       => 'FontAwesome Icon',
                'off'      => 'Image Icon',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_3_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_html__('Icon for Header Info 3', 'medpluswp'),
                'options'  => $icons,
                'default'  => 'fa fa-map-marker',
                'required' => array( 
                    array('mt_divider_header_info_3_status', '=', '1'), 
                    array('mt_divider_header_info_3_media_type','=','1') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_3_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Upload Image Icon', 'medpluswp'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_3_status', '=', '1'), 
                    array('mt_divider_header_info_3_media_type','=','0') 
                ),
                'default' => array('url' => get_template_directory_uri().'/images/icon3.svg'),
            ),
            array(
                'id' => 'mt_divider_header_info_3_heading1',
                'type' => 'text',
                'title' => esc_html__('Header Info Third - Title', 'medpluswp'),
                'subtitle' => esc_html__('Type header info Third title', 'medpluswp'),
                'default' => 'Pensilvenia Avenue',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_divider_header_info_3_heading3',
                'type' => 'text',
                'title' => esc_html__('Header Info Third - Subtitle', 'medpluswp'),
                'subtitle' => esc_html__('Type header info Third subtitle', 'medpluswp'),
                'default' => 'New York',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),


        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Logo &amp; Favicon', 'medpluswp' ),
        'id'         => 'mt_header_logo',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_logo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Logo Settings</h3>', 'medpluswp' )
            ),
            array(
                'id' => 'mt_logo',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Logo image', 'medpluswp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/theme_logo.svg'),
            ),
            array(
                'id'        => 'mt_logo_max_width',
                'type'      => 'slider',
                'title'     => esc_html__('Logo Max Width', 'medpluswp'),
                'subtitle'  => esc_html__('Use the slider to increase/decrease max size of the logo.', 'medpluswp'),
                'desc'      => esc_html__('Min: 1px, max: 500px, step: 1px, default value: 180px', 'medpluswp'),
                "default"   => 180,
                "min"       => 1,
                "step"      => 1,
                "max"       => 500,
                'display_value' => 'label'
            ),
            array(
                'id'   => 'mt_divider_favicon',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Favicon Settings</h3>', 'medpluswp' )
            ),
            array(
                'id' => 'mt_favicon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Favicon url', 'medpluswp'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Use the upload button to import media.', 'medpluswp'),
                'default' => array('url' => get_template_directory_uri().'/images/theme_favicon.svg'),
            )
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header - Main Big', 'medpluswp' ),
        'id'         => 'mt_header_bottom_main',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_mainheader',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Main Header Options</h3>', 'medpluswp' )
            ),
            array(         
                'id'       => 'mt_header_main_background',
                'type'     => 'background',
                'title'    => esc_html__('Header (main-header) - background', 'medpluswp'),
                'subtitle' => esc_html__('Default color: #232331', 'medpluswp'),
                'output'      => array('.navbar-default'),
                'default'  => array(
                    'background-color' => '#232331',
                )
            ),
            array(
                'id'       => 'mt_header_main_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Main Header texts color', 'medpluswp'), 
                'subtitle' => esc_html__('Default color: #FFFFFF', 'medpluswp'),
                'default'  => '#FFFFFF',
                'validate' => 'color',
                'output'    => array(
                    'color' => 'header',
                ),
            )
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Fixed Sidebar Menu', 'medpluswp' ),
        'id'         => 'mt_header_fixed_sidebar_menu',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_fixed_headerstatus',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Status</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Burger Sidebar Menu Status', 'medpluswp' ),
                'subtitle' => esc_html__( 'Enable/Disable Burger Sidebar Menu Status', 'medpluswp' ),
                'desc'     => esc_html__( 'This Option Will Enable/Disable The Navigation Burger + Sidebar Menu triggered by the burger menu', 'medpluswp' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),

            array(
                'id'   => 'mt_divider_fixed_header',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Other Options</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_bgs',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sidebar Menu Background', 'medpluswp' ),
                'subtitle' => esc_html__( 'Default: #fff - Opacity: 1', 'medpluswp' ),
                'default'   => array(
                    'color'     => '#fff',
                    'alpha'     => '1'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu'
                ),
                // These options display a fully functional color palette.  Omit this argument
                // for the minimal color picker, and change as desired.
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Texts Color', 'medpluswp'), 
                'default'  => '#2f383d',
                'validate' => 'color',
                'output' => array(
                    'color' => '.fixed-sidebar-menu .icon-close'
                ),


                
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_site_title_status',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Show Title or Logo', 'medpluswp' ),
                'subtitle' => esc_html__( 'Choose what to show on fixed sidebar', 'medpluswp' ),
                'desc'     => esc_html__( 'Choose Between Site Title or Site Logo', 'medpluswp' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'site_title' => 'Title',
                    'site_logo' => 'Logo',
                    'site_nothing' => 'Disable This Feature'
                ),
                'default'  => 'site_title'
            ),
        ),
    ) );

    /**

    ||-> SECTION: Footer Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Footer Settings', 'medpluswp' ),
        'id'    => 'mt_footer',
        'icon'  => 'el el-icon-arrow-down'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Styling', 'medpluswp' ),
        'id'         => 'mt_footer_styling',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_footer_styling',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Footer Widgets Rows</h3>', 'medpluswp' )
            ),
            array(         
                'id'       => 'mt_footer_top_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer (top) - background', 'medpluswp'),
                'subtitle' => esc_html__('Footer background with image or color.', 'medpluswp'),
                'output'      => array('footer.theme-footer'),
                'default'  => array(
                    'background-color' => '#303030',
                    'background-repeat' => 'repeat',
                    'background-position' => 'center center',
                    'background-image' => get_template_directory_uri().'/images/mt_medplus_footer_transparent_bg.png',
                )
            ),
            array(
                'id'        => 'mt_footer_top_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Top Text Color', 'medpluswp' ),
                'subtitle'  => esc_html__( 'Set color and alpha channel', 'medpluswp' ),
                'desc'      => esc_html__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'medpluswp' ),
                'output'    => array('color' => 'footer .footer-top h1.widget-title, footer .footer-top h3.widget-title, footer .footer-top .widget-title'),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
        ),
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Widgets Rows', 'medpluswp' ),
        'id'         => 'mt_footer_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_footer_row1',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Footer Rows - Row #1</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_footer_row_1',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #1 - Status', 'medpluswp' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 1', 'medpluswp' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_1_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #1 - Layout', 'medpluswp' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'medpluswp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),
                ),
                'default'  => 'column_half_sub_half',
                'required' => array( 'mt_footer_row_1', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_1_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #1 - Padding', 'medpluswp'),
                'subtitle'       => esc_html__('Choose the spacing for the first row from footer.', 'medpluswp'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '80px', 
                    'padding-bottom'  => '0px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_1margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #1 - Margin', 'medpluswp'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'medpluswp'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '0px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_1border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #1 - Borders', 'medpluswp'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'medpluswp'),
                'output'   => array('.footer-row-1'),
                'all'      => false,
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '0', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row2',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Footer Rows - Row #2</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_footer_row_2',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #2 - Status', 'medpluswp' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 2', 'medpluswp' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_2_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #1 - Layout', 'medpluswp' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),

                ),
                'default'  => '1',
                'required' => array( 'mt_footer_row_2', '=', '1' ),
            ),
            array(
                'id'             => 'footer_row_2_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #2 - Padding', 'medpluswp'),
                'subtitle'       => esc_html__('Choose the spacing for the second row from footer.', 'medpluswp'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '0px', 
                    // 'padding-right'   => '0px', 
                    'padding-bottom'  => '40px', 
                    // 'padding-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_2margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #2 - Margin', 'medpluswp'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'medpluswp'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    // 'margin-right'   => '0px', 
                    'margin-bottom'  => '0px', 
                    // 'margin-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_2border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #2 - Borders', 'medpluswp'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'medpluswp'),
                'output'   => array('.footer-row-2'),
                'all'      => false,
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '0', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row3',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Footer Rows - Row #3</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_footer_row_3',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #3 - Status', 'medpluswp' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 3', 'medpluswp' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_3_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #3 - Layout', 'medpluswp' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),

                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_3', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_3_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #3 - Padding', 'medpluswp'),
                'subtitle'       => esc_html__('Choose the spacing for the third row from footer.', 'medpluswp'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '0px', 
                    // 'padding-right'   => '0px', 
                    'padding-bottom'  => '40px', 
                    // 'padding-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_3margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #3 - Margin', 'medpluswp'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'medpluswp'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    // 'margin-right'   => '0px', 
                    'margin-bottom'  => '20px', 
                    // 'margin-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_3border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #3 - Borders', 'medpluswp'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'medpluswp'),
                'output'   => array('.footer-row-3'),
                'all'      => false,
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            )
        ),
    ));



    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Copyright Bar', 'medpluswp' ),
        'id'         => 'mt_footer_bottom',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_footer_text',
                'type' => 'editor',
                'title' => esc_html__('Footer Copyright Text', 'medpluswp'),
                'default' => 'Copyright by <a href="#">ModelTheme</a>. All Rights Reserved.',
            ),
            array(
                'id'        => 'mt_footer_bottom_background',
                'type'      => 'color_rgba',
                'title'    => esc_html__('Footer Copyright Bar Background', 'medpluswp'),
                'subtitle' => esc_html__('Footer Copyright Bar Background (it can be semitransparent or transparent)', 'medpluswp'),
                'output'    => array('background-color' => 'footer .footer'),
                'default'   => array(
                    'color'     => '#222222',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'        => 'mt_footer_bottom_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Copyrigt Text Color', 'medpluswp' ),
                'subtitle'  => esc_html__( 'Set color and alpha channel', 'medpluswp' ),
                'desc'      => esc_html__( 'Set color and alpha channel for footer texts', 'medpluswp' ),
                'output'    => array('color' => 'footer .footer h1.widget-title, footer .footer h3.widget-title, footer .footer .widget-title'),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
        ),
    ));



    /**

    ||-> SECTION: Contact Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Contact Settings', 'medpluswp' ),
        'id'    => 'mt_contact',
        'icon'  => 'el el-icon-map-marker-alt'
    ));
    // GENERAL
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Contact', 'medpluswp' ),
        'id'         => 'mt_contact_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_contact_phone',
                'type' => 'text',
                'title' => esc_html__('Phone Number', 'medpluswp'),
                'subtitle' => esc_html__('Contact phone number displayed on the contact us page.', 'medpluswp'),
                'default' => ' +1 777 3321 2312'
            ),
            array(
                'id' => 'mt_contact_email',
                'type' => 'text',
                'title' => esc_html__('Email', 'medpluswp'),
                'subtitle' => esc_html__('Contact email displayed on the contact us page., additional info is good in here.', 'medpluswp'),
                'validate' => 'email',
                'msg' => 'custom error message',
                'default' => 'hello@medpluswp.tld'
            ),
            array(
                'id' => 'mt_contact_address',
                'type' => 'text',
                'title' => esc_html__('Address', 'medpluswp'),
                'subtitle' => esc_html__('Enter your contact address', 'medpluswp'),
                'default' => '321 Education Street, New York, NY, USA'
            )
        ),
    ));





    /**

    ||-> SECTION: Blog Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Blog Settings', 'medpluswp' ),
        'id'    => 'mt_blog',
        'icon'  => 'el el-icon-comment'
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Archive', 'medpluswp' ),
        'id'         => 'mt_blog_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Blog List Layout</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Blog List Layout', 'medpluswp' ),
                'subtitle' => esc_html__( 'Select Blog List layout.', 'medpluswp' ),
                'options'  => array(
                    'mt_blog_left_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Left sidebar', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_blog_fullwidth' => array(
                        'alt' => esc_html__('1 Column - Full width', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_blog_right_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Right sidebar', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_blog_right_sidebar'
            ),
            array(
                'id'       => 'mt_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Blog List Sidebar', 'medpluswp' ),
                'subtitle' => esc_html__( 'Select Blog List Sidebar.', 'medpluswp' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_blog_layout', '!=', 'mt_blog_fullwidth'),
            ),
            array(
                'id'        => 'mt_blog_display_type',
                'type'      => 'select',
                'title'     => esc_html__('How to display posts', 'medpluswp'),
                'subtitle'  => esc_html__('Select how you want to display post on blog list.', 'medpluswp'),
                'options'   => array(
                        'list'   => 'List',
                        'grid'   => 'Grid'
                    ),
                'default'   => 'list',
            ),
            array(
                'id'   => 'mt_divider_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Blog List Elements</h3>', 'medpluswp' )
            ),
            array(
                'id' => 'mt_sticky_post_title',
                'type' => 'text',
                'title' => esc_html__('Sticky Post Title', 'medpluswp'),
                'subtitle' => esc_html__('Enter the text you want to display as sticky post title.', 'medpluswp'),
                'default' => 'Sticky Posts'
            ),
            array(
                'id' => 'mt_blog_post_title',
                'type' => 'text',
                'title' => esc_html__('Blog Post Title', 'medpluswp'),
                'subtitle' => esc_html__('Enter the text you want to display as blog post title.', 'medpluswp'),
                'default' => 'All Blog Posts'
            )
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Author Archive', 'medpluswp' ),
        'id'         => 'mt_blog_author_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_author_posts_header_image',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Author Posts Archive Header Image</h3>', 'medpluswp' )
            ),
            array(
                'id' => 'mt_author_posts_header_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Author Posts Archive Header Image', 'medpluswp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/mt_author_page_img_500.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Categories Archive', 'medpluswp' ),
        'id'         => 'mt_blog_categories_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_categories_posts_header_image',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Blog Categories Archive Header Image</h3>', 'medpluswp' )
            ),
            array(
                'id' => 'mt_categories_posts_header_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Blog Categories Archive Header Image', 'medpluswp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/mt_author_page_img_500.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Tags Archive', 'medpluswp' ),
        'id'         => 'mt_blog_tags_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_tags_posts_header_image',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Blog Tags Archive Header Image</h3>', 'medpluswp' )
            ),
            array(
                'id' => 'mt_tags_posts_header_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Blog Tags Archive Header Image', 'medpluswp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/mt_author_page_img_500.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Search Archive', 'medpluswp' ),
        'id'         => 'mt_blog_search_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_search_posts_header_img',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Search Archive Header Image</h3>', 'medpluswp' )
            ),
            array(
                'id' => 'mt_search_posts_header_img',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Search Archive Header Image', 'medpluswp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/mt_search_archive_500.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Post', 'medpluswp' ),
        'id'         => 'mt_blog_single_pos',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_single_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Single Blog List Layout</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_single_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Single Blog List Layout', 'medpluswp' ),
                'subtitle' => esc_html__( 'Select Blog List layout.', 'medpluswp' ),
                'options'  => array(
                    'mt_single_blog_left_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Left sidebar', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_single_blog_fullwidth' => array(
                        'alt' => esc_html__('1 Column - Full width', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_single_blog_right_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Right sidebar', 'medpluswp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_single_blog_fullwidth'
            ),
            array(
                'id'       => 'mt_single_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Single Blog List Sidebar', 'medpluswp' ),
                'subtitle' => esc_html__( 'Select Blog List Sidebar.', 'medpluswp' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_single_blog_layout', '!=', 'mt_single_blog_fullwidth'),
            ),
            array(
                'id'   => 'mt_divider_single_blog_typo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Single Blog Post Font family</h3>', 'medpluswp' )
            ),
            array(
                'id'          => 'mt_single_post_typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Blog Post Font family', 'medpluswp'),
                'subtitle'    => esc_html__( 'Default color: #454646; Font-size: 18px; Line-height: 29px;', 'medpluswp' ),
                'google'      => true, 
                'font-size'   => true,
                'line-height' => true,
                'color'       => true,
                'font-backup' => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'font-weight'  => false,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('.single article .article-content p'),
                'units'       =>'px',
                'default'     => array(
                    'color' => '#454646', 
                    'font-size' => '16px', 
                    'line-height' => '25px', 
                    'font-family' => 'Poppins', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_single_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Other Single Post Elements</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_enable_related_posts',
                'type'     => 'switch', 
                'title'    => esc_html__('Related Posts', 'medpluswp'),
                'subtitle' => esc_html__('Enable or disable related posts', 'medpluswp'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_post_navigation',
                'type'     => 'switch', 
                'title'    => esc_html__('Post Navigation', 'medpluswp'),
                'subtitle' => esc_html__('Enable or disable post navigation', 'medpluswp'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_authorbio',
                'type'     => 'switch', 
                'title'    => esc_html__('About Author', 'medpluswp'),
                'subtitle' => esc_html__('Enable or disable "About author" section on single post', 'medpluswp'),
                'default'  => true,
            ),
        ),
    ));


    /**
    ||-> SECTION: Error 404 Page Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( '404 Page Settings', 'medpluswp' ),
        'id'    => 'mt_error404',
        'icon'  => 'el el-icon-error'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Page', 'medpluswp' ),
        'id'         => 'error404-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mt_404_page',
                'type'     => 'select',
                'title'    => esc_html__('Select page', 'medpluswp'), 
                'data'     => 'page'
            )
        ),
    ));


    /**
    ||-> SECTION: Elements
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Elements', 'medpluswp' ),
        'id'    => 'mt_elements',
        'icon'  => 'el el-puzzle'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Tabs', 'medpluswp' ),
        'id'         => 'mt_elements_tabs',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_elements_tabs_normal',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Tabs - Normal State</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_elements_tabs_normal_color',
                'type'     => 'color',
                'title'    => esc_html__('Tabs Text Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #666666', 'medpluswp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a' ),
                'default'  => '#666666',
            ),
            array(
                'id'       => 'mt_elements_tabs_background',
                'type'     => 'color',
                'title'    => esc_html__('Tabs Background Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #f8f8f8', 'medpluswp'),
                'output'    => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels,
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a',
                ),
                'default'  => '#f8f8f8',
            ),
            array(
                'id'       => 'mt_elements_tabs_border',
                'type'     => 'color',
                'title'    => esc_html__('Tabs Border Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #f0f0f0', 'medpluswp'),
                'output'    => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels, 
                                        .vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels::after, 
                                        .vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels::before,
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a'
                ),
                'default'  => '#f0f0f0',
            ),
            array(
                'id'   => 'mt_divider_elements_tabs_hover',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Tabs - Hover State</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_elements_hover_tabs_normal_color',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Text Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #666666', 'medpluswp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a' ),
                'default'  => '#666666',
            ),
            array(         
                'id'       => 'mt_elements_hover_tabs_background',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Background', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #ebebeb', 'medpluswp'),
                'default'  => '#ebebeb',
                'output' => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a'
                )
            ),
            array(         
                'id'       => 'mt_elements_hover_tabs_border',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Border Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #e3e3e3', 'medpluswp'),
                'default'  => '#e3e3e3',
                'output' => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a'
                )
            )
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blockquotes', 'medpluswp' ),
        'id'         => 'mt_elements_blockquotes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_elements_blockquotes',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Blockquotes Styling</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_elements_blockquotes_background',
                'type'     => 'color',
                'title'    => esc_html__('Blockquotes Background Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #f6f6f6', 'medpluswp'),
                'output'    => array(
                    'background-color' => 'blockquote',
                ),
                'default'  => '#f6f6f6',
            ),
            array(         
                'id'       => 'mt_elements_blockquotes_border',
                'type'     => 'color',
                'title'    => esc_html__('Blockquotes Border Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #01AAED', 'medpluswp'),
                'default'  => '#01AAED',
                'output' => array(
                    'border-color' => 'blockquote'
                )
            )
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Accordions', 'medpluswp' ),
        'id'         => 'mt_elements_accordions',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_elements_accordions_normal',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Accordions - Normal State</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_elements_accordions_normal_color',
                'type'     => 'color',
                'title'    => esc_html__('Accordions Text Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #666666', 'medpluswp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a' ),
                'default'  => '#666666',
            ),
            array(
                'id'       => 'mt_elements_accordions_background',
                'type'     => 'color',
                'title'    => esc_html__('Accordions Background Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #f8f8f8', 'medpluswp'),
                'output'    => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading',
                ),
                'default'  => '#f8f8f8',
            ),
            array(
                'id'       => 'mt_elements_accordions_border',
                'type'     => 'color',
                'title'    => esc_html__('Accordions Border Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #f0f0f0', 'medpluswp'),
                'output'    => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading'
                ),
                'default'  => '#f0f0f0',
            ),
            array(
                'id'   => 'mt_divider_elements_accordions_hover',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Accordions - Active&Hover State</h3>', 'medpluswp' )
            ),
            array(
                'id'       => 'mt_elements_accordions_hover_color',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Text Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #666666', 'medpluswp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a' ),
                'default'  => '#666666',
            ),
            array(
                'id'       => 'mt_elements_accordions_hover_background',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Background Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #f8f8f8', 'medpluswp'),
                'output'    => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading,
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body,
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus, 
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover',
                ),
                'default'  => '#f8f8f8',
            ),
            array(
                'id'       => 'mt_elements_accordions_hover_border',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Border Color', 'medpluswp'), 
                'subtitle' => esc_html__('Default: #f0f0f0', 'medpluswp'),
                'output'    => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading,
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body, 
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body::after, 
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body::before'
                ),
                'default'  => '#f0f0f0',
            ),
        ),
    ));


    /**
    ||-> SECTION: Social Media Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Social Media Settings', 'medpluswp' ),
        'id'    => 'mt_social_media',
        'icon'  => 'el el-icon-myspace'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social Media', 'medpluswp' ),
        'id'         => 'mt_social_media_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_global_social_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Global Social Links</h3>', 'medpluswp' )
            ),
            array(
                'id' => 'mt_social_fb',
                'type' => 'text',
                'title' => esc_html__('Facebook URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Facebook url.', 'medpluswp'),
                'validate' => 'url',
                'default' => 'http://facebook.com'
            ),
            array(
                'id' => 'mt_social_tw',
                'type' => 'text',
                'title' => esc_html__('Twitter username', 'medpluswp'),
                'subtitle' => esc_html__('Type your Twitter username.', 'medpluswp'),
                'default' => 'envato'
            ),
            array(
                'id' => 'mt_social_pinterest',
                'type' => 'text',
                'title' => esc_html__('Pinterest URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Pinterest url.', 'medpluswp'),
                'validate' => 'url',
                'default' => 'http://pinterest.com'
            ),
            array(
                'id' => 'mt_social_skype',
                'type' => 'text',
                'title' => esc_html__('Skype Name', 'medpluswp'),
                'subtitle' => esc_html__('Type your Skype username.', 'medpluswp'),
                'default' => 'medpluswp'
            ),
            array(
                'id' => 'mt_social_instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Instagram url.', 'medpluswp'),
                'validate' => 'url',
                'default' => 'http://instagram.com'
            ),
            array(
                'id' => 'mt_social_youtube',
                'type' => 'text',
                'title' => esc_html__('YouTube URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your YouTube url.', 'medpluswp'),
                'validate' => 'url',
                'default' => 'http://youtube.com'
            ),
            array(
                'id' => 'mt_social_dribbble',
                'type' => 'text',
                'title' => esc_html__('Dribbble URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Dribbble url.', 'medpluswp'),
                'validate' => 'url',
                'default' => 'http://dribbble.com'
            ),
            array(
                'id' => 'mt_social_gplus',
                'type' => 'text',
                'title' => esc_html__('Google+ URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Google+ url.', 'medpluswp'),
                'validate' => 'url',
                'default' => 'http://plus.google.com'
            ),
            array(
                'id' => 'mt_social_linkedin',
                'type' => 'text',
                'title' => esc_html__('LinkedIn URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your LinkedIn url.', 'medpluswp'),
                'validate' => 'url',
                'default' => 'http://linkedin.com'
            ),
            array(
                'id' => 'mt_social_deviantart',
                'type' => 'text',
                'title' => esc_html__('Deviant Art URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Deviant Art url.', 'medpluswp'),
                'validate' => 'url',
                'default' => 'http://deviantart.com'
            ),
            array(
                'id' => 'mt_social_digg',
                'type' => 'text',
                'title' => esc_html__('Digg URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Digg url.', 'medpluswp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_flickr',
                'type' => 'text',
                'title' => esc_html__('Flickr URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Flickr url.', 'medpluswp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_stumbleupon',
                'type' => 'text',
                'title' => esc_html__('Stumbleupon URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Stumbleupon url.', 'medpluswp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_tumblr',
                'type' => 'text',
                'title' => esc_html__('Tumblr URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Tumblr url.', 'medpluswp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_vimeo',
                'type' => 'text',
                'title' => esc_html__('Vimeo URL', 'medpluswp'),
                'subtitle' => esc_html__('Type your Vimeo url.', 'medpluswp'),
                'validate' => 'url',
                'default' => ''
            )
        ),
    ));
    /*
     * <--- END SECTIONS
     */
