<?php
/*
Plugin Name: Blossom Apply to Be a Blogger Ad Small
Description: A link to invite girls to apply to blog for Blossom for the smaller sidebar
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
	class blm_blogger_apply_sm_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'blm_blogger_apply_sm_widget', 

				// Widget name will appear in UI
				__('Blossom Apply to Be a Guest Blogger Ad Small', 'blm_blogger_apply_sm_widget_domain'), 

				// Widget description
				array( 'description' => __( 'A link to invite girls to apply to blog for Blossom', 'blm_blogger_apply_sm_widget_domain' ), ) 
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
			<div id="blogger-apply-wrapper" class="sidebar-widget">
				<a href="<?php echo home_url() ?>/coming-soon/" alt="Apply to blog for Blossom here">
					<img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/Blog-FINAL-IMAGES/guest_blogger_sidebar.jpg" alt="Apply to be a guest blogger!">
				</a>
			</div>
			<?php //echo $args['after_widget'];
		}
				
		// Widget Backend 
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'Welcome!', 'blm_blogger_apply_sm_widget_domain' );
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
	} // Class blm_blogger_apply_sm_widget ends here

	// Register and load the widget
	function blm_blogger_apply_sm_load_widget() {
		register_widget( 'blm_blogger_apply_sm_widget' );
	}
	add_action( 'widgets_init', 'blm_blogger_apply_sm_load_widget' );
/* Stop Adding Functions Below this Line */
?>
