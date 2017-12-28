<?php
/**
 *
 * @package storefront
 */

?>

<section class="originals">
    <div class="category">
    	<a href="">
	        <img src="<?php echo get_template_directory_uri(); ?>/novon/images/original-earrings.jpg" alt="">
	        <h3>Original Earrings</h3>
    	</a>
    </div>
    <div class="category">
        <a href="">
	        <img src="<?php echo get_template_directory_uri(); ?>/novon/images/original-bracelets.jpg" alt="">
	        <h3>Original Bracelets</h3>
        </a>
    </div>
    <div class="category">
        <a href="">
	        <img src="<?php echo get_template_directory_uri(); ?>/novon/images/original-necklaces.jpg" alt="">
	        <h3>Original Necklaces</h3>
        </a>
    </div>
</section>

<section class="novon-wrap less-margin">

    <section class="products">
        <section class="tops">
            <div class="fancy-header">
                <h2>TOPS</h2>
            </div>
            <p>Start with one of our earring or pendant tops and let inspiration be your guide. Select from a variety of C-Link attachments to create a magnificent bracelet.</p>
            <div class="icons">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-bracelet.svg" alt="">
                    <p>Bracelets</p>
                </div>
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-earrings.svg" alt="">
                    <p>Earrings</p>
                </div>
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-necklace.svg" alt="">
                    <p>Necklaces</p>
                </div>
            </div>
            <ul class="list">
            	<?php
            		$args = array(
            			'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => 'tops'
                            )
                            // array(
                            //     'taxonomy' => 'product_cat',
                            //     'field' => 'slug',
                            //     'terms' => 'bracelets'
                            // )
                        ),
                        'post_type' => 'product',
                        'orderby' => 'title'
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
      	        <div class="icon">
      	            <img src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-sphere.svg" alt="">
      	            <p>Sphere</p>
      	        </div>
      	        <div class="icon">
      	            <img src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-oval.svg" alt="">
      	            <p>Oval</p>
      	        </div>
      	        <div class="icon">
      	            <img src="<?php echo get_template_directory_uri(); ?>/novon/images/novon-icons-coin.svg" alt="">
      	            <p>Coin</p>
      	        </div>
      	    </div>
      	    <ul class="list">
      	    	<?php
      	    		$args = array(
      	    			'posts_per_page' => -1,
      	                'tax_query' => array(
      	                    'relation' => 'AND',
      	                    array(
      	                        'taxonomy' => 'product_cat',
      	                        'field' => 'slug',
      	                        'terms' => 'attachments'
      	                    )
      	                ),
      	                'post_type' => 'product',
      	                'orderby' => 'title'
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
