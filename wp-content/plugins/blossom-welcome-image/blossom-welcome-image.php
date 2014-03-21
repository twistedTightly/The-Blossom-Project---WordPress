<?php
/*
Plugin Name: Blossom Welcome Image
Description: A hand drawn image by Maria Massa to welcome users to the homepage of Blossom
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
	class blm_welcome_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'blm_welcome_widget', 

				// Widget name will appear in UI
				__('Blossom Welcome Image', 'blm_welcome_widget_domain'), 

				// Widget description
				array( 'description' => __( 'A hand drawn image to welcome users to Blossom', 'blm_welcome_widget_domain' ), ) 
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
			<div id="welcome-image-wrapper" class="sidebar-widget">
				<img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/Homepage-FINAL-IMAGES/welcome_to_blossom.png" alt="Welcome to Blossom">
			</div>
			<?php //echo $args['after_widget'];
		}
				
		// Widget Backend 
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'Welcome!', 'blm_welcome_widget_domain' );
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
	} // Class blm_welcome_widget ends here

	// Register and load the widget
	function blm_welcome_load_widget() {
		register_widget( 'blm_welcome_widget' );
	}
	add_action( 'widgets_init', 'blm_welcome_load_widget' );
/* Stop Adding Functions Below this Line */
?>
