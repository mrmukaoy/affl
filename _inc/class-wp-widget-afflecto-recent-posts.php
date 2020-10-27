<?php
/**
 * Widget API: WP_Widget_AfflectoMM_Recent_Posts class
 * A modification of the WP core widget, customized for this theme
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_AfflectoMM_Recent_Posts extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_recent_entries',
			'description'                 => __( 'Your site&#8217;s most recent Posts.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'affl-recent-posts', __( 'Afflecto MM Recent Posts' ), $widget_ops );
		$this->alt_option_name = 'widget_recent_entries';
	}

	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$default_title = __( 'Recent Posts' );
		$title         = ( ! empty( $instance['title'] ) ) ? $instance['title'] : $default_title;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$default_subhead = __( 'From the Blog' );
		$subhead         = ( ! empty( $instance['subhead'] ) ) ? $instance['subhead'] : $default_subhead;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$subhead = apply_filters( 'widget_title', $subhead, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
		if ( ! $number ) {
			$number = 3;
		}

		$r = new WP_Query(
			/**
			 * Filters the arguments for the Recent Posts widget.
			 *
			 * @since 3.4.0
			 * @since 4.9.0 Added the `$instance` parameter.
			 *
			 * @see WP_Query::get_posts()
			 *
			 * @param array $args     An array of arguments used to retrieve the recent posts.
			 * @param array $instance Array of settings for the current widget.
			 */
			apply_filters(
				'widget_posts_args',
				array(
					'posts_per_page'      => $number,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
				),
				$instance
			)
		);

		if ( ! $r->have_posts() ) {
			return;
		}
		?>

		<?php echo $args['before_widget']; ?>

		<?php
		if ( $subhead ) {
			echo "<p class=\"subhead\">$subhead</p>";
		}
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';

		/** This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php */
		$format = apply_filters( 'navigation_widgets_format', $format );

		if ( 'html5' === $format ) {
			// The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
			$title      = trim( strip_tags( $title ) );
			$subhead   = trim( strip_tags( $subhead ) );
			$aria_label = $title ? $title : $default_title;
			echo '<nav role="navigation" aria-label="' . esc_attr( $aria_label ) . '">';
		}
		?>

		<div class="articles-wrapper">
			<?php foreach ( $r->posts as $recent_post ) : ?>
				<?php
				$pid          = $recent_post->ID;
				$author       = $recent_post->post_author;
				$pdate        =
				$post_title   = get_the_title( $recent_post->ID );
				$title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
				$aria_current = '';

				if ( get_queried_object_id() === $recent_post->ID ) {
					$aria_current = ' aria-current="page"';
				}
				?>
				<article class="post"><a href="<?php the_permalink( $recent_post->ID ); ?>" <?php echo $aria_current; ?>>
					<div class="content">
						<header class="entry-header">
							<div class="entry-meta">
								<?php
								$byline = sprintf(
									esc_html_x( 'Posted by %s', 'post author', 'affl' ),
									'<span class="author vcard">' . esc_html( get_the_author_meta( 'display_name', $author ) ) . '</span>'
								);
								echo '<span class="byline"> ' . $byline . '</span>';

								$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
								if ( get_the_time( 'U', $pid ) !== get_the_modified_time( 'U', $pid ) ) {
									$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
								}

								$time_string = sprintf(
									$time_string,
									esc_attr( get_the_date( DATE_W3C, $pid  ) ),
									esc_html( get_the_date( '', $pid ) ),
									esc_attr( get_the_modified_date( DATE_W3C, $pid ) ),
									esc_html( get_the_modified_date( '', $pid ) )
								);

								$posted_on = sprintf(
									/* translators: %s: post date. */
									esc_html_x( '%s', 'post date', 'affl' ),
						 			$time_string
								);

								echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								?>
							</div><!-- .entry-meta -->
						</header><!-- .entry-header -->

						<h3 class="entry-title"><?php echo $title; ?></h3>

						<p class="clickthrough">Read more &rarr;</p>
					</div>
				</a></article><!-- #post-<?php the_ID(); ?> -->

			<?php endforeach; ?>
		</div>

		<?php
		if ( 'html5' === $format ) {
			echo '</nav>';
		}

		echo $args['after_widget'];
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['subhead']  = sanitize_text_field( $new_instance['subhead'] );
		$instance['number']    = (int) $new_instance['number'];
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$subhead  = isset( $instance['subhead'] ) ? esc_attr( $instance['subhead'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'subhead' ); ?>"><?php _e( 'Subtitle:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'subhead' ); ?>" name="<?php echo $this->get_field_name( 'subhead' ); ?>" type="text" value="<?php echo $subhead; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
		</p>
		<?php
	}
}
