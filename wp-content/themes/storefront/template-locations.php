<?php
/**
 * The template for Novon Locations.
 *
 * Template Name: Locations
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="locations">
				<h1>Where to Buy</h1>
				<ul class="list">
					<?php
						$category_id = get_cat_ID('location');
						$args = array(
							'posts_per_page' => -1,
					        'post_type' => 'post',
					        'orderby'   => 'menu_order',
					        'order'     => 'ASC',
					        'meta_key'		=> 'country',
					        'meta_value'	=> 'canada',
					        'cat'		=> $category_id,
						);
						$my_query = new WP_Query($args);
						if ($my_query->have_posts()){
							echo '<h2>Canada:</h2>';
						    while ($my_query->have_posts()){
						        $my_query->the_post();
						        get_template_part( 'content', 'location' );
						    }
						}
						wp_reset_postdata();
					?>
					<?php
						$category_id = get_cat_ID('location');
						$args = array(
							'posts_per_page' => -1,
					        'post_type' => 'post',
					        'orderby'   => 'menu_order',
					        'order'     => 'ASC',
					        'meta_key'		=> 'country',
					        'meta_value'	=> 'united states',
					        'cat'		=> $category_id,
						);
						$my_query = new WP_Query($args);
						if ($my_query->have_posts()){
							echo '<h2>United States:</h2>';
						    while ($my_query->have_posts()){
						        $my_query->the_post();
						        get_template_part( 'content', 'location' );
						    }
						}
						wp_reset_postdata();
					?>
				</ul>
				<div class="map" id="map">
				</div>			
			</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
