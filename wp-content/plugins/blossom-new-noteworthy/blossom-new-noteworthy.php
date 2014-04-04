<?php
/*
Plugin Name: Blossom New & Noteworthy
Description: A feed of top news stories tailored just for Blossom girls
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
	class blm_new_noteworthy_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'blm_new_noteworthy_widget', 

				// Widget name will appear in UI
				__('Blossom New & Noteworthy', 'blm_new_noteworthy_widget_domain'), 

				// Widget description
				array( 'description' => __( 'A feed of top news stories', 'blm_new_noteworthy_widget_domain' ), ) 
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
			<div id="new-noteworthy-wrapper" class="sidebar-widget">
				<div>
					<a href="" alt="Read this news story">
						<span id="news-source">New York Times  </span>
						<span id="news-title">Musical Tributes to Nelson Mandela</span>
						<p id="news-clip">The pop music world was slow to concern itself with Nelson Mandela’s long imprisonment but his name, and his movement, would...</p>
					</a>
				</div>
				<div>
					<a href="" alt="Read this news story">
						<span id="news-source">BBC Worldwide  </span>
						<span id="news-title">CAR Violence: US to fly in peacekeepers</span>
						<p id="news-clip">Defense Secretary Chuck Hagel has ordered US forces “to begin transporting forces from Burundi to the Central African...</p>
					</a>
				</div>
				<div>
					<a href="" alt="Read this news story">
						<span id="news-source">CNN  </span>
						<span id="news-title">Girl Rising: Malala’s global voice stronger than ever</span>
						<p id="news-clip">Six months ago, Malala Yousafzai was lying in a hospital bed, recovering from a Taliban attack in which she was shot point-blank...</p>
					</a>
				</div>
				<div>
					<a href="" alt="Read this news story">
						<span id="news-source">Upworthy  </span>
						<span id="news-title">Ridiculous Standards of Beauty</span>
						<p id="news-clip">There is the reason that even when I was in really great shape, wore a size 4, and was healthy, it was never good enough for me. All of my logic...</p>
					</a>
				</div>
				<div>
					<a href="" alt="Read this news story">
						<span id="news-source">Mail &amp; Guardian  </span>
						<span id="news-title">Lindiwe Sisulu remembers her uncle Madiba</span>
						<p id="news-clip">Minister of Public Service and Administration Lindiwe Sisulu is mourning Nelson Mandela, not only as South Africa’s first...</p>
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
				$title = __( 'Welcome!', 'blm_new_noteworthy_widget_domain' );
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
	} // Class blm_new_noteworthy_widget ends here

	// Register and load the widget
	function blm_new_noteworthy_load_widget() {
		register_widget( 'blm_new_noteworthy_widget' );
	}
	add_action( 'widgets_init', 'blm_new_noteworthy_load_widget' );
/* Stop Adding Functions Below this Line */
?>
