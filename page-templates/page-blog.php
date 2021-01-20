<?php
/**
 * Template Name: Blog Page
 */

 get_header();

 $paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
 $args  = array(
	 'post_type'      => array( 'post', 'dsignfly_cpt' ),
	 'posts_per_page' => '5',
	 'paged'          => $paged,
	 'post_status'    => 'publish',
 );

 $loop = new WP_Query( $args );

	?>
<div class="dsignfly-blog">
	<main class="dsignfly-blog__main">
		<header class="dsignfly-blog__main-header">
			<h2><?php esc_html_e( 'Let\'s Blog', 'dsignfly' ); ?></h2>
		</header>

		<?php

		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) :
				$loop->the_post();
				get_template_part( 'template-parts/content', 'archive_item' );
			endwhile;
		}
		?>
	
	</main>
	<?php get_sidebar(); ?>
</div>
 <?php
	dsignfly_pagination_bar( $loop );
	get_footer();
