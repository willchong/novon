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
	        <li><a href="/">About</a></li>
	        <li><a href="/shop/">Shop</a></li>
	        <li><a href="/contact/">Contact</a></li>
	    </ul>
	    <ul>
	        <li>© 2017 Novon Collection</li>
	    </ul>
	    <ul>
	        <!-- <li>&nbsp;</li> -->
	        <li><a href="#">Facebook</a></li>
	        <li><a href="#">Instagram</a></li>
	    </ul>
	</footer>

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
