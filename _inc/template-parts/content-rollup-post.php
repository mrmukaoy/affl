<?php
/**
 * Template part for displaying posts on blog rollup page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package afflectomm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content">
		<header class="entry-header">
			<div class="entry-meta">
				<?php
				affl_archive_posted_by();
				affl_archive_posted_on();
				affl_archive_cats_tags();
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<p class="clickthrough"><a href="<?php echo esc_url( get_permalink( $post_ID ) ); ?>">Read more &rarr;</a></p>
	</div>

	<?php if ( has_post_thumbnail() ) {
		$img_url = get_the_post_thumbnail_url( $post_ID ); ?>
	<div class="thumbnail" style="background: url('<?php echo esc_url( $img_url ); ?>') center;"><a href="<?php echo esc_url( get_permalink( $post_ID ) ); ?>"></a></div>
	<?php } ?>

</a></article><!-- #post-<?php the_ID(); ?> -->
