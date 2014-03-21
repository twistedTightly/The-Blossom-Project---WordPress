<?php
/*
Plugin Name: Blossom Gettin' Connected
Description: An advertisement to link users to the Get Connected page
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
	class blm_gettin_con_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'blm_gettin_con_widget', 

				// Widget name will appear in UI
				__('Blossom Gettin\' Connected Link', 'blm_gettin_con_widget_domain'), 

				// Widget description
				array( 'description' => __( 'An advertisement to link users to the Get Connected page', 'blm_gettin_con_widget_domain' ), ) 
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
			<div id="gettin-connected-wrapper" class="sidebar-widget">
				<a href="<?php echo home_url(); ?>/connect/" alt="Connect!">
					<h1 class="box-title">Gettin' Connected</h1>
					<p id="getting-connected-text">
						Connect With Another Blossom Girl Across The World!
					</p>
					<img id="gettin-connected-img" src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/Homepage-FINAL-IMAGES/gettin_connected.jpg" alt="Get Connected!">
				</a>
			</div>
			<?php //echo $args['after_widget'];
		}
				
		// Widget Backend 
		public function form( $instance ) {
			// if ( isset( $instance[ 'title' ] ) ) {
			// 	$title = $instance[ 'title' ];
			// } else {
			// 	$title = __( 'Connect!', 'blm_gettin_con_widget_domain' );
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
	} // Class blm_gettin_con_widget ends here

	// Register and load the widget
	function blm_gettin_con_load_widget() {
		register_widget( 'blm_gettin_con_widget' );
	}
	add_action( 'widgets_init', 'blm_gettin_con_load_widget' );
/* Stop Adding Functions Below this Line */
?>
