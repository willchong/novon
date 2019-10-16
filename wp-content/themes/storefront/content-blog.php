<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */

$fields = get_fields(); 


?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="novon-blog-post">
		<h2><?php the_title(); ?></h2>
		<div class="meta-info">
			<!-- <span>By: <?php the_author(); ?></span> -->
			<span>Posted on <?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date; ?></span>
		</div>
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		  <a href="<?php the_permalink();?>">
		  	<img src="<?php echo $image[0]; ?>" alt="">
		  </a>
		<?php elseif ($fields): ?>
		  <div class="inline-images image-length-<?php echo count($fields['images']); ?>">
		  	<?php foreach ($fields['images'] as $image) { ?>
		  		<img src="<?php echo $image['url']; ?>" alt="">
		  	<? } ?>
		  </div>
		<?php endif; ?>
		<?php the_content(); ?>
	</div>

</div><!-- #post-## -->
