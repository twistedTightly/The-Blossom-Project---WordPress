<?php

function wp_slideshow_posts() {
		$sc_options = WPSP_GetOptions();

		echo'<div class="ss1_wrapper">
			<div class="ss1_entry">
			<a href="#" class="slideshow_prev"><span>Previous</span></a>
			<a href="#" class="slideshow_next"><span>Next</span></a>

		<div class="slideshow_paging"></div>
			
		<div class="slideshow_wrapper">
		<div class="slideshow_box">
		<div class="data"></div>
		</div>
		</div>
			
		<div id="slideshow_1" class="slideshow">';

		if( $sc_options['posts_slider']=='1' ) :

		$my_query = new WP_Query( 'posts_per_page='.$sc_options['number_post'].'' );

	elseif ( $sc_options['posts_slider']=='2' ) :

		$my_query = new WP_Query( 'orderby=comment_count&posts_per_page='.$sc_options['number_post'].'' );

	elseif ( $sc_options['posts_slider']=='3' ) :

		$my_query = new WP_Query( 'category_name='.$sc_options['category_slider'].'&posts_per_page='.$sc_options['number_post'].'' );

	elseif ( $sc_options['posts_slider']=='4' ) :

		$args = array();
		$str = explode(',', $sc_options['posts_id']);
		$args = $str;
		$my_query = new WP_Query( array( 'post_type' => 'post', 'post__in' => $str ) );

	elseif ( $sc_options['posts_slider']=='5' ) :

		$my_query = new WP_Query( 'post_type=page&posts_per_page='.$sc_options['number_post'].'' );

	elseif ( $sc_options['posts_slider']=='6' ) :

		$args = array();
		$str = explode(',', $sc_options['posts_id']);
		$args = $str;
		$my_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $str ) );

	endif;

	while ( $my_query->have_posts() ) : $my_query->the_post();

		echo'<div class="slideshow_item">'; 

	if ( has_post_thumbnail() ) {

		$matches = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

	$image_img_tag = $matches[0];

	} else {

		global $post;

		preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

		$image_img_tag = $matches[1][0];
	}

		echo '<img src="'.$image_img_tag.'" />

		<div class="data">

		<h4><a href="'.get_permalink().'">';

	the_title();

		echo'</a></h4>';

	the_excerpt();

		echo'</div></div>';

	endwhile;

		echo'</div></div></div>';

}

?>