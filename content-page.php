<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	    <div class="clearfix"></div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'medpluswp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

    <div class="clearfix"></div>

	<?php edit_post_link( esc_html__( 'Edit', 'medpluswp' ), '<span class="edit-link">', '</span>' ); ?>
</article><!-- #post-## -->