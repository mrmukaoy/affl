<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package afflectomm
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php // try to find the photo for post_thumbnail on the blog home page, since once you assign a page to be blog home, you can no longer assign an image.

		// HOW TO: First, assign a featured image to the page
		// THEN: assign that page as BLog home.
		$blog_id = get_option( 'page_for_posts' );
		$image_url = get_the_post_thumbnail_url($blog_id);
		?>

		<div class="large-post-thumbnail-wrapper" style="background-image: url(<?php echo $image_url; ?>);">
			<div class="mask"></div>
		</div><!-- .large-post-thumbnail -->

		<?php
		if ( have_posts() ) {
			if ( ! is_front_page() ) {
				?>
				<header>
					<p class="subtitle">Blog</p>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
				<?php
			} //endif
			?>

			<div class="articles-wrapper">
				<?php /* Start the Loop */
				while ( have_posts() ) {
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( '_inc/template-parts/content-rollup', get_post_type() );

				} //endwhile ?>

			</div>

			<?php
			the_posts_navigation();

		} else {
			get_template_part( '_inc/template-parts/content', 'none' );
		} //endif
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
