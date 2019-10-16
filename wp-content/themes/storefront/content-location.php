<?php
/**
 * The template used for displaying page content in template-locations.php
 *
 * @package storefront
 */

?>

<li class="store js-store" data-id="<?php echo get_the_ID(); ?>">
	<?php
		if(get_field('store_name'))
		{
			echo "<h4 class='js-store_name'>".get_field('store_name')."</h4>";
		}
		if(get_field('street_address'))
		{
			echo "<p class='js-street_address'>".get_field('street_address')."</p>";
		}
		if(get_field('city'))
		{
			echo "<p class='js-city'>".get_field('city').", ".get_field('province_/_state')."</p>";
		}
		
		if(get_field('postal_code_/_zip'))
		{
			echo "<p class='js-postal'>".get_field('postal_code_/_zip')."</p>";
		}
		if(get_field('telephone'))
		{
			echo "<a class='js-telephone' href='tel:".get_field('telephone')."'>".get_field('telephone')."</a>";
		}
		if(get_field('website'))
		{
			echo "<a href='".get_field('website')."' target='_blank'>".get_field('website')."</a>";
		}
	?>
</li>