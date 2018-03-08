<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<!-- <footer id="colophon" class="site-footer" role="contentinfo"> -->
		<!-- <div class="col-full"> -->

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			// do_action( 'storefront_footer' ); ?>

		<!-- </div>.col-full -->
	<!-- </footer>#colophon -->

	<footer>
	    <ul>
	        <li><a href="/shop/">Shop</a></li>
	        <li><a href="/contact/">Contact</a></li>
	        <li><a href="/privacy-policy/">Privacy Policy</a></li>
	        <li><a href="/return-warranty-policy/">Return &amp; Warranty Policy</a></li>
	    </ul>
	    <ul>
	        <li>© <?php echo date('Y'); ?> Novon Collection</li>
	    </ul>
	    <ul>
	        <li><a class="no-highlight" target="_blank" href="https://www.facebook.com/novonjewelry/"><img src="<?php echo get_template_directory_uri(); ?>/novon/images/icon-facebook-4.svg" alt=""></a></li>
	        <li><a class="no-highlight" target="_blank" href="https://www.instagram.com/novonjewelry/"><img src="<?php echo get_template_directory_uri(); ?>/novon/images/icon-instagram-14.svg" alt=""></a></li>
	    </ul>
	</footer>

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
