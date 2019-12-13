<?php

if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}


/**
||-> medpluswp_redux
*/
function medpluswp_redux($redux_meta_name1,$redux_meta_name2 = ''){

    global  $medpluswp_redux;

    $html = '';
    if (isset($redux_meta_name1) && !empty($redux_meta_name2)) {
        $html = $medpluswp_redux[$redux_meta_name1][$redux_meta_name2];
    }elseif(isset($redux_meta_name1) && empty($redux_meta_name2)){
        $html = $medpluswp_redux[$redux_meta_name1];
    }
    
    return $html;

}


/**
||-> medpluswp_setup
*/
function medpluswp_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on medpluswp, use a find and replace
     * to change 'medpluswp' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'medpluswp', get_template_directory() . '/languages' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary menu', 'medpluswp' ),
        'footer'  => esc_html__( 'Footer Menu', 'medpluswp' ),
    ) );

    global  $medpluswp_redux;

    // ADD THEME SUPPORT
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );// Switch default core markup for search form, comment form, and comments to output valid HTML5.
    // Enable support for Post Formats.
    add_theme_support( 'custom-background', apply_filters( 'smartowl_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );// Set up the WordPress core custom background feature.

}
add_action( 'after_setup_theme', 'medpluswp_setup' );



/**
||-> Register widget area.
||-> @link http://codex.wordpress.org/Function_Reference/register_sidebar
*/
function medpluswp_widgets_init() {

    global  $medpluswp_redux;

    register_sidebar( array(
        'name'          => esc_attr__( 'Sidebar', 'medpluswp' ),
        'id'            => 'sidebar-1',
        'description'   => esc_attr__( 'Sidebar 1', 'medpluswp' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );

    if (!empty($medpluswp_redux['mt_dynamic_sidebars'])){
        foreach ($medpluswp_redux['mt_dynamic_sidebars'] as &$value) {
            $id           = str_replace(' ', '', $value);
            $id_lowercase = strtolower($id);
            if ($id_lowercase) {
                register_sidebar( array(
                    'name'          => $value,
                    'id'            => $id_lowercase,
                    'description'   => esc_attr__( 'Sidebar ', 'medpluswp' ) . $value,
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }
    

    // FOOTER ROW 1
    if (isset($medpluswp_redux['mt_footer_row_1_layout'])) {
        $footer_row_1 = $medpluswp_redux['mt_footer_row_1_layout'];
        $nr1 = array("1", "2", "3", "4", "5", "6");
        if (in_array($footer_row_1, $nr1)) {
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','medpluswp').esc_html($i),
                    'id'            => 'footer_row_1_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_1 == 'column_half_sub_half' || $footer_row_1 == 'column_sub_half_half') {
            $footer_row_1 = '3';
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'id'            => 'footer_row_1_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_1 == 'column_sub_fourth_third' || $footer_row_1 == 'column_third_sub_fourth') {
            $footer_row_1 = '5';
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','medpluswp').esc_html($i),
                    'id'            => 'footer_row_1_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_1 == 'column_sub_third_half' || $footer_row_1 == 'column_half_sub_third') {
            $footer_row_1 = '4';
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','medpluswp').esc_html($i),
                    'id'            => 'footer_row_1_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }


    // FOOTER ROW 2
    if (isset($medpluswp_redux['mt_footer_row_2_layout'])) {
        $footer_row_2 = $medpluswp_redux['mt_footer_row_2_layout'];
        $nr2 = array("1", "2", "3", "4", "5", "6");
        if (in_array($footer_row_2, $nr2)) {
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','medpluswp').esc_html($i),
                    'id'            => 'footer_row_2_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_2 == 'column_half_sub_half' || $footer_row_2 == 'column_sub_half_half') {
            $footer_row_2 = '3';
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','medpluswp').esc_html($i),
                    'id'            => 'footer_row_2_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_2 == 'column_sub_fourth_third' || $footer_row_2 == 'column_third_sub_fourth') {
            $footer_row_2 = '5';
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','medpluswp').esc_html($i),
                    'id'            => 'footer_row_2_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_2 == 'column_sub_third_half' || $footer_row_2 == 'column_half_sub_third') {
            $footer_row_2 = '4';
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','medpluswp').esc_html($i),
                    'id'            => 'footer_row_2_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }


    // FOOTER ROW 3
    if (isset($medpluswp_redux['mt_footer_row_3_layout'])) {
        $footer_row_3 = $medpluswp_redux['mt_footer_row_3_layout'];
        $nr3 = array("1", "2", "3", "4", "5", "6");
        if (in_array($footer_row_3, $nr3)) {
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ', 'medpluswp').esc_html($i),
                    'id'            => 'footer_row_3_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_3 == 'column_half_sub_half' || $footer_row_3 == 'column_sub_half_half') {
            $footer_row_3 = '3';
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','medpluswp').esc_html($i),
                    'id'            => 'footer_row_3_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_3 == 'column_sub_fourth_third' || $footer_row_3 == 'column_third_sub_fourth') {
            $footer_row_3 = '5';
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','medpluswp').esc_html($i),
                    'id'            => 'footer_row_3_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_3 == 'column_sub_third_half' || $footer_row_3 == 'column_half_sub_third') {
            $footer_row_3 = '4';
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','medpluswp').esc_html($i),
                    'id'            => 'footer_row_3_'.esc_html($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'medpluswp' ) . esc_html($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }
}
add_action( 'widgets_init', 'medpluswp_widgets_init' );


/**
||-> Enqueue scripts and styles.
*/
function medpluswp_scripts() {

    global  $medpluswp_redux;

    //STYLESHEETS
    wp_enqueue_style( "font-awesome", get_template_directory_uri()."/css/font-awesome.min.css" );
    wp_enqueue_style( "medpluswp-responsive", get_template_directory_uri()."/css/responsive.css" );
    wp_enqueue_style( "medpluswp-media-screens", get_template_directory_uri()."/css/media-screens.css" );
    wp_enqueue_style( "owl-carousel", get_template_directory_uri()."/css/owl.carousel.css" );
    wp_enqueue_style( "owl-theme", get_template_directory_uri()."/css/owl.theme.css" );
    wp_enqueue_style( "animate", get_template_directory_uri()."/css/animate.css" );
    wp_enqueue_style( "medpluswp-header-style", get_theme_file_uri("/css/styles-headers.css") );
    wp_enqueue_style( "medpluswp-footer-style", get_theme_file_uri("/css/styles-footer.css") );
    wp_enqueue_style( "medpluswp-mt-style", get_template_directory_uri()."/css/styles.css" );
    wp_enqueue_style( "medpluswp-style", get_stylesheet_uri() );
    wp_enqueue_style( "sidebarEffects", get_template_directory_uri()."/css/sidebarEffects.css" );
    wp_enqueue_style( "loaders", get_template_directory_uri()."/css/loaders.css" );
    wp_enqueue_style( "simple-line-icons", get_template_directory_uri()."/css/simple-line-icons.css" );
    // Enqueue style if gutenberg is active
    wp_enqueue_style( "medpluswp-gutenberg-frontend", get_template_directory_uri()."/css/gutenberg-frontend.css" );
    // JS COMPOSER
    wp_enqueue_style( "js_composer", get_template_directory_uri()."/css/js_composer.css" );


    //SCRIPTS
    wp_enqueue_script( "modernizr", get_template_directory_uri() . "/js/modernizr.min.js", array("jquery"), "2.6.2", true );
    wp_enqueue_script( "classie", get_template_directory_uri() . "/js/classie.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "jquery-form", get_template_directory_uri() . "/js/jquery.form.js", array("jquery"), "3.51", true );
    wp_enqueue_script( "jquery-ketchup", get_template_directory_uri() . "/js/jquery.ketchup.js", array("jquery"), "0.3.1", true );
    wp_enqueue_script( "jquery-validation", get_template_directory_uri() . "/js/jquery.validation.js", array("jquery"), "1.13.1", true );
    wp_enqueue_script( "jquery-sticky", get_template_directory_uri() . "/js/jquery.sticky.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "uisearch", get_template_directory_uri() . "/js/uisearch.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "jquery-parallax", get_template_directory_uri() . "/js/jquery.parallax.js", array("jquery"), "1.1.3", true );
    wp_enqueue_script( "jquery-appear", get_template_directory_uri() . "/js/jquery.appear.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "jquery-countto", get_template_directory_uri() . "/js/jquery.countTo.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "sidebarEffects", get_template_directory_uri() . "/js/sidebarEffects.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "owl-carousel", get_template_directory_uri() . "/js/owl.carousel.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "modernizr-viewport", get_template_directory_uri() . "/js/modernizr.viewport.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "bootstrap", get_template_directory_uri() . "/js/bootstrap.min.js", array("jquery"), "3.3.1", true );
    wp_enqueue_script( "animate", get_template_directory_uri() . "/js/animate.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "jquery-countdown", get_template_directory_uri() . "/js/jquery.countdown.js", array("jquery"), "2.1.0", true );
    wp_enqueue_script( "medpluswp-navigation", get_template_directory_uri() . "/js/navigation.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "medpluswp-skip-link-focus-fix", get_template_directory_uri() . "/js/skip-link-focus-fix.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "wow", get_template_directory_uri() . "/js/wow.min.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "stickit", get_template_directory_uri() . "/js/jquery.stickit.min.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "loaders", get_template_directory_uri() . "/js/loaders.css.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "love-it", get_template_directory_uri() . "/js/love-it.js", array( "jquery" ) );
    wp_enqueue_script( "medpluswp-custom-js", get_template_directory_uri() . "/js/mt-custom.js", array("jquery"), "1.0.0", true );
    if ( is_singular() && comments_open() && get_option( "thread_comments" ) ) {
        wp_enqueue_script( "comment-reply" );
    }
}
add_action( "wp_enqueue_scripts", "medpluswp_scripts" );


/**
||-> Enqueue admin css/js
*/
function medpluswp_enqueue_admin_scripts( $hook ) {
    // JS
    wp_enqueue_script( "medpluswp_admin_scripts", get_template_directory_uri().'/js/mt-admin-scripts.js' , array( 'jquery' ) );
    wp_enqueue_script( "loaders", get_template_directory_uri().'/js/loaders.css.js' , array( 'jquery' ) );
    // CSS
    wp_enqueue_style( "medpluswp_admin_css", get_template_directory_uri().'/css/admin-style.css' );
    wp_enqueue_style( "loaders", get_template_directory_uri().'/css/loaders.css' );
}
add_action('admin_enqueue_scripts', 'medpluswp_enqueue_admin_scripts');


/**
||-> Enqueue css to js_composer
*/
add_action( 'vc_base_register_front_css', 'medpluswp_enqueue_front_css_foreever' );
function medpluswp_enqueue_front_css_foreever() {
    wp_enqueue_style( 'js_composer_front' );
}


/**
||-> Enqueue css to redux
*/
function medpluswp_register_fontawesome_to_redux() {
    wp_register_style( 'redux-font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), time(), 'all' );  
    wp_enqueue_style( 'redux-font-awesome' );
}
add_action( 'redux/page/redux_demo/enqueue', 'medpluswp_register_fontawesome_to_redux' );


/**
||-> Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
*/
add_action( 'vc_before_init', 'medpluswp_vcSetAsTheme' );
function medpluswp_vcSetAsTheme() {
    vc_set_as_theme( true );
}


/**
||-> Other required parts/files
*/
/* ========= LOAD CUSTOM FUNCTIONS ===================================== */
require_once get_template_directory() . '/inc/custom-functions.php';
require_once get_template_directory() . '/inc/custom-functions.header.php';
require_once get_template_directory() . '/inc/custom-functions.footer.php';
//GUTENBERG FUNCTIONS
require_once get_template_directory() . '/inc/custom-functions.gutenberg.php';
/* ========= Customizer additions. ===================================== */
require_once get_template_directory() . '/inc/customizer.php';
/* ========= Load Jetpack compatibility file. ===================================== */
require_once get_template_directory() . '/inc/jetpack.php';
/* ========= Include the TGM_Plugin_Activation class. ===================================== */
require_once get_template_directory() . '/inc/tgm/include_plugins.php';
/* ========= LOAD - REDUX - FRAMEWORK ===================================== */
require_once get_template_directory() . '/redux-framework/modeltheme-config.php';
/* ========= CUSTOM COMMENTS ===================================== */
require_once get_template_directory() . '/inc/custom-comments.php';
/* ========= Load love post file ===================================== */
require_once get_template_directory() . '/inc/post-love.php';


/**
||-> add_image_size //Resize images
*/
/* ========= RESIZE IMAGES ===================================== */
add_image_size( 'medpluswp_related_post_pic500x300',  500, 300, true );
add_image_size( 'medpluswp_post_pic700x450',          700, 450, true );
add_image_size( 'medpluswp_post_widget_pic70x70',     70, 70, true );
add_image_size( 'medpluswp_600x600',                600, 600, true );
add_image_size( 'medpluswp_1150x400',                1150, 400, true );
add_image_size( 'medpluswp_1420x140',                1420, 140, true );
add_image_size( 'medpluswp_testimonials_150x150',    150, 150, true );
add_image_size( 'medpluswp_clients_160x90',         160, 90, true );
add_image_size( 'medpluswp_portfolio01_390x275',     390, 275, true );
add_image_size( 'medpluswp_blogpost01_1420x170',     1420, 170, true );
add_image_size( 'medpluswp_about_625x415',     625, 415, true );
add_image_size( 'medpluswp_testimonials02_250x530',     250, 300, true );
add_image_size( 'medpluswp_blog_grid_1200x700',     1200, 700, true );



/**
||-> LIMIT POST CONTENT
*/
function medpluswp_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}


/**
||-> BREADCRUMBS
*/
function medpluswp_breadcrumb() {
    
    global  $medpluswp_redux;

    if ( !$medpluswp_redux['mt_enable_breadcrumbs'] ) {
        return false;
    }

    $delimiter = '';
    $html =  '';
    //text for the 'Home' link
    $name = esc_attr__("Home", "medpluswp");
    $currentBefore = '<li class="active">';
    $currentAfter = '</li>';

        if (!is_home() && !is_front_page() || is_paged()) {
            global  $post;
            $home = esc_url(home_url('/'));
            $html .= '<li><a href="' . $home . '">' . $name . '</a></li> ' . $delimiter . '';
        
        if (is_category()) {
            global  $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0)
            $html .= (get_category_parents($parentCat, true, '' . $delimiter . ''));
            $html .= $currentBefore . single_cat_title('', false) . $currentAfter;
        }elseif (is_tax()) {
            global  $wp_query;
            $html .= $currentBefore . single_cat_title('', false) . $currentAfter;
        } elseif (is_day()) {
            $html .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . '';
            $html .= '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
            $html .= $currentBefore . get_the_time('d') . $currentAfter;
        } elseif (is_month()) {
            $html .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . '';
            $html .= $currentBefore . get_the_time('F') . $currentAfter;
        } elseif (is_year()) {
            $html .= $currentBefore . get_the_time('Y') . $currentAfter;
        } elseif (is_attachment()) {
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (class_exists( 'WooCommerce' ) && is_shop()) {
            $html .= $currentBefore;
            $html .= esc_attr__('Shop','medpluswp');
            $html .= $currentAfter;
        }elseif (class_exists( 'WooCommerce' ) && is_product()) {

            global  $post;
            $cat = get_the_terms( $post->ID, 'product_cat' );
            foreach ($cat as $categoria) {
                if($categoria->parent == 0){

                    // Get the ID of a given category
                    $category_id = get_cat_ID( $categoria->name );

                    // Get the URL of this category
                    $category_link = get_category_link( $category_id );

                    $html .= '<li><a href="#">' . $categoria->name . '</a></li>';
                    $html .= esc_url($category_link);
                    // var_dump($categoria);
                }
            }

            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;

        } elseif (is_single()) {
            if (get_the_category()) {
                $cat = get_the_category();
                $cat = $cat[0];
                $html .= '<li>' . get_category_parents($cat, true, ' ' . $delimiter . '') . '</li>';
            }
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (is_page() && !$post->post_parent) {
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                $html .= $crumb . ' ' . $delimiter . ' ';
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (is_search()) {
            $html .= $currentBefore . get_search_query() . $currentAfter;
        } elseif (is_tag()) {
            $html .= $currentBefore . single_tag_title( '', false ) . $currentAfter;
        } elseif (is_author()) {
            global  $author;
            $userdata = get_userdata($author);
            $html .= $currentBefore . $userdata->display_name . $currentAfter;
        } elseif (is_404()) {
            $html .= $currentBefore . esc_attr__('404 Not Found','medpluswp') . $currentAfter;
        }
        if (get_query_var('paged')) {
            if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                $html .= $currentBefore;
            $html .= esc_attr__('Page','medpluswp') . ' ' . get_query_var('paged');
            if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                $html .= $currentAfter;
        }
    }

    return $html;
}


/**
||-> PAGINATION
*/
if ( ! function_exists( 'medpluswp_pagination' ) ) {
    function medpluswp_pagination($query = null) {

        if (!$query) {
            global  $wp_query;
            $query = $wp_query;
        }
        
        $big = 999999999; // need an unlikely integer
        $current = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : '1');
        echo paginate_links( 
            array(
                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'        => '?paged=%#%',
                'current'       => max( 1, $current ),
                'total'         => $query->max_num_pages,
                'prev_text'     => '&#171;',
                'next_text'     => '&#187;',
            ) 
        );
    }
}


/**
||-> SEARCH FOR POSTS ONLY
*/
function medpluswp_search_filter($query) {
    if ($query->is_search && !isset($_GET['post_type'])) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','medpluswp_search_filter');



/**
||-> FUNCTION: ADD EDITOR STYLE
*/
function medpluswp_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'medpluswp_add_editor_styles' );


/**
||-> FUNCTION: CUSTOM SEARCH FORM
*/
function medpluswp_custom_search_form(){

    global  $medpluswp_redux;

    $search_for = 'post';

    $content = '';
    $content .= '<div class="modeltheme-search">
                    <form method="GET" action="'.esc_url(home_url('/')).'">
                        <input class="search-input" placeholder="'.esc_attr__('Enter search term...', 'medpluswp').'" type="search" value="" name="s" id="search" />
                        <input type="hidden" name="post_type" value="post" />
                    </form>
                </div>';

    return $content;
}



/**
||-> REMOVE PLUGINS NOTIFICATIONS and NOTICES
*/
// |---> REVOLUTION SLIDER
if(function_exists( 'set_revslider_as_theme' )){
    add_action( 'init', 'medpluswp_disable_revslider_update_notices' );
    function medpluswp_disable_revslider_update_notices() {
        set_revslider_as_theme();
    }
}


// |---> VC Parallax Notices
if ( class_exists('GambitVCParallaxBackgrounds') ) {
    defined( 'GAMBIT_DISABLE_RATING_NOTICE' ) or define( 'GAMBIT_DISABLE_RATING_NOTICE', true );
}
?>