<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package afflectomm
 */

?>

</div><!-- #page -->

<footer id="colophon" class="site-footer">
	<div class="site-footer__arrow"></div>
	<div class="site-footer__spacer"></div>
	<div class="site-footer__content">

		<a class="mark mark--link js-smoothscroll" href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg viewBox="0 0 33 40" xmlns="http://www.w3.org/2000/svg"><title>AFFLECTO MARK</title><g fill="#F7BF3B" fill-rule="evenodd"><path d="M17.74 23.968c1.72 3.651-2.81 9.365-7.254 11.41a7.431 7.431 0 0 1-5.645.242 7.344 7.344 0 0 1-4.159-3.791c-1.717-3.664-.07-7.62 3.582-9.715 3.531-2.022 11.755-1.797 13.476 1.854z"/><path d="M24.837 5.578C23.716 2.55 20.884.476 17.636.3c-3.25-.176-6.292 1.58-7.74 4.468a8.011 8.011 0 0 0 1.084 8.81c.267.385.56.753.874 1.101a11.823 11.823 0 0 0 2.426 1.699c8.112 4.4 8.541 4.914 6.968 14.501-.08.48-.525 2.702-.464 3.105-.018 2.659 1.74 5.01 4.312 5.767a6.057 6.057 0 0 0 6.79-2.498 5.932 5.932 0 0 0-.53-7.158 7.54 7.54 0 0 0-.797-1.057c-.471-.55-6.052-7.301-5.447-16.895.058-.911.24-1.702.279-2.441.01-.469-.009-.938-.058-1.404a7.973 7.973 0 0 0-.496-2.72z"/></g></svg></a>

		<?php get_template_part( '_inc/template-parts/socialbar' ); ?>

	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
