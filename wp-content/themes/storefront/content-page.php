<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

?>
<div id="post-<?php the_ID(); ?>" data-test="<?php echo $post->post_name; ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to storefront_page add_action
	 *
	 * @hooked storefront_page_header          - 10
	 * @hooked storefront_page_content         - 20
	 */

	if ($post->post_name == 'products') {

		$args = array(
		        'post_type'      => 'product',
		        'posts_per_page' => -1
		    );

		    $loop = new WP_Query( $args );

		    while ( $loop->have_posts() ) : $loop->the_post();
		        global $product;
		        echo '<a style="width: 100px; display: inline-block;" href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
		    endwhile;

		wp_reset_query();

		do_action( 'storefront_get_sidebar' );
	} else {

		do_action( 'storefront_page' );
		if (!is_shop()) {
			remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
		}
	}

	?>
</div><!-- #post-## -->
