<?php

/**
 * Adds content to the plugin's options page
 *
 */


function WPSP_Options_Page() {
	if (isset($_POST['action']) === true) {
		$options_string = "";

		if(isset($_POST["sd_braeking_enabled"])){
			$options_string .= "get_braeking:true";
		}else{
			$options_string .= "get_braeking:0";
		}
		if(isset($_POST["sd_breaking_color"])){
			$options_string .= "~breaking_color:".$_POST["sd_breaking_color"];
		}
		if(isset($_POST["sd_automatic_enabled"])){
			$options_string .= "~get_slider:true";
		}else{
			$options_string .= "~get_slider:0";
		}

		if(isset($_POST["sd_number_enabled"])){
			$sd_post = $_POST["sd_number_enabled"];
			$options_string .= "~number_post:".$sd_post;
		}else{
			$options_string .= "~number_post:0";
		}

		if(isset($_POST["sd_posts_enabled"])){
			$sd_post = $_POST["sd_posts_enabled"];
			$options_string .= "~posts_slider:".$sd_post;
		}else{
			$options_string .= "~posts_slider:0";
		}

		if(isset($_POST["sd_id_enabled"])){
			$sd_post = $_POST["sd_id_enabled"];
			$options_string .= "~posts_id:".$sd_post;
		}else{
			$options_string .= "~posts_id:0";
		}

		if(isset($_POST["sd_category_enabled"])){
			$sd_post = $_POST["sd_category_enabled"];
			$options_string .= "~category_slider:".$sd_post;

		}else{
			$options_string .= "~category_slider:0";
		}




		update_option( "wp_slideshow_posts_options", $options_string );
	}
$sc_options = WPSP_GetOptions();

?>

<style type="text/css">
#sc_ids_box {
	border: 1px solid #DFDFDF;
	padding: 20px;
	background: #fff;
}
#sc_ids_box #plugin-header h3 {
	font-size: 18px;
	font-weight: bold;
	color: #1982d1;
}
#sc_ids_box li {
	border-bottom: 1px dotted #DFDFDF;
	margin: 0;
	padding: 20px;
}
#sc_ids_box .inside {
	margin: 0 0 0 22px;
}
#sc_ids_box li h3 {
	line-height: 1;
	padding: 0 0 10px;
	color: #1982d1;
}
#sd_category_enabled {
	width: 200px;
}
.plugin-info {
    background-color: #e0f4ff;
    border-color: #bedae9;
    color: #555555;
}
.plugin-info {
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    border-style: solid;
    border-width: 1px;
    font-size: 12px;
    line-height: 19px;
    margin: 15px auto 0;
    padding: 0 20px;
}

</style>

		<div class="wrap">
		<div id="icon-plugins" class="icon32"></div><h2>Admin Options</h2>

		<form name="sc_form" id="sc_form" action="" method="post">
		<input type="hidden" name="action" value="edit" />

		<div id="poststuff" class="ui-sortable">
		<div id="sc_ids_box" class="if-js-open">
			<div id="plugin-header">
			<h3>WP Slideshow Posts</h3>
			</div>
     		<ul>

		<li id="sd_braeking_row">
		<label for"sd_braeking" class="labels">
		<input type="checkbox" name="sd_braeking_enabled" id="sd_braeking_enabled" class="checkboxr" <?php echo ( $sc_options['get_braeking']=='true' ) ? ' checked="checked"' : '' ?>" >&nbsp;Show Small Slideshow?
		</label>
		<div class="plugin-info">
		<br />
		<h3>Use the code below to show a small slide with recent posts by category.</h3>
		<br />
		<b>1. Insert code in template place display:</b>
		<p>&lt;?Php if ( function_exists( 'wpsp_breakingnews' ) ) { 
				wpsp_breakingnews();
		 } ?&gt;</p>
		</div>
		</li>

		<li id="sd_automatic_row">
		<label for"sd_automatic" class="labels">
		<input type="checkbox" name="sd_automatic_enabled" id="sd_automatic_enabled" class="checkboxr" <?php echo ( $sc_options['get_slider']=='true' ) ? ' checked="checked"' : '' ?>" >&nbsp;Show Full Slideshow?
		</label>
		<div class="plugin-info">
		<br />
		<h3>Use one of three options to add slideshow in blog.</h3>
		<br />
		<b>1. Insert code in template place display:</b>
		<p>&lt;?Php if ( function_exists( 'wpsp_Slideshow' ) ) { 
				wpsp_Slideshow();
		 } ?&gt;</p>
		<b>2. Or insert shortcodes in template place display:</b>
		<p>&lt;?php do_shortcode( '[slideshow-wpsp]' ); ?&gt;<p>
		<b>3. Add shortcodes into the post:</b>
		<p>[slideshow-wpsp]</p>
		</div>
		</li>

		<li id="sd_braeking_row">
			<h3>Select Color Slideshow</h3>
		<select style="width:200px" name="sd_breaking_color" id="sd_breaking_color" class="regular-text">
		<?php $interval_fields = array(
				__( 'Black', 'wpsp' ) => 'black', 
				__( 'Gray', 'wpsp' ) => 'gray',
				__( 'Red', 'wpsp' ) => 'red',
				__( 'Green', 'wpsp' ) => 'green',
				__( 'Blue', 'wpsp' ) => 'blue',
				__( 'Gold', 'wpsp' ) => 'gold'
				);
		foreach ($interval_fields as $shown => $value) {
		if($sc_options['breaking_color'] == $value){ ?>

		<option value="<?php echo $value; ?>" selected="selected" ><?php echo $shown; ?></option>
		<?php }else{ ?>
		<option value="<?php echo $value; ?>" ><?php echo $shown; ?></option>
		<?php } } ?>
		</select>
		</li>

		<li id="sd_number_row">
			<h3>Number Post In Slider</h3>
		<input type="text" maxlength="125" size="5" name="sd_number_enabled" id="sd_number_enabled" value="<?php echo ( $sc_options['number_post']!='0' ) ? $sc_options['number_post'] : '' ?>">
		<span class="description">
 &nbsp;&nbsp;<small>Enter Number Post In Slider</small>.
		</span>
		</li>

		<li id="sd_posts_row">
			<h3>Display Post Slider</h3>
	 <?php $options = array(
			'1' => 'Dispaly Recent Post',
			'2' => 'Display Popular Post',
			'3' => 'Display category <small>( Use select category slider )</small>',
			'4' => 'Display Posts by ID <small>( Enter id post below )</small>',
			'5' => 'Display Pages',
			'6' => 'Display Pages by ID <small>( Enter id post below )</small>'
		);
		foreach ( $options as $key=>$option ) {
		$radio_setting = $sc_options['posts_slider'];
			if( $radio_setting != '' ){
				if ( $key == $radio_setting ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				} ?>
				<input type="radio" name="sd_posts_enabled" id="sd_posts_enabled<?php echo $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> />
<label for="sd_posts_enabled<?php echo $key; ?>"> &nbsp;&nbsp;<?php echo $option; ?></label><br />
				<?php } ?>
		<input type="text" maxlength="128" size="32" name="sd_id_enabled" id="sd_id_enabled" value="<?php echo ( $sc_options['posts_id']!='0' ) ? $sc_options['posts_id'] : '' ?>"> 
		<div class="description">
		<small>Enter id Posts or Pages separated by comma ie: 1,55,305</small> 
		</div>
		</li>

		<li id="sd_category_row">
			<h3>Select Category Slider</h3>
<?php
		$radio_setting = $sc_options['category_slider'];

$categories = get_categories( 'hide_empty=0&orderby=name' );
$wp_cats = array();
foreach ( $categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift( $wp_cats, "Choose a category" ); ?>


	<select name="sd_category_enabled" id="sd_category_enabled">
	<?php foreach ( $wp_cats as $option ) { ?>

	<option <?php if ( $radio_setting == $option ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>

	<?php } ?>
	</select>
		</li>
     		</ul>

		<div class="inside">
		<p class="submit">
		<input type="submit" name="submit" value="Save Options &raquo;" class="button-primary" />
		</p>
		</div>

		</div>
		</div>
		</form>

 		</div>

<?php } ?>
