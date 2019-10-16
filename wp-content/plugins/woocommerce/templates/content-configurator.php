<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
// Things you'll probably need... ->name, ->id, ->category_ids, ->image_id (or a custom image...), ->price, ->status, ->slug

$config = get_post_meta($post->ID, '_configurator1', true);
if ($config == '' || $config == 'n/a') {
	return;
}

$category;
$productType;

?>


<li class="thumbnail" 
	data-product-id="<?php echo $product->id; ?>" 
	data-product-category="<?php 
		$terms = [];
		foreach ($product->category_ids as $value) {
			if( $term = get_term_by( 'id', $value, 'product_cat' ) ){
				$cat = strtolower($term->name);
				array_push($terms, $cat);
			}
		}
		foreach ($terms as $term) {
			if (in_array('mini-collection', $terms)) {
				echo $term." ";
				$category = 'mini-collection';
			} else {
				if ($term == 'attachments' || $term == 'tops') {
					} else {
						echo $term;
						$category = $term;
				}
			}
		}
		?>"
	data-product-type="<?php 
		$terms = get_the_terms( $product->id, 'product_tag' );
		if ($terms) {
			foreach ($terms as $term)
				echo $term->name;
				$productType = $term->name;
		}?>"
	data-product-name="<?php echo htmlentities($product->name); ?>"
	data-product-price="<?php echo $product->price; ?>"
	data-product-usd-price="<?php echo get_post_meta($post->ID, '_regular_price_wmcp', true); ?>"
	data-product-status="<?php echo $product->status; ?>"
	data-product-slug="<?php echo $product->slug; ?>"
	data-product-image="<?php echo wp_get_attachment_image_src($product->image_id, '[600, 600]')[0]; ?>"
	data-product-conf="<?php echo get_template_directory_uri().'/novon/images/configurator/'.$category.'/straight/'.get_post_meta($post->ID, '_configurator1', true).'.png'; ?>"
	data-product-conf-alt="<?php echo get_template_directory_uri().'/novon/images/configurator/'.$category.'/turned/'.get_post_meta($post->ID, '_configurator2', true).'.png'; ?>"
>
	<div class="image">
		<img src="<?php echo wp_get_attachment_image_src($product->image_id, 'thumbnail')[0]; ?>" alt="<?php echo htmlentities($product->name); ?>" title="<?php echo htmlentities($product->name); ?>" class="<?php echo $category; ?> <?php echo $productType; ?>">
	</div>
	<span class="mobile-only"><?php echo htmlentities($product->name); ?></span>
</li>
