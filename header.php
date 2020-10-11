<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package afflectomm
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/_assets/images/favicon/apple-touch-icon.png?v=20160912">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/_assets/images/favicon/favicon-32x32.png?v=20160912" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/_assets/images/favicon/favicon-16x16.png?v=20160912" sizes="16x16">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'affl' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="mark-header">
			<a id="markButton" class="mark mark--animate mark--link js-smoothscroll" href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg viewBox="0 0 33 40" xmlns="http://www.w3.org/2000/svg"><title><?php bloginfo( 'name' ); ?></title><g fill="#F7BF3B" fill-rule="evenodd"><path d="M17.74 23.968c1.72 3.651-2.81 9.365-7.254 11.41a7.431 7.431 0 0 1-5.645.242 7.344 7.344 0 0 1-4.159-3.791c-1.717-3.664-.07-7.62 3.582-9.715 3.531-2.022 11.755-1.797 13.476 1.854z"/><path d="M24.837 5.578C23.716 2.55 20.884.476 17.636.3c-3.25-.176-6.292 1.58-7.74 4.468a8.011 8.011 0 0 0 1.084 8.81c.267.385.56.753.874 1.101a11.823 11.823 0 0 0 2.426 1.699c8.112 4.4 8.541 4.914 6.968 14.501-.08.48-.525 2.702-.464 3.105-.018 2.659 1.74 5.01 4.312 5.767a6.057 6.057 0 0 0 6.79-2.498 5.932 5.932 0 0 0-.53-7.158 7.54 7.54 0 0 0-.797-1.057c-.471-.55-6.052-7.301-5.447-16.895.058-.911.24-1.702.279-2.441.01-.469-.009-.938-.058-1.404a7.973 7.973 0 0 0-.496-2.72z"/></g></svg></a>
		</div>

		<button id="menuButton" class="site-nav__btn" aria-controls="primary-menu" aria-expanded="false"><svg viewBox="0 0 24 6" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><g fill="#D8D8D8" fill-rule="evenodd"><circle cx="12" cy="3" r="3"/><circle cx="21" cy="3" r="3"/><circle cx="3" cy="3" r="3"/></g></svg></button>
		<nav id="site-navigation" class="main-navigation toggle-off">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
