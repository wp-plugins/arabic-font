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
//add_action('admin_head', 'AF_admin_script');