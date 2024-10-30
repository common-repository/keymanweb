=== Plugin Name ===
Contributors: shankarkrupa
Donate link: 
Tags: keyboard input, custom, language, tamil
Requires at least: 2.1
Tested up to: 2.1
Stable tag: trunk

Enable custom keyboard input methodology in various input fields using your free Tavultesoft KeymanWeb Subscription

== Description ==

<p>
  This plugin integrates a KeymanWeb Subscription into the admin pages of your blog, so you can blog in your language from anywhere!  If you have not already done so,
  you will need to <a href='http://www.tavultesoft.com/account/home/kmw/' target='_blank'>sign up for a free subscription</a>.  In the subscription sign up, you can
  choose the languages you want to type in and the user interface design for KeymanWeb.  We recommend the Button user interface!  Any of the other designs should also
  work, except for the Toolbar interface, which will be available in a future update.
</p>
  
<p>
  The last page of the KeymanWeb Subscription sign up process is a "Get HTML" page.  The KeymanWeb Header Code field below should be copied from this page.  <b>Note:</b> 
  We recommend leaving the KeymanWeb Control Code field blank, as this plug-in will enhance the default control for nicer WordPress integration.
</p>

Please let me know if you have any issues in getting this work with your version of wordpress. I can be reached through shankarkrupa at yahoo dot com

<a href='http://www.krupashankar.com/plugins/keymanweb' target='_blank'>About this Plug-in</a> &nbsp; 
  <a href='http://www.tavultesoft.com/account/home/kmw/' target='_blank'>Manage Your KeymanWeb Subscription</a> &nbsp; 
  <a href='http://www.tavultesoft.com/' target='_blank'>Tavultesoft Home</a> &nbsp; 
  <a href='http://www.tavultesoft.com/keyman/downloads/keyboards/' target='_blank'>Tavultesoft Keyboard Downloads for Windows</a>

== Installation ==

1) Upload the file keymanweb.php to /wp-content/plugins directory. This directory will generally be inside the directory where you have installed wordpress
2) Login to the wordpress Admin and choose the Plugins link
3) You will see a plugin called KeymanWeb listed in the plugins list. Click the Activate link in the Action column of the same row.
4) That is it, now you will see a small book-like icon at the top (near the dashboard menu). Hover near that and you will find the name of your keyboard. Click on your keyboard name and start typing in your language. If you want to switch to English (or your default keyboard layout), choose the English menu option by hovering over the icon.

Advanced Installation Instructions
1) The plugin can be configured to include your custom keymanweb code. To do this, get your code from Tavultesoft from the Get HTML page.
2) Go to the Options menu in Wordpress. You will see a link "KeymanWeb" as one of the configuration options. Click that.
3) You will find two textboxes. Pase the first section of code from the Get HTML code page into the Header Code textbox. Paste the second section code into the second textbox.
4) If you want to customize the location of the icon, that can be done as well. Just edit the div tag code pasted in the second textbox.

== Frequently Asked Questions ==

= Does this plugin support my language =

This plugin supports over 600 languages since this uses Tavultesoft KeymanWeb. Please check <a href="http://www.tavultesoft.com/keymanweb/languagelist.php">Supporrted Languages</a> page for more information.

== Screenshots ==

1. KeymanWeb menu expanded, with the icon placed near the Dashboard. Some sample code entered in the KeymanWeb configuration screen also.

== Changelog ==

= 0.1 =
* New release

= 0.2 =
* Included "php" near the delimeters
* Added more options to control the visibility across various input fields

== Upgrade Notice ==
* Please follow the steps mentioned in the Installation section.