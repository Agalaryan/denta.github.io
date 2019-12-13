<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); 

$class_row = "col-md-12";
if ( medpluswp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class_row = "col-md-12";
}elseif ( medpluswp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or medpluswp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class_row = "col-md-9";
}
$sidebar = medpluswp_redux('mt_blog_layout_sidebar');

?>

    <!-- HEADER TITLE BREADCRUBS SECTION -->
    <?php echo medpluswp_header_title_breadcrumbs(); ?>

    <!-- Page content -->
    <div class="high-padding">
        <!-- Blog content -->
        <div class="container blog-posts">
            <div class="row">

                <?php
                    if ( medpluswp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
                        echo '<div class="col-md-3 sidebar-content">';
                            dynamic_sidebar( $sidebar );
                        echo '</div>';
                    }
                ?>

                <div class="<?php echo esc_attr($class_row); ?> main-content">
                    <?php if ( have_posts() ) : ?>
                        <div class="row">

                            <?php $j = 0; ?>
                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php

                                if ( medpluswp_redux('mt_blog_display_type') == 'grid' ) {
                                    get_template_part( 'content', 'grid' );

                                } else {

                                    $j++;
                                    $class = "";
                                    if ($j%2 == 0) {
                                        $class = "even-post";
                                        echo '<div class="'.esc_attr($class).'">';
                                            get_template_part( 'content', 'right' );
                                        echo '</div>';
                                    } else { 
                                        $class = "odd-post";
                                        echo '<div class="'.esc_attr($class).'">';
                                            get_template_part( 'content', 'left' );
                                        echo '</div>';
                                    }

                                }
                                    
                                ?>
                            <?php endwhile; ?>
                            
                            <div class="modeltheme-pagination-holder col-md-12">             
                                <div class="modeltheme-pagination pagination">             
                                    <?php medpluswp_pagination(); ?>
                                </div>
                            </div>
                        </div>

                    <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                    <?php endif; ?>
                </div>

                <?php
                    if ( medpluswp_redux('mt_blog_layout') == 'mt_blog_right_sidebar') {
                        echo '<div class="col-md-3 sidebar-content">';
                            dynamic_sidebar( $sidebar );
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>