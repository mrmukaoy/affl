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

		<?php // get thumbnail for most recent post
		$thumb_url = '';
		$args = array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => 4,
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
			do {
				$the_query->the_post();
				if ( has_post_thumbnail() ) {
					$thumb_url = get_the_post_thumbnail_url( $post->ID, 'full' );
				}
			} while ( '' == $thumb_url );

		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
		?>

		<div class="large-post-thumbnail-wrapper" style="background-image: url(<?php echo $thumb_url; ?>);">
			<div class="mask"></div>
		</div><!-- .large-post-thumbnail -->

		<?php
		if ( have_posts() ) {
			if ( ! is_front_page() ) {
				?>
				<header class="page-header">
					<p class="subtitle">Blog</p>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
				<?php
			} //endif

			$i = 1;

			/* Start the Loop */
			while ( have_posts() ) {
				the_post();

				if ( $i == 1 ) { ?>

					<div class="lead-blog-post">
						<?php
						$count = $i;
						$v = get_bloginfo( 'version' );
						if ( version_compare( $v, '5.5', '>=' ) ) {
							// WP 5.5+ ONLY
							get_template_part(
								'_inc/template-parts/content-rollup-post',
								null,
								array(
									'count' => $i,
								)
							);
						} else {
							include( locate_template( '_inc/template-parts/content-rollup-post.php' ) );
						}
						?>
					</div>

					<div class="articles-wrapper">

					<?php
				} else {
					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					// get_template_part( '_inc/template-parts/content-rollup', get_post_type() );


					// WP 5.5+ ONLY
					$v = get_bloginfo( 'version' );
					if ( version_compare( $v, '5.5', '>=' ) ) {
						// WordPress version is (or greater than) 5.5
						get_template_part(
							'_inc/template-parts/content-rollup-post',
							null,
							array(
								'count' => $i,
								'version' => $v,
							)
						);
					}

				}

				$i++;

			} //endwhile ?>

		</div><!-- .articles-wrapper -->

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
