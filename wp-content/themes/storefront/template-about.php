<?php
/**
 * The template for displaying About Us.
 *
 * Template Name: About Us
 *
 * @package storefront
 */

 $fields = get_fields();

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="about">
                <?php 
                    echo $fields['editor'];
                ?>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
