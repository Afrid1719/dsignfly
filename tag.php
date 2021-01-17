<?php
/**
 * Template Name: Author Archives
 */

 get_header();

 $paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
 $args  = array(
	 'post_type'      => 'dsignfly_cpt',
	 'posts_per_page' => '5',
	 'paged'          => $paged,
);

 $args['tag'] = get_query_var('tag');
 $loop        = new WP_Query( $args );
 
	?>
<div class="dsignfly-blog">
	<main class="dsignfly-blog__main">
		<header class="dsignfly-blog__main-header">
			<h2><?php esc_html_e( ucwords(get_query_var('tag')) . '\'s Archives' ); ?></h2>
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
