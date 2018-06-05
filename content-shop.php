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
    <a href="/product-category/originals/pre-designed-earrings/">
    <div class="category">
          <img class="desktop" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-earrings-box.jpg" alt="">
	        <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-earrings.jpg" alt="">
	        <h3>Pre-designed earrings</h3>
    </div>
    </a>
    <a href="/product-category/originals/pre-designed-bracelets/">
    <div class="category">
          <img class="desktop" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-bracelets-box.jpg" alt="">
	        <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-bracelets.jpg" alt="">
	        <h3>Pre-designed bracelets</h3>
    </div>
    </a>
    <a href="/product-category/originals/pre-designed-necklaces/">
    <div class="category">
          <img class="desktop" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-necklaces-box.jpg" alt="">
	        <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-necklaces.jpg" alt="">
	        <h3>Pre-designed necklaces</h3>
    </div>
    </a>
</section>

<section class="novon-wrap less-margin">
    <div class="js-dummy"></div>
    <section class="configurator">
      <div class="fancy-header">
        <h2>Design Your Own</h2>
      </div>
      <div class="preview js-preview">
        <div class="phase phase-1 js-phase-1 js-active">
          <div class="instructions">
            <img class="js-add" src="<?php echo get_template_directory_uri(); ?>/novon/images/add-button.svg" alt="">
            <strong>Step 1:</strong>
            <p>Choose a pendant or earring top</p>
          </div>
          <img class="piece" src="" alt="">
          <label></label>
        </div>
        <div class="phase phase-2 js-phase-2 js-active">
          <div class="instructions">
            <img class="js-add" src="<?php echo get_template_directory_uri(); ?>/novon/images/add-button.svg" alt="">
            <strong>Step 2:</strong>
            <p>Select attachment</p>
          </div>
          <img class="piece" src="" alt="">
          <label></label>
        </div>
        <div class="phase phase-3 js-phase-3 js-active">
          <img class="piece" src="" alt="">
          <label></label>
        </div>
        <div class="phase phase-4 js-phase-4 js-active">
          <img class="piece" src="" alt="">
          <label></label>
        </div>
        <div class="earring-clone js-earring-clone">
          <div class="phase phase-1 js-phase-1 js-active">
            <img class="piece" src="" alt="">
          </div>
          <div class="phase phase-2 js-phase-2 js-active">
            <img class="piece" src="" alt="">
          </div>
          <div class="phase phase-3 js-phase-3 js-active">
            <img class="piece" src="" alt="">
          </div>
          <div class="phase phase-4 js-phase-4 js-active">
            <img class="piece" src="" alt="">
          </div>
        </div>
        <div class="summary js-summary">
          <strong>Configuration:</strong>
          <ul>

          </ul>
        </div>
        <div class="buttons js-buttons">
          <a class="cta reset js-reset">Reset</a>
          <a class="cta add-items js-add-items">Add Items to Cart</a>
          <a class="cta liveview js-liveview">View your design</a>
        </div>
      </div>
      <div class="selections">
        <div class="tops">
          <div class="header js-active">Tops and Chains</div>
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
            <?php
              $args = array(
                'posts_per_page' => -1,
                      'tax_query' => array(
                          'relation' => 'AND',
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'slug',
                              'terms' => ['cabochon']
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
                              'terms' => ['cabochon']
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
          </ul>
        </div>
      </div>
    </section>

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
                        'post_status' => 'public',
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
                          'post_status' => 'public',
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
                            'post_status' => 'public',
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
                <div class="icon js-icon" data-filter="product_cat-cabochon">
                    <img class="white" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-cabochon.svg" alt="">
                    <img class="cyan" src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-cyan-cabochon.svg" alt="">
                    <p>Cabochon</p>
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
                        'post_status' => 'public',
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
                        'post_status' => 'public',
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
                                'terms' => ['cabochon']
                            )
                        ),
                        'post_status' => 'public',
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
                        'post_status' => 'public',
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
<section class="configurator-modal modal js-modal">
    <div class="content js-content">
        <div class="modal-close js-modal-close">X</div>
        <section class="configurator js-configurator-modal"></section>
        <img class="js-lp-earrings-bg" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-earrings-box.jpg" alt="">
        <img class="js-lp-bracelets-bg" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-bracelets-box.jpg" alt="">
        <img class="js-lp-necklaces-bg" src="<?php echo get_template_directory_uri(); ?>/novon/images/original-necklaces-box.jpg" alt="">
    </div>
</section>

<?php endif; ?>