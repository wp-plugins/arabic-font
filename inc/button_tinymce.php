<?php
//Step 1: Hook into WordPress
add_action('init', 'AF_button_tinymce');

//Step 2: Create Our Initialization Function
function AF_button_tinymce() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
   {
     add_filter('mce_external_plugins', 'add_AF_button_tinymce_plugin');
     add_filter('mce_buttons', 'register_AF_button_tinymce');
   }
}

//Step 3: Register Our Button
function register_AF_button_tinymce($buttons) {
   array_push($buttons, "arabicfont");
   return $buttons;
}

//Step 4: Register Our TinyMCE Plugin
function add_AF_button_tinymce_plugin($plugin_array) {
   $plugin_array['arabicfont'] = plugins_url('/arabic-font/js/button_tinymce.js');
   return $plugin_array;
}

//Step 5: Write the javascript TinyMCE Plugin