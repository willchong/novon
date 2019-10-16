<?php
/**
 * The template for displaying ready made products.
 *
 * Template Name: Mini-series
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="miniseries">

					<div class="fancy-header">
						<h2>Mini-series</h2>
					</div>
					<p>lorem ipsum</p>


				    <div class="category">
				          <img class="desktop" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-earrings.jpg" alt="">
					        <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-earrings.jpg" alt="">
					        <h3>Pre-designed earrings</h3>
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
				          <img class="desktop" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-necklaces.jpg" alt="">
					        <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-necklaces.jpg" alt="">
					        <h3>Pre-designed necklaces</h3>
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
				          <img class="desktop" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-bracelets.jpg" alt="">
					        <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-bracelets.jpg" alt="">
					        <h3>Pre-designed bracelets</h3>
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

				<!-- <h1>miniseries!</h1>
				<?php 
					$lookbook = get_fields();
					foreach ($lookbook as $looks) {
						foreach ($looks as $look) {
				?>
						<div class="look">
							<img src="<?php echo $look['image']['url']; ?>" alt="">
							<?php foreach ($look['products'] as $product) { ?>
								<a href="<?php echo  get_permalink( $product['product']->ID ); ?>"><?php echo $product['product']->post_title; ?></a>
							<?php } ?>
						</div>
				<?php
						}
					}
				?> -->

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
