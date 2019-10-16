<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();

			// do_action( 'storefront_single_post_before' );

			echo '<div class="novon-blog">';
			get_template_part( 'content', 'blog' );
			echo '<a href="/blog" class="cta">Back to Blog</a>';
			echo '</div>';
			// do_action( 'storefront_single_post_after' );

		endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
