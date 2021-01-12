<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dsignfly
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-footer__column-one">
			<h3 class="site-footer__welcome-header">
				<?php printf(esc_html__('Welcome to %s', 'dsignfly'), 'D\'SIGN');?><em>fly</em>
			</h3>
			<div class="site-footer__welcome-body">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime omnis quam corporis, eveniet tempora deserunt? Doloremque aliquid aliquam eos totam exercitationem, libero quaerat saepe cupiditate possimus harum aspernatur dicta consequuntur.
			</div>
			<a href="#" class="site-footer__read-more site-footer__link">Read more</a>
		</div>
		<div class="site-footer__column-two">
			<h3 class="site-footer__contact-header">
				<?php _e('Contact Us', 'dsignfly'); ?>
			</h3>
			<div class="site-footer__contact-body">
				<div class="site-footer__contact-info">4 Privet Drive, Littlewhinging, Surrey
					Tel : 123456789, Fax: 524654
					Email: <a class="site-footer__link" href="#"><?php esc_attr_e(bloginfo('admin_email')); ?></a>
				</div>
			</div>
			<div class="site-footer__social">
				<?php $social_class = ['facebook', 'google-plus', 'linkedin', 'pinterest', 'twitter'];?>
				<?php foreach($social_class as $social): ?>
				<a href="#" class="site-footer__social-link <?php esc_attr_e($social);?>">
					<img 
						src="<?php esc_attr_e(get_theme_file_uri('assets/images/social/') . $social . '-dark.png'); ?>" 
						alt="<?php esc_attr_e($social);?>"
					>
				</a>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="site-footer__copyright">
			<?php esc_html_e('&copy; 2020 - D\'SIGNfly | designed by ') ?><a href="#" class="designer-name">Afrid</a>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
