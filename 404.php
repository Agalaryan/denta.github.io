<?php
/**
 * The template for displaying 404 pages (not found).
 *
 */

get_header(); ?>


	<?php if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
		<!-- Breadcrumbs -->
		<div class="modeltheme-breadcrumbs">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-8">
	                	<h1 class="page-title">
		                	<?php esc_attr_e( '404 Page not found', 'medpluswp' ); ?>
		                </h1>
		            </div>
		            <div class="col-md-4">
		                <ol class="breadcrumb pull-right">
		                    <?php medpluswp_breadcrumb(); ?>
		                </ol>
		            </div>
		        </div>
		    </div>
		</div>
	<?php } ?>

	<!-- Page content -->
	<div id="primary" class="content-area">
	    <main id="main" class="container blog-posts site-main">
	        <div class="col-md-12 main-content">
				<section class="error-404 not-found">
					<header class="page-header-404">
						<?php
							if ( class_exists( 'ReduxFrameworkPlugin' ) ) { 
								if (!empty(medpluswp_redux('mt_404_page'))) {
						            $content_post   = get_post(medpluswp_redux('mt_404_page'));
						            $content        = $content_post->post_content;
						            $content        = apply_filters('the_content', $content);
						            echo  wp_kses_post($content);
						        }else{ ?>
									<div class="high-padding">
										<img class="aligncenter" src="<?php echo esc_url(get_template_directory_uri() . '/images/404.png'); ?>" alt="<?php esc_attr_e( 'Not Found', 'medpluswp' ); ?>">
										<h2 class="page-title text-center"><?php esc_attr_e( 'Sorry, this page does not exist', 'medpluswp' ); ?></h2>
										<h3 class="page-title text-center"><?php esc_attr_e( 'The link you clicked might be corrupted, or the page may have been removed.', 'medpluswp' ); ?></h3>
									</div>
							<?php }
							}else{ ?>
								<div class="high-padding">
									<img class="aligncenter" src="<?php echo esc_url(get_template_directory_uri() . '/images/404.png'); ?>" alt="<?php esc_attr_e( 'Not Found', 'medpluswp' ); ?>">
									<h2 class="page-title text-center"><?php esc_attr_e( 'Sorry, this page does not exist', 'medpluswp' ); ?></h2>
									<h3 class="page-title text-center"><?php esc_attr_e( 'The link you clicked might be corrupted, or the page may have been removed.', 'medpluswp' ); ?></h3>
								</div>
							<?php }
						 ?>
					</header>
				</section>
			</div>
		</main>
	</div>

<?php get_footer(); ?>