<?php
/*
Plugin Name: Blossom Popular Discussions
Description: A feed of top conversations happening on Blossom posts
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
	class blm_popular_discussions_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'blm_popular_discussions_widget', 

				// Widget name will appear in UI
				__('Blossom Popular Discussions', 'blm_popular_discussions_widget_domain'), 

				// Widget description
				array( 'description' => __( 'A feed of top conversations happening on Blossom posts', 'blm_popular_discussions_widget_domain' ), ) 
			);
		}

		// Creating widget front-end
		// This is where the action happens
		public function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
			// before and after widget arguments are defined by themes
			// echo $args['before_widget'];
			// if ( ! empty( $title ) )
			// 	echo $args['before_title'] . $title . $args['after_title'];
			?>
			<div id="popular-discussions-wrapper" class="sidebar-widget">
				<div>
					<a href="" alt="Join the conversation">
						<h4 id="discussion-title">Coming out to family</h4>
						<p id="discussion-snippet">I think I’m gay but I’m afraid to talk to anyone about it because I’m afraid of what they...</p>
					</a>
				</div>
				<div>
					<a href="" alt="Join the conversation">
					<h4 id="discussion-title">A tough breakup</h4>
					<p id="discussion-snippet">My boyfriend I’ve been with for almost 2 years broke up with me a couple weeks ago and...</p>
					</a>
				</div>
				<div>
					<a href="" alt="Join the conversation">
						<h4 id="discussion-title">Getting a friend the help she needs</h4>
						<p id="discussion-snippet">I think one of my friends has an eating disorder– I never see her eat lunch, and she says...</p>
					</a>
				</div>
				<div>
					<a href="" alt="Join the conversation">
						<h4 id="discussion-title">Dealing with divorce</h4>
						<p id="discussion-snippet">My parents have been fighting and yelling at each other a lot lately and its really taking a...</p>
					</a>
				</div>
				<div>
					<a href="" alt="Join the conversation">
						<h4 id="discussion-title">Abuse in a relationship</h4>
						<p id="discussion-snippet">The other day my boyfriend and I got in a really intense argument and he hit me– not that...</p>
					</a>
				</div>
			</div>
			<?php //echo $args['after_widget'];
		}
				
		// Widget Backend 
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'Welcome!', 'blm_popular_discussions_widget_domain' );
			}
			// Widget admin form
			?>
			<p style="padding: 0 5px;">
			<!--label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Enter a title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /-->
			</p>
			<?php 
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			return $instance;
		}
	} // Class blm_popular_discussions_widget ends here

	// Register and load the widget
	function blm_popular_discussions_load_widget() {
		register_widget( 'blm_popular_discussions_widget' );
	}
	add_action( 'widgets_init', 'blm_popular_discussions_load_widget' );
/* Stop Adding Functions Below this Line */
?>
