<?php 

function WPSP_breakingnews() {
	global $wpdb, $post;
	$sc_options = WPSP_GetOptions();

	 if( $sc_options['get_braeking']=='true' ) : 
		echo '<div id="ticker-wrapper">
			<h3 class="ticker-header">';
				echo "Breaking news";
			echo '</h3><div id="s7">';

		$cat_args = array(
				'orderby' => 'name',
				'order' => 'ASC'
				);

		$categories = get_categories( $cat_args );
			foreach( $categories as $category ) {

		$args = array(
				'showposts' => 1,
				'category__in' => array( $category->term_id ),
				'caller_get_posts' => 1
			);

		$posts = get_posts( $args );

	if ( $posts ) { 
		foreach( $posts as $post ) { 
		setup_postdata( $post );

		echo '<div id="entry-s7">';
		echo '<a id="ticker-cat" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>';

		echo "$category->name";
		echo '</a> &rarr; ';
		echo '<a href="' . get_permalink() . '" rel="bookmark">';
			the_title();
		echo '</a></div>';
	}
		}
}
		echo '</div>';
		echo '<div id="random-article">';

		$randomPost = $wpdb->get_var( "SELECT guid FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY rand() LIMIT 1" );

		echo '<a href="'.$randomPost.'" title="Random posts">';
		echo 'Random Post';
		echo '</a></div></div>';
	endif;
}

?>