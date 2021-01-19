<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dsignfly
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dsignfly' ); ?></a>

	<header id="masthead" class="site-header">
		<div id="header-container">
			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) :
					the_custom_logo();
				else :
					$image_url = get_theme_file_uri( 'assets/images/home/logo.png' );
					?>
					<img src="<?php esc_attr_e( $image_url ); ?>" alt="<?php esc_attr_e( 'Gearing up the ideas' ); ?>" class="dsignfly-header-img" width="400" height="300"/>
					<?php
				endif;
				?>
				
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" data-toggle="collapse" data-target="#site-navmenu__list" aria-controls="primary-menu" aria-expanded="false">
					<svg viewBox="0 0 100 80" width="40" height="40" enable-background="new 0 0 512 512">
						<rect width="100" height="20"></rect>
						<rect y="30" width="100" height="20"></rect>
						<rect y="60" width="100" height="20"></rect>
					</svg>
				</button>
				<?php
				wp_nav_menu(
					array(
						'menu'            => 'menu-1',
						'menu_class'      => 'dsignfly-menu__list',
						'container_class' => 'dsignfly-menu',
						'theme_location'  => 'menu-1',
						'menu_id'         => 'primary-menu',
					)
				);
				?>
				<form class="dsignfly-search" method="get" action="<?php bloginfo('url'); ?>">
					<input type="text" class="search-input" id="search" name="s" value="<?php the_search_query(); ?>" />
					<button type="submit" class="search-submit-btn"><img src="<?php echo get_theme_file_uri('assets/images/home/search-icon.png'); ?>"></button>                
				</form>
			</nav><!-- #site-navigation -->
		</div><!-- #header-container -->
	</header><!-- #masthead -->
	
	<?php if ( is_home() ) : ?>
	<?php $banner_bg = get_theme_file_uri( 'assets/images/home/slider-image.png' ); ?> 
	<div class="dsignfly-banner-container">
		<div class="dsignfly-banner">
			<a class="dsignfly-banner__left-arrow" href="#">
				<img 
					src="<?php esc_attr_e( get_theme_file_uri( 'assets/images/home/slider-arrow-left.png' ) ); ?>" 
					alt="Slide left" 
					class="dsignfly-banner__left-arrow-img"
				/>
			</a>
			<div class="dsignfly-banner__text">
				<h1 class="dsignfly-banner__header-text"><?php esc_html_e( 'Gearing up the ideas' ); ?></h1>
				<p class="dsignfly-banner__body-text">
				<!-- What should be here needs clarification -->
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis est neque veniam praesentium vitae suscipit nesciunt totam repellat, soluta assumenda tempore. Impedit quibusdam earum praesentium repudiandae, omnis accusantium fuga alias.
				</p>
			</div>
			<a class="dsignfly-banner__right-arrow" href="#">
				<img 
					src="<?php esc_attr_e( get_theme_file_uri( 'assets/images/home/slider-arrow-right.png' ) ); ?>" 
					alt="Slide right" 
					class="dsignfly-banner__right-arrow-img" 
				/>
			</a>
		</div><!-- Banner -->
	</div>
	<?php endif; ?>
	
	<div class="dsignfly-features">
		<div class="dsignfly-features__container">
			<div class="advertising">
				<img src="<?php esc_attr_e( get_theme_file_uri( 'assets/images/home/feature-icons-advertising.png' ) ); ?>" width="50" height="50" alt="Advertising">
				<a href="#">Advertising</a>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor montes..</p>
			</div>
			<div class="multimedia">
				<img src="<?php esc_attr_e( get_theme_file_uri( 'assets/images/home/feature-icons-multimedia.png' ) ); ?>" width="50" height="50" alt="Multimedia">
				<a href="#">Multimedia</a>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor montes..</p>
			</div>
			<div class="photography">
				<img src="<?php esc_attr_e( get_theme_file_uri( 'assets/images/home/feature-icons-photography.png' ) ); ?>" width="50" height="50" alt="Photography">
				<a href="#">Photography</a>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget montes..</p>
			</div>
		</div>
	</div>