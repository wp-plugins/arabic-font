<?php

/* ----------------------------------------------------------
Declare vars
------------------------------------------------------------- */
$AF_pluginname = "Arabic Fonts";
$shortname = "AF";

/*---------------------------------------------------
register settings
----------------------------------------------------*/
function AF_settings_init(){
register_setting( 'AF_settings', 'AF_settings' );
wp_enqueue_style("AF_panel_style", plugins_url("arabic-font/css/panel.css"), false, "1.0", "all");
}

/*---------------------------------------------------
add settings page to menu
----------------------------------------------------*/
function AF_add_settings_page() {
add_menu_page('Arabic Fonts', 'Arabic Font', 'administrator', __FILE__, 'AF_settings_page','dashicons-editor-textcolor', 100);
}

function AF_check_clean_installation(){
	add_action( 'admin_notices', 'AF_reminder' );
}

if ( ! function_exists( 'AF_reminder' ) ){
	function AF_reminder(){
		global $shortname, $AF_pluginname, $current_screen;

		if ( false === et_get_option( $shortname . '_fontfamily' ) && 'appearance_page_core_functions' != $current_screen->id ){
			printf( __('<div class="updated"><p>This is a fresh installation of %1$s. Don\'t forget to go to <a href="%2$s">Arabic Font</a> to set it up. This message will disappear once you have clicked the Save button within the <a href="%2$s">plugin\'s options page</a>.</p></div>',$AF_pluginname), admin_url( 'admin.php?page=arabic-font/inc/init.php' ) );
		}
	}
}
/*
function AF_admin_script() {
echo '';
}
*/

/*---------------------------------------------------
add actions
----------------------------------------------------*/
add_action( 'admin_init', 'AF_settings_init' );
add_action( 'admin_menu', 'AF_add_settings_page' );
add_action( 'admin_init', 'AF_check_clean_installation' );
//add_action('admin_head', 'AF_admin_script');