<?php
/**
 * The template for displaying ready made products.
 *
 * Template Name: Lookbook
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="lookbook">
				<h2>Novon Lookbook</h2>
				<?php 
					$lookbook = get_fields();
					foreach ($lookbook as $looks) {
						foreach ($looks as $look) {
				?>
						<div class="look js-lookbook-products" style="background: url('<?php echo $look['image']['sizes']['medium_large']; ?>') center center no-repeat; background-size: cover;" data-hero="<?php echo $look['image']['sizes']['medium_large']; ?>" <?php foreach ($look['products'] as $key => $product) { echo 'data-product'.$key.'-url="'.get_permalink( $product['product']->ID ).'"'; echo 'data-product'.$key.'-title="'.htmlentities($product['product']->post_title).'"'; echo 'data-product'.$key.'-image="'.get_the_post_thumbnail_url($product['product']->ID).'"'; } ?>>
							<img class="more" src="<?php echo get_template_directory_uri(); ?>/novon/images/more-black.svg" alt="">
							<!-- <div class="buttons">
								<a href="#" class="js-lookbook-products" data-hero="<?php echo $look['image']['sizes']['medium_large']; ?>" <?php foreach ($look['products'] as $key => $product) { echo 'data-product'.$key.'-url="'.get_permalink( $product['product']->ID ).'"'; echo 'data-product'.$key.'-title="'.htmlentities($product['product']->post_title).'"'; echo 'data-product'.$key.'-image="'.get_the_post_thumbnail_url($product['product']->ID).'"'; } ?>><img src="<?php echo get_template_directory_uri(); ?>/novon/images/more-black.svg" alt=""></a>
								<a href="<?php echo $look['image']['url']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/novon/images/zoom-black.svg" alt=""></a>
							</div> -->
						</div>
				<?php
						}
					}
				?>

			</section>
			<div class="lookbook-overlay js-lookbook-overlay">
				<div class="window">
					<h2>Products Featured</h2>
					<div class="hero">
						<img class="js-hero" src="" alt="">
						<a class="zoom js-zoom" href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/novon/images/zoom-black.svg" alt=""></a>
					</div>
					<div class="products js-products">

					</div>
					<img class="close js-close" src="<?php echo get_template_directory_uri(); ?>/novon/images/x-black.svg" alt="">
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
