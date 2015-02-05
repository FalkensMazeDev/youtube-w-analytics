<?php

/*
Plugin Name: YouTube with Universal Analytics Tracking
Plugin URI: http://www.wp-411.com
Description: Embeds a YouTube video and implements event tracking for Google's Universal Analytics.
Author: Greg Whitehead
Version: 1.1
Author URI: http://www.gregwhitehead.us/

*/


$plugin_directory 	= "youtube-w-analytics"; 	//For use in definitions
$plugin_prefix		= "YWA";			//For use in definitions names

define( $plugin_prefix.'_URL',plugins_url($plugin_directory) . "/");
define( $plugin_prefix.'_PATH', plugin_dir_path( __FILE__) ); 

include("class/class.youtube-w-analytics.php");

if (class_exists('youtube_w_analytics')) {

	$youtube_w_analytics = new youtube_w_analytics();	

	// register_activation_hook(__FILE__, array('youtube_w_analytics','activate'));
	// register_deactivation_hook(__FILE__,array('youtube_w_analytics','deactivate'));

}
