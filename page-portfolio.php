<?php
/**
 * Template Name : Portfolio Page
 */

 get_header();
?>

	<main class="dsignfly-main">
		<header class="dsignfly-gallery-header">
			<h2><?php esc_html_e( 'DESIGN THE SOUL' ); ?></h2>
			<?php $features = array( 'Advertising', 'Multimedia', 'Photography' ); ?>
			<div class="dsignfly-tags">
			<?php
			foreach ( $features as $feature ) {
				?>
				<button 
					type="button" 
					class="dsignfly-tag-btn"
				>
					<?php esc_html_e( $feature ); ?>
				</button>
				<?php
			}
			?>
				
			</div>
		</header>

				<?php
				$loop = new WP_Query(
					array(
						'post_type'      => 'dsignfly_cpt',
						'posts_per_page' => '15',
					)
				);

				if ( $loop->have_posts() ) {

					?>
				<div class="dsignfly-portfolio-gallery">
					<?php
					while ( $loop->have_posts() ) {

						$loop->the_post();

						echo '<a href="' . get_the_permalink( get_the_ID() ) . '">';
						echo '<img src="' . get_the_post_thumbnail_url() . '" alt="' . $post->post_title . '" width="300" height="210" />';
						echo '<div class="img-overlay"><img src="' . get_theme_file_uri( 'assets/images/favicon.ico' ) . '" tabindex="-1" />
                            <button type="button">View image</button></div>';
						echo '</a>';
					}
					?>
				</div>
					<?php
				} else {
					?>
				<div class="no-posts-found">It looks like you don't have any post.</div>
					<?php
				}
				?>
	</main>

				<?php
				get_footer();
