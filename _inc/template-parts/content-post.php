<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package afflectomm
 */

?>

<?php if ( is_singular() ) { affl_large_thumbnail(); } ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_singular() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} else {
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	} //endif
	?>
	<div class="post-main">
		<header class="entry-header">
			<div class="entry-meta">
				<div class="who-when">
					<?php
					affl_posted_by();
					affl_posted_on();
					?>
				</div>
				<!-- <div class="cats-tags">
					<?php // affl_entry_cats_tags(); ?>
				</div> -->
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'affl' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'affl' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php /*
		<footer class="entry-footer">
			<?php affl_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		*/ ?>
	</div><!-- .post-main -->
</article><!-- #post-<?php the_ID(); ?> -->
