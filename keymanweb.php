<?php
/*
Plugin Name: KeymanWeb
Plugin URI: http://www.krupashankar.com/plugins/keymanweb
Description: Enable custom keyboard input methodology in various input fields using your free Tavultesoft KeymanWeb Subscription
Version: 0.2
Author: S Krupa Shankar
Author URI: http://blog.krupashankar.com/pullivalai/Default.aspx
*/

/******************
Admin Functionalities
**********************/

function keymanweb_hookmenu()
{
	add_options_page("KeymanWeb","KeymanWeb",1,basename(__FILE__),"keymanweb_displayconfig");
}

add_action("admin_menu","keymanweb_hookmenu");

/*************
Show Edit Form containing the settings options...
*************/

function keymanweb_displayconfig()
{
	if(isset($_POST["txtKeymanWebSaved"]))
	{
		update_option("keymanwebheader", $_POST["txtKeymanWebHeaderCode"]);
		update_option("keymanwebdashboard", $_POST["checkKeymanWebDashboard"] == 'on' ? "" : "disabled");
		update_option("keymanwebcomments", $_POST["checkKeymanWebComments"] == 'on' ? "" : "disabled");
		echo "<script>alert('Keyman config saved. Please reload any admin page for this change to take effect.')</script>";
	}
	
	$KeymanWebHeader = stripslashes(get_option("keymanwebheader"));
	$KeymanWebDashboard = get_option("keymanwebdashboard") == 'disabled' ? '' : "checked='checked' ";
	$KeymanWebComments = get_option("keymanwebcomments") == 'disabled' ? '' : "checked='checked' ";
	
	echo <<<END
<form method='post'>
<input type='hidden' name='txtKeymanWebSaved' value='saved' />
<h2>KeymanWeb Settings</h2>

<table border="0" style='margin-left: 24px'>
<tr>
	<td><label for='txtKeymanWebHeaderCode' style='font-weight:bold'>KeymanWeb Header Code</label><br />
	<textarea name='txtKeymanWebHeaderCode' rows="6" cols="70" id='txtKeymanWebHeaderCode'>$KeymanWebHeader</textarea></td>
</tr>
<tr>
	<td><input type='checkbox' name='checkKeymanWebDashboard' id='checkKeymanWebDashboard' $KeymanWebDashboard/> <label for='checkKeymanWebDashboard' style='font-weight:bold'>Enable KeymanWeb in Dashboard</label></td>
</tr>
<tr>
	<td><input type='checkbox' name='checkKeymanWebComments' id='checkKeymanWebComments' $KeymanWebComments/> <label for='checkKeymanWebComments' style='font-weight:bold'>Enable KeymanWeb in Comments and Search</label></td>
</tr>
<tr>
	<td><p class="submit"><input type='submit' value='Save' id='keymanweb_save' /></p></td>
</tr>
</table>

<strong>Help</strong>
<p style='margin-right: 20px; font-size: 8pt'>
  For suggestions/issue reports about this plugin: shankarkrupa at yahoo.com or suppport at tavultesoft.com
</p>

<p style='margin-right: 20px'>
  This plugin integrates a KeymanWeb Subscription into the admin pages of your blog, so you can blog in your language from anywhere!  If you have not already done so,
  you will need to <a href='http://www.tavultesoft.com/account/home/kmw/' target='_blank'>sign up for a free subscription</a>.  In the subscription sign up, you can
  choose the languages you want to type in and the user interface design for KeymanWeb.  <b>We recommend the Button user interface!</b>  Any of the other designs should also
  work, except for the Toolbar interface, which will be available in a future update.
</p>
  
<p style='margin-right: 20px'>
  The last page of the KeymanWeb Subscription sign up process is a "Get HTML" page.  The KeymanWeb Header Code field below should be copied from this page.  <b>Note:</b> 
  This plugin integrates as a widget for comments and search and has been tested with the WordPress Default 1.6 and WordPress Classic 1.5 themes.
</p>

<a href='http://www.krupashankar.com/plugins/keymanweb' target='_blank'>About this Plug-in</a> &nbsp; 
  <a href='http://www.tavultesoft.com/account/home/kmw/' target='_blank'>Manage Your KeymanWeb Subscription</a> &nbsp; 
  <a href='http://www.tavultesoft.com/' target='_blank'>Tavultesoft Home</a> &nbsp; 
  <a href='http://www.tavultesoft.com/keyman/downloads/keyboards/' target='_blank'>Tavultesoft Keyboard Downloads for Windows</a>
</form>
END;
}

/***************
Menus Functionalities
***************/

if(get_option("keymanwebdashboard") != "disabled")
{
	// KeymanWeb in Administration
	add_action ( 'admin_head', 'keymanweb_insertkeymanheader');
	add_action ( 'admin_footer', 'keymanweb_insertkeymanmenus');
}

if(get_option("keymanwebcomments") != "disabled")
{
	// KeymanWeb in user view
	add_action ( 'get_header', 'keymanweb_insertkeymanheader_user');
	add_action ( 'plugins_loaded', 'keymanweb_insertwidget_user');
	add_action ( 'wp_footer', 'keymanweb_insertkeymanmenus_user');
}

/*******************
keyman header
*******************/

function keymanweb_insertkeymanheader_user()
{
$keymanwebheader = get_option("keymanwebheader");
if($keymanwebheader && $keymanwebheader!= "") 
  echo stripslashes($keymanwebheader);
}

function keymanweb_insertkeymanheader()
{
$keymanwebheader = get_option("keymanwebheader");
if($keymanwebheader && $keymanwebheader!= "") 
  echo stripslashes($keymanwebheader);
else
  echo <<<END
<div id='keymanweb-message' class='updated fade'>The KeymanWeb plug-in has not been configured.  <a href='options-general.php?page=keymanweb.php'>Configure now</a></div>
END;
} //func: keyman header


/*******************
keymanweb icon
*******************/

$KeymanWeb_inserted = false;

function keymanweb_menu_template($user)
{
  global $KeymanWeb_inserted;
  if($user)
  {
	if($KeymanWeb_inserted) return;

    $style = "elem.style.width = '22px'; elem.style.position = 'absolute'; elem.style.top='0px'; elem.style.left='160px';"; 
	$parent = "document.getElementById('commentform') || document.getElementById('searchform') || document.getElementById('sidebar')";
	$before = 'true';
  }
  else
  {
    $style = "elem.style.cssFloat = elem.style.styleFloat = 'right'; elem.style.marginTop = '12px';";
	$parent = "document.getElementById('wphead-info')";
	$before = 'false';
  }

  echo <<<END
<style type='text/css'>

#KeymanWebControl ul li#kmwico_li {
  margin: 1px 0 0 0 !important;
}

#KeymanWeb_KbdList li { text-align: left; }

#KeymanWebControl ul ul li {
  margin: 0 !important;
}

#KeymanWebControl ul {
  margin: 0 !important;
  padding: 0 !important;
}

#kmwico_a {
background: url('http://r.testsite.tavultesoft.local/kmw/kmw_button_wide.gif') no-repeat;
width: 100px;
}
</style>

<script type='text/javascript'>
  (function() {
	var elem = document.createElement('div');
	elem.id = 'KeymanWebControl';
	$style
	var parent = $parent;
	if(parent)
	{
		if($before && parent.firstChild) parent.insertBefore(elem, parent.firstChild);
		else parent.appendChild(elem);
	}
	else
	{
		document.write("<div id='KeymanWebControl' style='width: 40px; height: 25px; position: fixed;left: 300px;top: 1px; z-index:100000'></div>");
	}
	
	
  })();
</script>
END;
}

function keymanweb_insertkeymanmenus_user()
{
	$keymanwebheader = get_option("keymanwebheader");
	if($keymanwebheader && $keymanwebheader!= "") 
	{
		keymanweb_menu_template(true);
	}
}

function keymanweb_insertwidget_user()
{
	$keymanwebheader = get_option("keymanwebheader");
	if($keymanwebheader && $keymanwebheader!= "") 
	{
		if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
			return; 
		
		function widget_keymanweb($args) {
			// $args is an array of strings which help your widget
			// conform to the active theme: before_widget, before_title,
			// after_widget, and after_title are the array keys.
			global $KeymanWeb_inserted;
			if($KeymanWeb_inserted) return;
			$KeymanWeb_inserted = true;
			extract($args);
			
			// We'll use a custom button for the widget -- override the CSS from KeymanWeb :)
			
			echo <<<END
<style type='text/css'>
#KeymanWebControl #kmwico_a {
	background: url('http://r.keymanweb.com/kmw/kmw_button_wide.gif') no-repeat !important;
	width: 100px !important;
}
 
#KeymanWebControl #kmwico_li { padding:0 !important; position: relative; left: 0; top: 0; }
#KeymanWebControl #kmwico li:hover ul, #kmwico li.sfhover ul {
    left: auto !important;
    right: 0 !important;
}
</style>
$before_widget
$before_title$after_title
<div id='KeymanWebControl' style='width: 100px; height: 23px; padding: 12px 0 0 0;'></div>
$after_widget
END;
		}

		register_sidebar_widget('KeymanWeb', 'widget_keymanweb');
	} 
}

function keymanweb_insertkeymanmenus()
{
	keymanweb_menu_template(false);
} 

?>
