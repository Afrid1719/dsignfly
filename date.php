<?php
/**
 * Template Name: Date Archives
 */

 get_header();

?>
<div class="dsignfly-blog">
	<main class="dsignfly-blog__main">
		<header class="dsignfly-blog__main-header">
			<h2><?php esc_html_e( get_the_date( 'M Y' ) . ' Archives' ); ?></h2>
		</header>

		<?php

		if ( have_posts() ) {
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'archive_item' );
			endwhile;
		}
		?>
	
	</main>
	<?php get_sidebar(); ?>
</div>
 <?php
	get_footer();
