<?php
/**
 * Template part for all archives type content
 */

	$title          = get_the_title();
	$excerpt        = substr( get_the_excerpt(), 0, 255 ) . '...';
	$link           = get_permalink( get_the_ID() );
	$featured_image = get_the_post_thumbnail_url();
	$comment_count  = get_comments_number();
	$post_day       = get_the_time( 'd' );
	$post_month     = get_the_time( 'M' );
	$post_full_date = get_the_time( 'j F Y' );

?>
		
	<div class="dsignfly-blog__post">
		<header class="dsignfly-blog__post-header">
			<div class="dsignfly-blog__post-header-column-one">
				<span class="post-day"><?php echo $post_day; ?></span>
				<br>
				<span class="post-month"><?php echo $post_month; ?></span>
			</div>
			<h3 class="dsignfly-blog__post-header-column-two"><?php echo $title; ?></h3>    
		</header>
		<div class="dsignfly-blog__post-content">
			<img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php echo $title; ?>" width="220" height="153"/>
			<div class="post-details">
				<div class="post-info">
					<span class="post-meta">
				<?php dsignfly_posted_by(); ?>
						on <?php echo $post_full_date; ?>
					</span>
					<span class="post-comments">
					<?php echo $comment_count; ?> comment(s)
					</span>
				</div>
				<section class="post-excerpt">
				<?php echo $excerpt; ?>
				</section>
				<a href="<?php echo $link; ?>" class="post-link">Read More</a>
			</div>
		</div>
	</div>


