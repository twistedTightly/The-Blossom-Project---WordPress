<?php
/*
Plugin Name: Blossom Question Form
Description: A submission box for girls to write and submit questions in
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
	class blm_question_form_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'blm_question_form_widget', 

				// Widget name will appear in UI
				__('Blossom Question Form', 'blm_question_form_widget_domain'), 

				// Widget description
				array( 'description' => __( 'A submission box for girls to write and submit questions in', 'blm_question_form_widget_domain' ), ) 
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
			<div id="question-form-wrapper" class="sidebar-widget">
				<h1 class="section-header">Have a question?</h1>
					<p>If you have a question you want answered by someone on the Blossom team, submit it <strong>anonymously</strong> here!</p>
					<form action="" method="post" name="question-form">
						<label class="minor-header">My Question:</label><br><textarea id="my-question" name="my-question" spellcheck="true"></textarea>
						<input type="submit" value="Submit" />
					</form>
			</div>
			<?php //echo $args['after_widget'];
		}
				
		// Widget Backend 
		public function form( $instance ) {
			// if ( isset( $instance[ 'title' ] ) ) {
			// 	$title = $instance[ 'title' ];
			// } else {
			// 	$title = __( 'Connect!', 'blm_question_form_widget_domain' );
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
	} // Class blm_question_form_widget ends here

	// Register and load the widget
	function blm_question_form_load_widget() {
		register_widget( 'blm_question_form_widget' );
	}
	add_action( 'widgets_init', 'blm_question_form_load_widget' );
/* Stop Adding Functions Below this Line */
?>
