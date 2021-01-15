<?php
/**
 * Template Name: Author Archive Page
 */

get_header();
?>
<div class="dsignfly-blog">
	<main class="dsignfly-blog__main">
		<header class="dsignfly-blog__main-header">
			<h2><?php the_title(); ?></h2>
		</header>

		<?php
			$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
			$loop  = new WP_Query(
				array(
					'post_type'      => 'dsignfly_cpt',
					'posts_per_page' => '5',
					'paged'          => $paged,
					'author'         => get_current_user_id(),
				)
			);

			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) :
					$loop->the_post();
					$title          = get_the_title();
					$excerpt        = substr( get_the_excerpt(), 0, 255 ) . '...';
					$link           = get_permalink( get_the_ID() );
					$featured_image = get_the_post_thumbnail_url();
					$comment_count  = get_comments_number();
					$author         = get_the_author_meta( 'display_name' );
					$author_url     = get_the_author_meta( 'user_url' );
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
								<span class="post-meta">by 
									<a <?php echo ! empty( $author_url ) ? 'href="' . $author_url . '"' : ''; ?>>
										<?php echo $author; ?>
									</a>
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

					<?php
				endwhile;
			}
			?>
	</main>
	<?php get_sidebar(); ?>
</div>
<?php
dsignfly_pagination_bar( $loop );
get_footer();
