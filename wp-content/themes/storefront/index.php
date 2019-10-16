<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				if ( !is_front_page() && is_home() ) {
					if ( $pagename == "blog") {

						echo '<div class="novon-blog">';
						echo '<div class="fancy-header"><h1>Novon News</h1></div>';

						//set up loop for blog posts
						$args = array(
						 	'posts_per_page' => -1,
							'post_status' => 'public',
							'post_type' => 'post',
							'category_name' => 'blog',
							'order' => 'DESC'
						);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
						  while ( $loop->have_posts() ) : $loop->the_post();
						    wc_get_template_part( 'content', 'blog-teaser' );
						  endwhile;
						} else {
						  echo __( 'No blog posts found' );
						}
						wp_reset_postdata();
						echo '</div>';

					}
				}
				if (is_single( array( 99, 'contact' ) ) ) {
					remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
				}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// do_action( 'storefront_sidebar' );
get_footer();
