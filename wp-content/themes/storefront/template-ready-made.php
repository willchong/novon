<?php
/**
 * The template for displaying ready made products.
 *
 * Template Name: Ready Made
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="originals">
				<div class="fancy-header">
					<h2>Ready Made</h2>
				</div>
				<p>If you want to design your own Novon jewelry but don't know where to start, these Ready Made examples created by our in-house team of designers will give you some ideas.  Purchase them as is, or head on over to our Design Your Own page to create a similar piece.</p>


			    <div class="category">
			          <img class="desktop" src="<?php echo get_template_directory_uri(); ?>/novon/images/ready-made-earrings.jpg" alt="">
				        <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/novon/images/ready-made-earrings.jpg" alt="">
				        <h3>Ready-made earrings</h3>
			    </div>
				<div class="products">
					<?php
						$args = array(
						'posts_per_page' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => ['pre-designed-earrings']
									)
								),
								'post_status' => 'public',
								'post_type' => 'product',
								'orderby'   => 'menu_order',
								'order' => 'ASC'
						);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
							wc_get_template_part( 'content', 'product' );
						endwhile;
						} else {
						echo __( 'No products found' );
						}
						wp_reset_postdata();
					?>
				</div>
				
				<div class="category">
			          <img class="desktop" src="<?php echo get_template_directory_uri(); ?>/novon/images/ready-made-necklaces.jpg" alt="">
				        <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/novon/images/ready-made-necklaces.jpg" alt="">
				        <h3>Ready-made necklaces</h3>
				</div>
				
				<div class="products">
					<?php
						$args = array(
						'posts_per_page' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => ['pre-designed-necklaces']
									)
								),
								'post_status' => 'public',
								'post_type' => 'product',
								'orderby'   => 'menu_order',
								'order' => 'ASC'
						);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
							wc_get_template_part( 'content', 'product' );
						endwhile;
						} else {
						echo __( 'No products found' );
						}
						wp_reset_postdata();
					?>
				</div>

			    <div class="category">
			          <img class="desktop" src="<?php echo get_template_directory_uri(); ?>/novon/images/ready-made-bracelets.jpg" alt="">
				        <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/novon/images/ready-made-bracelets.jpg" alt="">
				        <h3>Ready-made bracelets</h3>
				</div>
				
				<div class="products">
					<?php
						$args = array(
						'posts_per_page' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => ['pre-designed-bracelets']
									)
								),
								'post_status' => 'public',
								'post_type' => 'product',
								'orderby'   => 'menu_order',
								'order' => 'ASC'
						);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
							wc_get_template_part( 'content', 'product' );
						endwhile;
						} else {
						echo __( 'No products found' );
						}
						wp_reset_postdata();
					?>
				</div>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
