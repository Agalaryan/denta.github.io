<?php
/**
 * The template for displaying search results pages.
 */

get_header(); 


$class = "vc_col-md-12";

if ( medpluswp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class = "vc_col-md-12";
}elseif ( medpluswp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or medpluswp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class = "vc_col-md-9";
}
?>


<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo medpluswp_header_title_breadcrumbs(); ?>


<!-- Page content -->
<div class="high-padding">
    <!-- Blog content -->
    <div class="container blog-posts">
        <div class="vc_row">

            <div class="col-md-12 main-content">

    		<?php if ( have_posts() ) : ?>
                <div class="vc_row">
        			<?php /* Start the Loop */ ?>

                    <?php $j = 0; ?>
        			<?php while ( have_posts() ) : the_post(); ?>

                        <?php
                            $j++;
                            $class = "";
                            if ($j%2 == 0) {
                            $class = "even-post";
                        ?>
        			    <div class='<?php echo esc_attr($class); ?>'>
                            <?php get_template_part( 'content', 'right' ); ?>
                        </div>
                        <?php } else { 
                            $class = "odd-post";
                        ?>
                            <div class='<?php echo esc_attr($class); ?>'>
                                <?php get_template_part( 'content', 'left' ); ?>
                            </div>
                        <?php } ?>
                    
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

	   </div>
    </div>
</div>

<?php get_footer(); ?>