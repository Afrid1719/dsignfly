<?php
/**
 * Template for the Popular Posts Widget to display each post.
 */

 $title              = get_the_title();
 $link               = get_permalink( get_the_ID() );
 $featured_image_url = get_the_post_thumbnail_url();
 $post_day       = get_the_time( 'd' );
	$post_month     = get_the_time( 'M' );
 $post_year     = get_the_time( 'Y' );
?>
 <div class="dsignfly-popular-post" id="<?php echo get_the_ID(); ?>">
	<div class="dsignfly-popular-post__img-container">
		<img 
			src="<?php echo esc_url( $featured_image_url ); ?>" 
			alt="<?php echo $title; ?>" 
			class="dsignfly-popular-post__img"
			width="45"
			height="45"
		/>
	</div>
	<div class="dsignfly-popular-post__data">
        <a href="<?php echo esc_url($link); ?>" class="post-title"><?php echo $title; ?></a>
		<div class="post-info">
			<?php dsignfly_posted_by(); ?> on <?php echo $post_day . ' ' . $post_month . ' ' . $post_year; ?>
		</div>
	</div>
 </div>
