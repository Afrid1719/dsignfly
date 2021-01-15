<?php
/**
 * Static front page template
 *
 * @package dsignfly
 */

get_header();
?>
	

	<main class="dsignfly-main">
	<?php
		$loop = new WP_Query(
			array(
				'post_type'      => 'dsignfly_cpt',
				'posts_per_page' => '6',
			)
		);
		?>
		<header class="dsignfly-gallery-header">
			<h2><?php esc_html_e( 'D\'SIGNFLY THE SOUL' ); ?></h2>
			<button 
				type="button" 
				class="dsignfly-view-all-btn"
				<?php echo ( ! $loop->have_posts() ) ? 'disbaled aria-hidden="true"' : ''; ?>
			>
				view all
			</button>
		</header>

		<?php
		if ( $loop->have_posts() ) :
			?>
			<div class="dsignfly-gallery">
			<?php
			while ( $loop->have_posts() ) :
				$loop->the_post();
				echo '<a href="' . get_the_permalink( get_the_ID() ) . '">';
				echo '<img src="' . get_the_post_thumbnail_url() . '" alt="' . $post->post_title . '" width="300" height="210" />';
				echo '</a>';
			endwhile;
			?>
			</div>
			<?php
		else :
			?>
			<div class="no-posts-found">It looks like you don't have any post.</div>
			<?php
		endif;
		?>
	</main>
<?php
get_footer();
