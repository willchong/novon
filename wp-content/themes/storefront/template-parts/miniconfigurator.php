<section class="miniconfigurator js-miniconfigurator">
    <div class="helper-copy">
        <p>
            <strong>Step 1:</strong> MINI STEP 1.<br>
            <strong>Step 2:</strong> MINI STEP 2.<br>
            <strong>Step 3:</strong> MINI STEP 3.
        </p>
    </div>
    <div class="preview js-preview">
        <img class="mini-configurator-bg" src="<?php echo get_template_directory_uri(); ?>/novon/images/configurator/mini-collection/straight/chain.png" alt="">
        <div class="firstpiece js-firstpiece">
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
        </div>
        <div class="secondpiece js-secondpiece">
            <div class="phase phase-1 js-phase-1 js-active">
                <img class="piece" src="" alt="">
            </div>
            <div class="phase phase-2 js-phase-2 js-active">
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
                                    'terms' => ['mini-tops']
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
                                    'terms' => ['mini-stones']
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
                                    'terms' => ['mini-coins']
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
        <button class="js-add-second-piece">Add another</button>
    </div>
    <div class="second-selections">
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
                                    'terms' => ['mini-tops']
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
                                    'terms' => ['mini-stones']
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
                                    'terms' => ['mini-coins']
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
    </div>
    <section class="configurator-modal modal js-modal">
        <div class="content js-content">
            <div class="modal-close js-modal-close"><img src="<?php echo get_template_directory_uri(); ?>/novon/images/x-black.svg" alt=""></div>
            <section class="miniconfigurator js-miniconfigurator-modal"></section>
            <img class="js-lp-mini-bg" src="<?php echo get_template_directory_uri(); ?>/novon/images/live-preview-mini-bg.jpg" alt="">
		</div>
	</section>
</section>