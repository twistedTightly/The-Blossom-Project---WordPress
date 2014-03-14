<?php
/*
Plugin Name: Blossom Instagram Feed Filler
Description: A placeholder for an instagram feed for the Blossom Girls
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
	class blm_insta_fake_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'blm_insta_fake_widget', 

				// Widget name will appear in UI
				__('Blossom Instagram Feed Filler', 'blm_insta_fake_widget_domain'), 

				// Widget description
				array( 'description' => __( 'A placeholder for an instagram feed for the Blossom Girls', 'blm_insta_fake_widget_domain' ), ) 
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
			<div id="insta-feed-wrapper" class="sidebar-widget">
				<img id="insta-feed-img" src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/Homepage-FINAL-IMAGES/instagram_graphic.png" alt="Blossom Girls Instagram Feed">
			</div>
			<?php //echo $args['after_widget'];
		}
				
		// Widget Backend 
		public function form( $instance ) {
			// if ( isset( $instance[ 'title' ] ) ) {
			// 	$title = $instance[ 'title' ];
			// } else {
			// 	$title = __( 'Connect!', 'blm_insta_fake_widget_domain' );
			// }
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
	} // Class blm_insta_fake_widget ends here

	// Register and load the widget
	function blm_insta_fake_load_widget() {
		register_widget( 'blm_insta_fake_widget' );
	}
	add_action( 'widgets_init', 'blm_insta_fake_load_widget' );
/* Stop Adding Functions Below this Line */
?>
