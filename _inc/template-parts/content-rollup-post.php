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
// retrieve params passed from parent file
$v = get_bloginfo( 'version' );
if ( version_compare( $v, '5.5', '>=' ) ) {
	$count = $args['count'];
}

// build our own classes for post
$class = 'post';
if ( has_term( 'show-on-archive', 'show_thumbs' ) ) {
	$class .= ' has-post-thumbnail';
}
?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $class; ?>"><?php if ( 1 != $count ) { ?><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php } ?>
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

		<h3 class="entry-title"><?php if ( 1 == $count ) { ?><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php } ?><?php the_title(); ?><?php if ( 1 == $count ) { ?></a><?php } ?></h3>
		<?php if ( 1 == $count ) { echo '<p class="excerpt">' . get_the_excerpt() . "</p>\n"; } ?>

		<p class="clickthrough"><?php if ( 1 == $count ) { ?><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php } ?>Read more &rarr;<?php if ( 1 == $count ) { ?></a><?php } ?></p>
	</div>

	<?php // show (or don't show) the thumbnail here
	if ( ( has_post_thumbnail() && 1 == $count ) || has_post_thumbnail() && has_term( 'show-on-archive', 'show_thumbs' ) ) {
		$img_url = get_the_post_thumbnail_url( get_the_ID() ); ?>
	<div class="thumbnail" style="background: url('<?php echo esc_url( $img_url ); ?>') center;"></div>
	<?php } ?>

<?php if ( 1 != $count ) { ?></a><?php } ?></article><!-- #post-<?php the_ID(); ?> -->
