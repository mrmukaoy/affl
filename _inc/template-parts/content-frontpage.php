<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package afflectomm
 */

?>

<?php affl_large_thumbnail(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1 class="site-title screen-reader-text"><?php echo get_bloginfo( 'name' ); ?></h1>
	<p class="screen-reader-text"><?php echo get_bloginfo( 'description' ); ?></p>

	<div class="home-hero-wrapper">
		<div class="home-logo">
			<?php echo file_get_contents( get_stylesheet_directory_uri() . '/_assets/images/logo-full.svg' ); ?>
		</div>

		<?php get_template_part( '_inc/template-parts/socialbar' ); ?>

	</div>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'affl' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'affl' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
