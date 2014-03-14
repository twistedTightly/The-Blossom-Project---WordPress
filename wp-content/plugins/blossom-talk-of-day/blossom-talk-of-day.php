<?php
/*
Plugin Name: Blossom Talk of the Day
Description: A cute question and answer widget that links girls to the full answer
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
	class blm_talk_of_day_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'blm_talk_of_day_widget', 

				// Widget name will appear in UI
				__('Blossom Talk of the Day', 'blm_talk_of_day_widget_domain'), 

				// Widget description
				array( 'description' => __( 'A cute question and answer widget', 'blm_talk_of_day_widget_domain' ), ) 
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
			<div id="talk-of-day-wrapper" class="sidebar-widget">
				<h1 class="title">Talk of the Day</h1>
				<h1>The Question</h1>
				<p>I’m dating my best friend and I just realized I’m not in love with him the way he is with me. Do I have to break up with him? Help!</p>
				<h1>The Answer</h1>
				<a class="section-header" href="">Read &amp; Comment</a>
			</div>
			<?php //echo $args['after_widget'];
		}
				
		// Widget Backend 
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'Welcome!', 'blm_talk_of_day_widget_domain' );
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
	} // Class blm_talk_of_day_widget ends here

	// Register and load the widget
	function blm_talk_of_day_load_widget() {
		register_widget( 'blm_talk_of_day_widget' );
	}
	add_action( 'widgets_init', 'blm_talk_of_day_load_widget' );
/* Stop Adding Functions Below this Line */
?>
