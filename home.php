<?php
/**
 * Static front page template
 *
 * @package dsignfly
 */

get_header();
?>
	<?php $banner_bg = get_theme_file_uri('assets/images/home/slider-image.png'); ?> 
    <div class="dsignfly-banner" style="background-image: url(<?php esc_attr_e($banner_bg); ?>);">
        <!-- <img class="dsignfly-banner-bg"  aria-hidden="true" /> -->
		<a class="dsignfly-banner__left-arrow" href="#">
			<img 
				src="<?php esc_attr_e( get_theme_file_uri( 'assets/images/home/slider-arrows.png' ) ); ?>" 
				alt="Slide left" 
				class="dsignfly-banner__left-arrow-img"
			/>
		</a>
		<div class="dsignfly-banner__text">
			<h1 class="dsignfly-banner__header-text"><?php esc_html_e( bloginfo( 'description' ) ); ?></h1>
			<p class="dsignfly-banner__body-text">
			<!-- What should be here needs clarification -->
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis est neque veniam praesentium vitae suscipit nesciunt totam repellat, soluta assumenda tempore. Impedit quibusdam earum praesentium repudiandae, omnis accusantium fuga alias.
			</p>
		</div>
		<a class="dsignfly-banner__right-arrow" href="#">
			<img 
				src="<?php esc_attr_e( get_theme_file_uri( 'assets/images/home/slider-arrows.png' ) ); ?>" 
				alt="Slide right" 
				class="dsignfly-banner__right-arrow-img" 
			/>
		</a>
    </div>
<?php
get_footer();
