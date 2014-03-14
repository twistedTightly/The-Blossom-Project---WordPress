<?php
/*
Plugin Name: Blossom's The Tough Topics
Description: An extensive content-centric widget with a number of links to inform young girls about relevant tough topics
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
	class blm_tough_topics_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'blm_tough_topics_widget', 

				// Widget name will appear in UI
				__('Blossom\'s Tough Topics Column', 'blm_tough_topics_widget_domain'), 

				// Widget description
				array( 'description' => __( 'A number of links to inform young girls about relevant tough topics', 'blm_tough_topics_widget_domain' ), ) 
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
			<div id="tough-topics-wrapper" class="sidebar-widget">
				<h1 class="tough-topics-header section-header">The Tough Topics</h1>
				<p id="tough-topics-intro">Its always best to talk about the tough things we go through as young girls with our parents, but sometimes its just too awkward, or we don’t get all the answers we need, in which case its Blossom to the rescue! We’re doing our best to get all the information you might need to grow up happy and healthy in one place, and adding more every day! So click through the topics below, get informed, and remember we’re all in this together!</p>
				<h2 class="section-header">Talking Sex</h2>
				<p class="tough-topic-content">Where do we even start? There are so many questions we have about sex and everything involved with it and its so hard to get straight answers about all of it. Here, we’ll talk about everything you need to know to make informed decisions regarding sex including the basics of sex, sexually transmitted diseases, birth control, and sexual abuse.</p>
				<h2 class="section-header">Bodily Health</h2>
				<p class="tough-topic-content">Especially during adolescence, our bodies go through a lot of changes that we may not be ready for. In this section we’ll go through all the changes we face as we become women during puberty, as well as basic information about maintaining a healthy lifestye.</p>
				<h2 class="section-header">Mental Health</h2>
				<p class="tough-topic-content">With our bodies and our lives constantly changing during adolescence, its often hard to maintain focus and a positive outlook, among other things. In this section we go over ways to cope with all these changes, information about common psychological disorders seen in young girls, and people who can help.</p>
				<h2 class="section-header">Getting Help</h2>
				<p class="tough-topic-content">While we’re giving you all the information we can regarding these topics, some questions and problems are too big for Blossom. If you’ve found that you’re questions aren’t being answered here, you are depressed or have had suicidal thoughts or actions, or just really need to talk out your issues with someone, we can help direct you where you need to go. There are plenty of hotlines, groups, organizations, and programs out there to help.</p>
			</div>
			<?php //echo $args['after_widget'];
		}
				
		// Widget Backend 
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'Welcome!', 'blm_tough_topics_widget_domain' );
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
	} // Class blm_tough_topics_widget ends here

	// Register and load the widget
	function blm_tough_topics_load_widget() {
		register_widget( 'blm_tough_topics_widget' );
	}
	add_action( 'widgets_init', 'blm_tough_topics_load_widget' );
/* Stop Adding Functions Below this Line */
?>
