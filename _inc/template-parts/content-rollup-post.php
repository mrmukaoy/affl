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

<article id="post-<?php the_ID(); ?>" class="<?php echo $class; ?>"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
	<div class="content">
		<header class="entry-header">
			<div class="entry-meta">
				<?php
				affl_archive_posted_by();
				affl_archive_posted_on();
				// affl_archive_cats_tags( get_the_ID() );
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<h3 class="entry-title"><?php the_title(); ?></h3>

		<p class="clickthrough">Read more &rarr;</p>
	</div>

	<?php // show (or don't show) the thumbnail here
	if ( class_exists('Dynamic_Featured_Image') ) {
		global $dynamic_featured_image;
		$featured_images = $dynamic_featured_image->get_featured_images();
		if ( ! empty( $featured_images ) ) {
			$second_image_id = $featured_images[0]['attachment_id'];
			$second_image_atts = wp_get_attachment_image_src( $second_image_id, 'square' );
			$second_image_url = $second_image_atts[0];
	?>

		<div class="thumbnail" >
			<img src="<?php echo $second_image_url; ?>" />
		</div>

	<?php
		}
	}
	?>

</a></article><!-- #post-<?php the_ID(); ?> -->
