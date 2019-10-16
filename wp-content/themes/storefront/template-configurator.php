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
			<section class="novon-wrap less-margin configurator-wrap">
				<div class="js-dummy"></div>
			      <div class="fancy-header">
			        <h2>Design Your Own</h2>
				  </div>
				  <div class="configurator-toggle">
					  <button class="original js-original js-active">Original Collection</button>
					  <button class="mini js-mini">Mini-Collection</button>
				  </div>
				  <?php include_once('template-parts/configurator.php'); ?>
				  <?php include_once('template-parts/miniconfigurator.php'); ?>
				
				
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
