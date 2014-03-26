/* Developed by: Maribeth Rauh
	Using jQuery UI for the Blossom theme

	v1.0, as of 3.25.2014

*/

jQuery(document).ready(function($) {
	var icons = {
		header: "ui-icon-circle-arrow-e",
		activeHeader: "ui-icon-circle-arrow-s"
	};

	$( "#accordion" ).accordion({
		collapsible: true,
		icons: icons,
		heightStyle: "content"
	});

	/*$( "#toggle" ).button().click(function() {
		if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
			$( "#accordion" ).accordion( "option", "icons", null );
		} else {
			$( "#accordion" ).accordion( "option", "icons", icons );
		}
	});*/
		
});