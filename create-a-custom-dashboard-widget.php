<?php

/* Start Adding Functions Below this Line *//**
 * Plugin Name:       create a custom dashboard widget
 * Description:       this plugin will help you to create your custom dashboard widget.
 * Version:           1.0.0
 * Requires at least: 3.0.1
 * Requires PHP:      7.2
 * Author:            amin agha kazemi
 * Author URI:        https://aminakazemi.info/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       create-a-custom-dashboard-widget
 * Domain Path:       /languages
 */

function cacdw_register_settings() {
   add_option( 'cacdw_main_option', 'This is my option value.');
   register_setting( 'cacdw_options_group', 'cacdw_main_option', 'cacdw_callback' );
}
add_action( 'admin_init', 'cacdw_register_settings' );

function cacdw_register_options_page() {
  add_options_page('Page Title', 'Custom dashboard widget', 'manage_options', 'cacdw_plugin', 'cacdw_options_page');
}
add_action('admin_menu', 'cacdw_register_options_page');

function cacdw_options_page()
{
?>



  <!-- css style -->
  <style>
	h2 {color:#00b8a9; text-align: center;}
	textarea {width: 100%;}
	hr {margin-right: 20px;}
	#mainpart {
		background-color: e3fdfd;
		margin-right: 35px;
		margin-left: 15px;
		margin-top: 25px;
		padding: 50px;
		border-radius: 15px;
		border: 1px solid;
	}
	#preview {
		background-color: #fff;
		width: 50%;
		padding: 25px;
		border-radius: 8px;
		box-shadow: 0px 0px 5px 3px #888888;
	}
  </style>



  <!-- setting page -->
  <h2>Create a custom dashboard widget</h2>
  <hr />
  <div id="mainpart">
	<form method="post" action="options.php">
	<?php settings_fields( 'cacdw_options_group' ); ?>
	<h4>write your custom html or text below and click "save changes". then, your widget will appear on your dashboard page. dont forget to use <b>&lt;br/&gt;</b> tag.</h4>
	<textarea rows="10" cols="45" id="cacdw_main_option" name="cacdw_main_option"><?php echo get_option('cacdw_main_option'); ?></textarea>
	</br>
	</br>
	<h4>preview:</h4>
	<div id="preview">
		<?php echo get_option('cacdw_main_option'); ?>
	</div>
	</br>
	<?php  submit_button(); ?>
	</form>
  </div>
<?php
}



add_action('wp_dashboard_setup', 'cacdw_my_custom_dashboard_widgets');
 
function cacdw_my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Custom dashboard widget', 'cacdw_custom_dashboard_help');
}
 
function cacdw_custom_dashboard_help() {
echo get_option('cacdw_main_option');
}  
/* Stop Adding Functions Below this Line */
?>