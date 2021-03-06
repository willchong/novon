<section class="configurator js-configurator js-active">
    <div class="helper-copy">
        <p>
            <strong>Step 1:</strong> Choose a chain, pendant, or earring top.<br>
            <strong>Step 2:</strong> Add up to two natural gemstones, crystals or elemental coins.<br>
            <strong>Step 3:</strong> Want to add more pieces to your unique creation? Choose more in A La Carte.
        </p>
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
        <div class="buttons js-buttons js-active">
        <a class="cta reset js-reset">Reset</a>
        <a class="cta add-items js-add-items">Add Items to Cart</a>
        <a class="cta liveview js-liveview disabled">View your design</a>
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
                                'terms' => ['earrings']
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
    <section class="configurator-modal modal js-modal">
        <div class="content js-content">
            <div class="modal-close js-modal-close"><img src="<?php echo get_template_directory_uri(); ?>/novon/images/x-black.svg" alt=""></div>
            <section class="configurator js-configurator-modal"></section>
            <img class="js-lp-earrings-bg" src="<?php echo get_template_directory_uri(); ?>/novon/images/live-preview-earrings-bg.jpg" alt="">
            <img class="js-lp-pendants-bg" src="<?php echo get_template_directory_uri(); ?>/novon/images/live-preview-chains-bg.jpg" alt="">
            <img class="js-lp-necklaces-bg" src="<?php echo get_template_directory_uri(); ?>/novon/images/live-preview-chains-bg.jpg" alt="">
		</div>
	</section>
</section>