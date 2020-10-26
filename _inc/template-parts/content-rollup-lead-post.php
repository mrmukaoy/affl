<?php
/**
 * Template part for displaying posts on blog rollup page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package afflectomm
 */

?>


<?php
// build our own classes for post
$class = 'post';
if ( has_term( 'show-on-archive', 'show_thumbs' ) ) {
	$class .= ' has-post-thumbnail';
}
?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $class; ?>">
	<div class="content portion">
		<header class="entry-header">
			<div class="entry-meta">
				<?php
				affl_archive_posted_by();
				affl_archive_posted_on();
				// affl_archive_cats_tags( get_the_ID() );
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<p class="excerpt"><?php echo get_the_excerpt(); ?></p>

	</div>
	<p class="clickthrough"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">Read more &rarr;</a></p>

	<?php // show (or don't show) the thumbnail here
	if ( class_exists('Dynamic_Featured_Image') ) {
		global $dynamic_featured_image;
		$featured_images = $dynamic_featured_image->get_featured_images();
		if ( ! empty( $featured_images ) ) {
			$second_image_id = $featured_images[0]['attachment_id'];
			$second_image_atts = wp_get_attachment_image_src( $second_image_id, 'square' );
			$second_image_url = $second_image_atts[0];
	?>

		<div class="thumbnail portion" >
			<img src="<?php echo $second_image_url; ?>" />
		</div>

	<?php
		}
	}
	?>
</article><!-- #post-<?php the_ID(); ?> -->
