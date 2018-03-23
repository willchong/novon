<?php
/**
 * The template for Novon Configurator.
 *
 * Template Name: Configurator
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="configurator">
				<div class="fancy-header">
					<h2>Novon Configurator</h2>
				</div>
				<div class="preview js-preview">
					<div class="phase phase-1 js-phase-1 js-active">
						<div class="instructions">
							<img class="js-add" src="<?php echo get_template_directory_uri(); ?>/novon/images/add-button.svg" alt="">
							<strong>Step 1:</strong>
							<p>Choose a top</p>
						</div>
						<img class="piece" src="" alt="">
					</div>
					<div class="phase phase-2 js-phase-2 js-active">
						<div class="instructions">
							<img class="js-add" src="<?php echo get_template_directory_uri(); ?>/novon/images/add-button.svg" alt="">
							<strong>Step 2:</strong>
							<p>Select attachment</p>
						</div>
						<img class="piece" src="" alt="">
					</div>
					<div class="phase phase-3 js-phase-3 js-active">
						<img class="piece" src="" alt="">
					</div>
					<div class="phase phase-4 js-phase-4 js-active">
						<img class="piece" src="" alt="">
					</div>
					<div class="summary js-summary">
						<strong>Configuration:</strong>
						<ul>

						</ul>
					</div>
					<div class="buttons js-buttons">
						<a href="" class="cta reset js-reset">Reset</a>
						<a href="" class="cta add-items js-add-items">Add Items to Cart</a>
					</div>
				</div>
				<div class="selections">
					<div class="tops">
						<div class="header js-active">Tops</div>
						<ul class="thumbnails configurator-tops js-active">
								<?php
									$args = array(
										'posts_per_page' => -1,
							            'tax_query' => array(
							                'relation' => 'AND',
							                array(
							                    'taxonomy' => 'product_cat',
							                    'field' => 'slug',
							                    'terms' => ['tops']
							                )
							            ),
							            'post_type' => 'product',
							            'orderby'   => 'menu_order',
							            'order'     => 'ASC',
										);
									$loop = new WP_Query( $args );
									if ( $loop->have_posts() ) {
										while ( $loop->have_posts() ) : $loop->the_post();
											// echo the_post();
											wc_get_template_part( 'content', 'configurator' );
										endwhile;
									} 
									wp_reset_postdata();
								?>
									<?php
										$args = array(
											'posts_per_page' => -1,
								            'tax_query' => array(
								                'relation' => 'AND',
								                array(
								                    'taxonomy' => 'product_cat',
								                    'field' => 'slug',
								                    'terms' => ['chains']
								                )
								            ),
								            'post_type' => 'product',
								            'orderby'   => 'menu_order',
								            'order'     => 'ASC',
											);
										$loop = new WP_Query( $args );
										if ( $loop->have_posts() ) {
											while ( $loop->have_posts() ) : $loop->the_post();
												// echo the_post();
												wc_get_template_part( 'content', 'configurator' );
											endwhile;
										} 
										wp_reset_postdata();
									?>
							    <?php
							      // $args = array(
							      //   'posts_per_page' => -1,
							      //         'tax_query' => array(
							      //             'relation' => 'AND',
							      //             array(
							      //                 'taxonomy' => 'product_cat',
							      //                 'field' => 'slug',
							      //                 'terms' => ['pendants']
							      //             )
							      //         ),
							      //         'post_type' => 'product',
							      //         'orderby'   => 'menu_order',
							      //         'order'     => 'ASC'
							      //   );
							      // $loop = new WP_Query( $args );
							      // if ( $loop->have_posts() ) {
							      //   while ( $loop->have_posts() ) : $loop->the_post();
							      //     wc_get_template_part( 'content', 'product' );
							      //   endwhile;
							      // } 
							      // wp_reset_postdata();
							    ?>
							      <?php
							        // $args = array(
							        //   'posts_per_page' => -1,
							        //         'tax_query' => array(
							        //             'relation' => 'AND',
							        //             array(
							        //                 'taxonomy' => 'product_cat',
							        //                 'field' => 'slug',
							        //                 'terms' => ['chains']
							        //             )
							        //         ),
							        //         'post_type' => 'product',
							        //         'orderby'   => 'menu_order',
							        //         'order'     => 'ASC'
							        //   );
							        // $loop = new WP_Query( $args );
							        // if ( $loop->have_posts() ) {
							        //   while ( $loop->have_posts() ) : $loop->the_post();
							        //     wc_get_template_part( 'content', 'product' );
							        //   endwhile;
							        // } 
							        // wp_reset_postdata();
							      ?>

						</ul>
					</div>
					<div class="attachments">
						<div class="header">Attachments</div>
						<ul class="thumbnails configurator-attachments">
							<?php
							  $args = array(
							    'posts_per_page' => -1,
							          'tax_query' => array(
							              'relation' => 'AND',
							              array(
							                  'taxonomy' => 'product_cat',
							                  'field' => 'slug',
							                  'terms' => ['sphere']
							              )
							          ),
							          'post_type' => 'product',
							          'product_tag' => ['double'],
							          'orderby'   => 'menu_order',
							          'order'     => 'ASC'
							    );
							  $loop = new WP_Query( $args );
							  if ( $loop->have_posts() ) {
							    while ( $loop->have_posts() ) : $loop->the_post();
							      wc_get_template_part( 'content', 'configurator' );
							    endwhile;
							  } 
							  wp_reset_postdata();
							?>
							<?php
							  $args = array(
							    'posts_per_page' => -1,
							          'tax_query' => array(
							              'relation' => 'AND',
							              array(
							                  'taxonomy' => 'product_cat',
							                  'field' => 'slug',
							                  'terms' => ['oval']
							              )
							          ),
							          'post_type' => 'product',
							          'product_tag' => ['double'],
							          'orderby'   => 'menu_order',
							          'order'     => 'ASC'
							    );
							  $loop = new WP_Query( $args );
							  if ( $loop->have_posts() ) {
							    while ( $loop->have_posts() ) : $loop->the_post();
							      wc_get_template_part( 'content', 'configurator' );
							    endwhile;
							  } 
							  wp_reset_postdata();
							?>
							<?php
							  $args = array(
							    'posts_per_page' => -1,
							          'tax_query' => array(
							              'relation' => 'AND',
							              array(
							                  'taxonomy' => 'product_cat',
							                  'field' => 'slug',
							                  'terms' => ['coin']
							              )
							          ),
							          'post_type' => 'product',
							          'product_tag' => ['double'],
							          'orderby'   => 'menu_order',
							          'order'     => 'ASC'
							    );
							  $loop = new WP_Query( $args );
							  if ( $loop->have_posts() ) {
							    while ( $loop->have_posts() ) : $loop->the_post();
							      wc_get_template_part( 'content', 'configurator' );
							    endwhile;
							  } 
							  wp_reset_postdata();
							?>
							<?php
							  $args = array(
							    'posts_per_page' => -1,
							          'tax_query' => array(
							              'relation' => 'AND',
							              array(
							                  'taxonomy' => 'product_cat',
							                  'field' => 'slug',
							                  'terms' => ['sphere']
							              )
							          ),
							          'post_type' => 'product',
							          'product_tag' => ['single'],
							          'orderby'   => 'menu_order',
							          'order'     => 'ASC'
							    );
							  $loop = new WP_Query( $args );
							  if ( $loop->have_posts() ) {
							    while ( $loop->have_posts() ) : $loop->the_post();
							      wc_get_template_part( 'content', 'configurator' );
							    endwhile;
							  } 
							  wp_reset_postdata();
							?>
							<?php
							  $args = array(
							    'posts_per_page' => -1,
							          'tax_query' => array(
							              'relation' => 'AND',
							              array(
							                  'taxonomy' => 'product_cat',
							                  'field' => 'slug',
							                  'terms' => ['oval']
							              )
							          ),
							          'post_type' => 'product',
							          'product_tag' => ['single'],
							          'orderby'   => 'menu_order',
							          'order'     => 'ASC'
							    );
							  $loop = new WP_Query( $args );
							  if ( $loop->have_posts() ) {
							    while ( $loop->have_posts() ) : $loop->the_post();
							      wc_get_template_part( 'content', 'configurator' );
							    endwhile;
							  } 
							  wp_reset_postdata();
							?>
							<?php
							  $args = array(
							    'posts_per_page' => -1,
							          'tax_query' => array(
							              'relation' => 'AND',
							              array(
							                  'taxonomy' => 'product_cat',
							                  'field' => 'slug',
							                  'terms' => ['coin']
							              )
							          ),
							          'post_type' => 'product',
							          'product_tag' => ['single'],
							          'orderby'   => 'menu_order',
							          'order'     => 'ASC'
							    );
							  $loop = new WP_Query( $args );
							  if ( $loop->have_posts() ) {
							    while ( $loop->have_posts() ) : $loop->the_post();
							      wc_get_template_part( 'content', 'configurator' );
							    endwhile;
							  } 
							  wp_reset_postdata();
							?>
						</ul>
					</div>
				</div>
			</section>

				

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
