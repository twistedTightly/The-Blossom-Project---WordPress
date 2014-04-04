<?php
  /*
  Plugin Name: WP Slideshow Posts
  Description: Slideshow to display wordpress posts using image features or the first image.
  Version: 1.0
  Author: Marcio Cezar
  Author URI: http://temasphp.com/wp-slideshow-posts

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

  */

//Activate plugin slideshow picture post.
register_activation_hook( __FILE__, 'WPSP_Activate' );

function WPSP_Activate() {
		WPSP_Add_Option_Menu();
		WPSP_DefaultSettings();
}

if ( is_admin() ) {
	add_action('admin_menu', 'WPSP_Add_Option_Menu');
	add_action('admin_menu', 'WPSP_DefaultSettings');
}

//Adds the plugin's menu options page.
function WPSP_Add_Option_Menu() {
		add_submenu_page('options-general.php', 'WP Slideshow Posts', 'WP Slideshow Posts', 8, __FILE__, 'WPSP_Options_Page');
}

//Call paste css style and JavaScript.
function WPSP_scripts_basic()  { 
	$sc_options = WPSP_GetOptions();
    wp_register_script( 'jquery.easing', plugins_url( '/js/jquery.easing.1.3.js', __FILE__ ) ); 
    wp_register_script( 'jquery.cycle', plugins_url( '/js/jquery.cycle.all.js', __FILE__ ) ); 
    wp_register_script( 'control.slider', plugins_url( '/js/control.slider.js', __FILE__ ) ); 
    wp_register_script( 'control.breakingnews', plugins_url( '/js/control-breakingnews.js', __FILE__ ) ); 

    wp_register_style( 'style-slideshow', plugins_url( '/css/style-slideshow.css', __FILE__ ), array(), '0.1', 'all' );  
    wp_register_style( 'style-breaking-news', plugins_url( '/css/style-breaking-news.css', __FILE__ ), array(), '0.1', 'all' );  


if($sc_options['breaking_color'] == 'black'){
    wp_register_style( 'slideshow-color', plugins_url( '/css/slideshow-black.css', __FILE__ ), array(), '0.1', 'all' );  
} elseif($sc_options['breaking_color'] == 'gray') {
    wp_register_style( 'slideshow-color', plugins_url( '/css/slideshow-gray.css', __FILE__ ), array(), '0.1', 'all' ); 
} elseif($sc_options['breaking_color'] == 'red') {
    wp_register_style( 'slideshow-color', plugins_url( '/css/slideshow-red.css', __FILE__ ), array(), '0.1', 'all' ); 
} elseif($sc_options['breaking_color'] == 'green') {
    wp_register_style( 'slideshow-color', plugins_url( '/css/slideshow-green.css', __FILE__ ), array(), '0.1', 'all' ); 
} elseif($sc_options['breaking_color'] == 'blue') {
    wp_register_style( 'slideshow-color', plugins_url( '/css/slideshow-blue.css', __FILE__ ), array(), '0.1', 'all' ); 
} elseif($sc_options['breaking_color'] == 'gold') {
    wp_register_style( 'slideshow-color', plugins_url( '/css/slideshow-gold.css', __FILE__ ), array(), '0.1', 'all' ); 
}

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery.easing' );  
    wp_enqueue_script( 'jquery.cycle' );  
    wp_enqueue_script( 'control.slider' );  
    wp_enqueue_script( 'control.breakingnews' );  

    wp_enqueue_style( 'style-slideshow' );  
    wp_enqueue_style( 'style-breaking-news' );  
    wp_enqueue_style( 'slideshow-color' );  
}
add_action( 'wp_enqueue_scripts', 'WPSP_scripts_basic' );


//Adds settings link on the plugin administration page.
function WPSP_Add_Settings_Link($links) {
	$settings_link = '<a href="options-general.php?page=wp-slideshow-posts/wp_slideshow_posts.php">Settings</a>'; 
	array_unshift($links, $settings_link); 
	return $links;
}
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'WPSP_Add_Settings_Link' );

//Set default option plugin.
function WPSP_DefaultSettings() {
	if( !get_option('wp_slideshow_posts_options') ) {
		add_option('wp_slideshow_posts_options', 'get_braeking:true~breaking_color:black~get_slider:true~number_post:3~posts_slider:1~posts_id:0~category_slider:Choose a category');
	}
}

//Get options database.
function WPSP_GetOptions(){
	$options = array();
	$suboptions = explode("~",get_option('wp_slideshow_posts_options'));
	for($x=0; $x < count($suboptions); $x++){
		$temp = explode(":",$suboptions[$x]);
		$options[$temp[0]] = $temp[1];
	}
	return $options;
}

function wpsp_Slideshow(){
	$sc_options = WPSP_GetOptions();
	if( $sc_options['get_slider']=='true' ) {
		wp_slideshow_posts();
	}
}

function WPSP_Shortcode() {
	wp_slideshow_posts();
}
add_shortcode('slideshow-wpsp', 'WPSP_Shortcode');

require_once('wpsp_news.php');
require_once('wpsp_slideshow.php');
require_once('wpsp_options.php');

?>
