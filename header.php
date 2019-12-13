<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="format-detection" content="telephone=no">
    <meta charset="<?php esc_attr(bloginfo( 'charset' )); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <link rel="shortcut icon" href="<?php echo esc_url(medpluswp_redux('mt_favicon', 'url')); ?>">
    <?php } ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
        if(is_single() || is_page()){
            $mt_page_preloader = get_post_meta( get_the_ID(), 'mt_page_preloader', true );
            $mt_page_preloader_bg_color = get_post_meta( get_the_ID(), 'mt_page_preloader_bg_color', true );
            if (isset($mt_page_preloader) && $mt_page_preloader == 'enabled' && isset($mt_page_preloader_bg_color)) {
                echo  '<div class="medpluswp_preloader_holder">'.medpluswp_loader_animation().'</div>';
            }
        }else{
            if (medpluswp_redux('mt_preloader_status')) {
                echo  '<div class="medpluswp_preloader_holder">'.medpluswp_loader_animation().'</div>';
            } 
        }

    ?>

    <?php 
    $below_slider_headers = array('header8', 'header9');
    $normal_headers = array('header1', 'header2', 'header5');
    $custom_header_options_status = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
    $header_custom_variant = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );
    $header_layout = medpluswp_redux('mt_header_layout');
    if (isset($custom_header_options_status) && $custom_header_options_status == 'yes') {
        $header_layout = $header_custom_variant;
    }
    ?>


    <?php if(medpluswp_redux('mt_header_is_search') == true){ ?>
    <!-- Fixed Search Form -->
    <div class="fixed-search-overlay">
        <!-- Close Sidebar Menu + Close Overlay -->
        <i class="icon-close icons"></i>
        <!-- INSIDE SEARCH OVERLAY -->
        <div class="fixed-search-inside">
            <?php echo medpluswp_custom_search_form(); ?>
        </div>
    </div>
    <?php } ?>


    <?php if(medpluswp_redux('mt_header_fixed_sidebar_menu_status') == true){ ?>
        <!-- Fixed Sidebar Overlay -->
        <div class="fixed-sidebar-menu-overlay"></div>
        <!-- Fixed Sidebar Menu -->
        <div class="relative fixed-sidebar-menu-holder header7">
            <div class="fixed-sidebar-menu">
                <!-- Close Sidebar Menu + Close Overlay -->
                <i class="icon-close icons"></i>
                <!-- Sidebar Menu Holder -->
                <div class="header7">
                    <!-- RIGHT SIDE -->
                    <div class="left-side">
                        <?php if(medpluswp_redux('mt_logo','url')){ ?>
                          <h1 class="logo">
                              <a href="<?php echo get_site_url(); ?>">
                                  <img src="<?php echo esc_attr(medpluswp_redux('mt_logo','url')); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                              </a>
                          </h1>
                        <?php }else{ ?>
                          <h1 class="logo no-logo">
                              <a href="<?php echo esc_url(get_site_url()); ?>">
                                <?php echo esc_attr(get_bloginfo()); ?>
                              </a>
                          </h1>
                        <?php } ?>
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- PAGE #page -->
    <div id="page" class="hfeed site">
        <?php
            $page_slider = get_post_meta( get_the_ID(), 'select_revslider_shortcode', true );
            if (in_array($header_layout, $below_slider_headers)){
                // Revolution slider
                if (!empty($page_slider)) {
                    echo '<div class="theme_header_slider">';
                    echo do_shortcode('[rev_slider '.$page_slider.']');
                    echo '</div>';
                }

                // Header template variant
                echo medpluswp_current_header_template();
            }elseif (in_array($header_layout, $normal_headers)){
                // Header template variant
                echo medpluswp_current_header_template();
                // Revolution slider
                if (!empty($page_slider)) {
                    echo '<div class="theme_header_slider">';
                    echo do_shortcode('[rev_slider '.$page_slider.']');
                    echo '</div>';
                }
            }else{
                echo medpluswp_current_header_template();
            }
        ?>