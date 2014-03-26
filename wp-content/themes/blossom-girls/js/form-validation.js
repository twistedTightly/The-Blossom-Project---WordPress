/*
Theme Name: BlossomGirls
Theme URI: http://themeBlossomGirlsr.com/
Author: Maribeth Rauh
Author URI: http://www.maribethrauh.com/
Description: The Blossom Girls theme was designed by Maria Massa for her senior thesis project and is based on Underscores and the original BlossomGirls Theme by Ian Stewart.
Version: 2.0
License: GNU General Public License
License URI: license.txt
Tags: light, white, one-column, two-columns, left-sidebar, right-sidebar, flexible-width, custom-backgroud, custom-header, custom-menu, featured-images, flexible-header, microformats, post-formats, rtl-language-support, threaded-comments, translation-ready
This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.
*/


function validateForm()
{
	/* Validating name field */
	var x=document.forms["myForm"]["name"].value;
	if (x==null || x=="")
	{
		alert("Name must be filled out");
		return false;
	}
	/* Validating email field */
	var x=document.forms["myForm"]["email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
		alert("Not a valid e-mail address");
		return false;
	}
}