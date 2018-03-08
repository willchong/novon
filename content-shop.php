<?php
/**
 *
 * @package storefront
 */

?>

<?php if (is_search()): ?>

<?php if(isset($_GET["s"])) {
                $s = $_GET["s"];
             }
?>

  <section class="novon-wrap less-margin novon-search">

      <div class="cta-wrapper">
          <a href="/shop/" class="cta">Back to Collection</a>
      </div>

      <section class="products">
        <div class="fancy-header">
            <h2>SEARCH</h2>
            <p>Searching products for: "<?php echo $s; ?>"</p>
        </div>
        <ul class="results">
          <?php
             
            $args = array(
              's' => $s,
              'post_type' => 'product'
              );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
              while ( $loop->have_posts() ) : $loop->the_post();
                wc_get_template_part( 'content', 'product' );
              endwhile;
            } else {
              echo __( 'No products found' );
            }
            wp_reset_postdata();
          ?>
        </ul><!--/.products-->
      </section>
  </section>

<?php else: ?>

<section class="originals">
    <a href="/product-category/originals/our-earrings/">
    <div class="category">
	        <img src="<?php echo get_template_directory_uri(); ?>/novon/images/original-earrings.jpg" alt="">
	        <h3>Our Earrings</h3>
    </div>
    </a>
    <a href="/product-category/originals/our-bracelets/">
    <div class="category">
	        <img src="<?php echo get_template_directory_uri(); ?>/novon/images/original-bracelets.jpg" alt="">
	        <h3>Our Bracelets</h3>
    </div>
    </a>
    <a href="/product-category/originals/our-necklaces/">
    <div class="category">
	        <img src="<?php echo get_template_directory_uri(); ?>/novon/images/original-necklaces.jpg" alt="">
	        <h3>Our Necklaces</h3>
    </div>
    </a>
</section>

<section class="novon-wrap less-margin">

    <section class="products">
        <section class="tops">
            <div class="fancy-header">
                <h2>TOPS AND CHAINS</h2>
            </div>
            <p>Start with one of our earring or pendant tops and let inspiration be your guide. Customize your creation with a sterling silver chain in optional lengths.</p>
            <div class="icons">
                <div class="icon js-icon" data-filter="product_cat-earrings">
                    <img class="white" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-earrings.svg" alt="">
                    <img class="cyan" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-cyan-earrings.svg" alt="">
                    <p>Earrings</p>
                </div>
                <div class="icon js-icon" data-filter="product_cat-pendants">
                    <img class="white" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-necklace.svg" alt="">
                    <img class="cyan" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-cyan-necklace.svg" alt="">
                    <p>Pendants</p>
                </div>
                <div class="icon js-icon" data-filter="product_cat-chains">
                    <img class="white" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-chains.svg" alt="">
                    <img class="cyan" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-cyan-chains.svg" alt="">
                    <p>Chains</p>
                </div>
            </div>
            <ul class="list js-tops">
            	<?php
            		$args = array(
            			'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => ['earrings']
                            )
                        ),
                        'post_type' => 'product',
                        'orderby'   => 'menu_order',
                        'order'     => 'ASC',
                        // 'order' => 'DESC'
            			);
            		$loop = new WP_Query( $args );
            		if ( $loop->have_posts() ) {
            			while ( $loop->have_posts() ) : $loop->the_post();
            				wc_get_template_part( 'content', 'product' );
            			endwhile;
            		} else {
            			echo __( 'No products found' );
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
                                  'terms' => ['pendants']
                              )
                          ),
                          'post_type' => 'product',
                          'orderby'   => 'menu_order',
                          'order'     => 'ASC',
                          // 'order' => 'DESC'
                    );
                  $loop = new WP_Query( $args );
                  if ( $loop->have_posts() ) {
                    while ( $loop->have_posts() ) : $loop->the_post();
                      wc_get_template_part( 'content', 'product' );
                    endwhile;
                  } else {
                    echo __( 'No products found' );
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
                            // 'order' => 'DESC'
                      );
                    $loop = new WP_Query( $args );
                    if ( $loop->have_posts() ) {
                      while ( $loop->have_posts() ) : $loop->the_post();
                        wc_get_template_part( 'content', 'product' );
                      endwhile;
                    } else {
                      echo __( 'No products found' );
                    }
                    wp_reset_postdata();
                  ?>
            </ul>
      	</section>
      	<section class="attachments">
      	    <div class="fancy-header">
      	        <h2>ATTACHMENTS</h2>
      	    </div>
      	    <p>Choose from our selection of natural stone drops and sterling silver coins to create your next bracelet, earring or pendant masterpiece.</p>
      	    <div class="icons">
      	        <div class="icon js-icon" data-filter="product_cat-sphere">
                    <img class="white" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-sphere.svg" alt="">
      	            <img class="cyan" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-cyan-sphere.svg" alt="">
      	            <p>Sphere</p>
      	        </div>
      	        <div class="icon js-icon" data-filter="product_cat-oval">
                    <img class="white" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-oval.svg" alt="">
      	            <img class="cyan" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-cyan-oval.svg" alt="">
      	            <p>Oval</p>
      	        </div>
      	        <div class="icon js-icon" data-filter="product_cat-coin">
                    <img class="white" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-coin.svg" alt="">
      	            <img class="cyan" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-cyan-coin.svg" alt="">
      	            <p>Coin</p>
      	        </div>
      	    </div>
      	    <ul class="list js-attachments">
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
                        'orderby'   => 'menu_order',
                        'order' => 'ASC'
      	    			);
      	    		$loop = new WP_Query( $args );
      	    		if ( $loop->have_posts() ) {
      	    			while ( $loop->have_posts() ) : $loop->the_post();
      	    				wc_get_template_part( 'content', 'product' );
      	    			endwhile;
      	    		} else {
      	    			echo __( 'No products found' );
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
                        'orderby'   => 'menu_order',
                        'order' => 'ASC'
                  );
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product' );
                  endwhile;
                } else {
                  echo __( 'No products found' );
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
                        'orderby'   => 'menu_order',
                        'order' => 'ASC'
                  );
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product' );
                  endwhile;
                } else {
                  echo __( 'No products found' );
                }
                wp_reset_postdata();
              ?>
      	    </ul>
      	</section>
         
    </section>
</section>

<?php endif; ?>