<?php 
$placeholder = '600x500';
$master_class = 'vc_col-md-12';
$thumbnail_class = 'vc_col-md-4';
$post_details_class = 'vc_col-md-8';
$type_class = 'list-view';
$image_size = 'medpluswp_about_625x415';

if ( medpluswp_redux('mt_blog_display_type') == 'list' ) {
    $master_class = 'vc_col-md-12';
    $thumbnail_class = 'vc_col-md-4';
    $post_details_class = 'vc_col-md-8';
    $type_class = 'list-view';
}


// THUMBNAIL
$post_img = '';
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medpluswp_600x600' );
if ($thumbnail_src) {
    $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.get_the_title().'" />';
    $post_col = 'col-md-8';
}else{
    $post_col = 'col-md-12 no-featured-image';
}

$sticky_status = '';
if (is_sticky()) {
    $sticky_status = ' <span class="sticky_post"><i class="fa fa-file-text-o"></i></span>';
    # code...
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post grid-view '.esc_attr($master_class).' '.esc_attr($type_class)); ?> > 
    <div class="blog_custom">
        
        <!-- POST DETAILS -->
        <div class="<?php echo esc_attr($post_col); ?> post-details">
            <div class="post-details-holder">
                <h3 class="post-name row">
                    <a title="<?php the_title_attribute() ?>" href="<?php the_permalink(); ?>"><?php echo  wp_kses_post($sticky_status); ?> <?php the_title() ?></a>
                </h3>

                <div class="post-category-comment-date row">
                    
                    <!-- POST AUTHOR -->
                    <span class="post-author"><?php echo esc_html__( 'By', 'medpluswp' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a></span>
                    
                    <!-- POST DATE -->
                    <span class="meta-pipe">|</span>
                    <span class="post-date"><?php echo get_the_date() ?></span>

                    <!-- POST CATEGORIES -->
                    <span class="meta-pipe">|</span>
                    <span class="post-categories">
                        <?php echo get_the_term_list( get_the_ID(), 'category', '<i class="icon-tag"></i> ', ', ' ); ?>
                    </span>

                    <!-- POST COMMENTS -->
                    <span class="meta-pipe">|</span>
                    <span class="post-comments"><i class="icon-bubbles icons"></i> <a href="<?php echo the_permalink().'#comments'; ?>"><?php comments_number( '0' . esc_attr__(' Comments','medpluswp'), '1' . esc_attr__(' Comment','medpluswp'), '%' . esc_attr__(' Comments','medpluswp') ); ?></a></span>

                </div>

                <div class="post-excerpt row">
                <?php
                    /* translators: %s: Name of current post */
                    the_excerpt( sprintf(__( 'Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i>', 'medpluswp' ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    ) );
                ?>
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'medpluswp' ),
                        'after'  => '</div>',
                    ) );
                ?>
                </div>
            </div>

        </div>


        <?php if ($post_img) { ?>
            <!-- POST THUMBNAIL -->
            <div class="col-md-4 post-thumbnail">
                <a href="<?php the_permalink(); ?>" class="relative">
                    <?php echo  wp_kses_post($post_img); ?>
                </a>
            </div>
        <?php } ?>
    </div>
</article>