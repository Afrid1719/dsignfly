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

	<header id="masthead" class="site-header" style="background-image: url(<?php esc_attr_e( get_theme_file_uri( 'assets/images/repeatable-bg.png' ) ); ?>);">
		<div class="site-branding">
			<?php
			if ( has_custom_logo() ) :
				the_custom_logo();
			else :
				$image_url = get_theme_file_uri( 'assets/images/home/logo.png' );
				?>
				<img src="<?php esc_attr_e( $image_url ); ?>" alt="<?php esc_attr_e( bloginfo('title') ); ?>" class="dsignfly-header-img" width="400" height="300"/>
				<?php
			endif;
			?>
			 
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'dsignfly' ); ?></button>
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
			<form class="dsignfly-search">
				<input type="text" class="search-input" />
				<button class="search-submit-btn"><img src="<?php esc_attr_e( get_theme_file_uri( 'assets/images/home/search-icon.png' ) ); ?>" class="search-submit-img" /></button>                    
			</form>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
