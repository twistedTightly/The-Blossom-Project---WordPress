<?php
/*
Plugin Name: Blossom Shop the Shirt Ad
Description: A fun link to the shop page to promote Blossom apparel
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
	class blm_shop_link_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'blm_shop_link_widget', 

				// Widget name will appear in UI
				__('Blossom Shop Link', 'blm_shop_link_widget_domain'), 

				// Widget description
				array( 'description' => __( 'A fun link to the shop page to promote Blossom apparel', 'blm_shop_link_widget_domain' ), ) 
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
			<div id="shop-link-wrapper" class="sidebar-widget">
				<a href="<?php echo home_url(); ?>/shop/" alt="Shop the Shirt!">
					<img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/Homepage-FINAL-IMAGES/shop_the_tshirt.jpg" alt="Shop the Shirt!">
				</a>
			</div>
			<?php //echo $args['after_widget'];
		}
				
		// Widget Backend 
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'Welcome!', 'blm_shop_link_widget_domain' );
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
	} // Class blm_shop_link_widget ends here

	// Register and load the widget
	function blm_shop_link_load_widget() {
		register_widget( 'blm_shop_link_widget' );
	}
	add_action( 'widgets_init', 'blm_shop_link_load_widget' );
/* Stop Adding Functions Below this Line */
?>
