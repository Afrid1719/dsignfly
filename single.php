<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dsignfly
 */

get_header();
?>
	<div class="dsignfly-post-container">
		<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) : ?>
					<div class="comments-wrapper">
						<p class="bars"><?php esc_html_e( 'Comments', 'designfly' ); ?></p>
					<?php comments_template(); ?>
					</div>
				<?php
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>
	</div>
<?php
get_footer();
