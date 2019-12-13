<?php
/*
* Template Name: Blog
*/


get_header(); 


$class = "";

if ( medpluswp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class = "vc_row";
}elseif ( medpluswp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or medpluswp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class = "vc_col-md-9";
}
$breadcrumbs_on_off = get_post_meta( get_the_ID(), 'breadcrumbs_on_off', true );
$blog_page_header = get_post_meta( get_the_ID(), 'blog_page_header', true );
?>


<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo medpluswp_header_title_breadcrumbs(); ?>


<!-- Page content -->
<div class="high-padding">

    <!-- ///////////////////// Start Grid/List Layout ///////////////////// -->
    <?php
    wp_reset_postdata();
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'paged'            => $paged,
    );
    $posts = new WP_Query( $args );
    ?>
    <!-- Blog content -->
    <div class="container blog-posts">
        
        <h2 class="blog_heading heading-bottom ">
            <?php echo medpluswp_redux('mt_blog_post_title'); ?>
        </h2>
        <div class="vc_row">

            <div class="col-md-12 main-content">
                <div class="vc_row">

                <?php if ( $posts->have_posts() ) : ?>
                    <?php /* Start the Loop */ ?>
                    <?php
                    $j = 0;
                    while ( $posts->have_posts() ) : $posts->the_post(); 
                    $j++;

                    if ( medpluswp_redux('mt_blog_display_type') == 'list' ) {

                        $class = "";
                        if ($j%2 == 0) {
                            $class = "even-post";
                        ?>
                            <div class='<?php echo esc_attr($class); ?>'>
                                <?php get_template_part( 'content', 'right' ); ?>
                            </div>
                        <?php }else{ 
                        $class = "odd-post";
                        ?>
                            <div class='<?php echo esc_attr($class); ?>'>
                                <?php get_template_part( 'content', 'left' ); ?>
                            </div>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php get_template_part( 'content', 'grid' ); ?>
                    <?php } ?>

                    <?php endwhile; ?>
                    <?php echo '<div class="clearfix"></div>'; ?>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
                
                <div class="clearfix"></div>

                <?php 
                $wp_query = new WP_Query($args);
                global  $wp_query;
                if ($wp_query->max_num_pages != 1) { ?>                
                <div class="modeltheme-pagination-holder col-md-12">           
                    <div class="modeltheme-pagination pagination">           
                        <?php medpluswp_pagination(); ?>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
get_footer();
?>