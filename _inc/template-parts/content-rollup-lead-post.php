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
	<div class="content">
		<header class="entry-header">
			<div class="entry-meta">
				<?php
				affl_archive_posted_by();
				affl_archive_posted_on();
				affl_archive_cats_tags( get_the_ID() );
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<p class="excerpt"><?php echo get_the_excerpt(); ?></p>

		<p class="clickthrough"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">Read more &rarr;</a></p>
	</div>

	<?php // show (or don't show) the thumbnail here
	if ( has_post_thumbnail() ) {
		$img_url = get_the_post_thumbnail_url( get_the_ID() ); ?>
	<div class="thumbnail" style="background: url('<?php echo esc_url( $img_url ); ?>') center;"></div>
	<?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->
