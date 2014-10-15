<?php
/*
Plugin Name: Arabic Font
Plugin URI: http://www.kloningspoon.com/arabic-font/
Description: Easy implement Arabic font for writing in WordPress.
Author: Darto KLoning
Version: 1.0
Author URI: http://www.kloningspoon.com/

Copyright 2014  Darto KLoning (email: darto@kloningspoon.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA 
*/

include('inc/init.php');
include('inc/option.php');
include('inc/panel.php');
include('inc/button_tinymce.php');

// register the style
function AF_style() {
wp_register_style('arabic-font-css', plugins_url('/css/arabic-fonts.css', __FILE__),'',null);

wp_enqueue_style('arabic-font-css');
}
add_action('wp_enqueue_scripts','AF_style');

function arabic_font_function($atts, $content = null) {
    extract(shortcode_atts(array(
        "font_family" => "" /*get_option('AF_fontfamily')*/,
		"font_size" => "" /*get_option('AF_fontsize')*/,
		"line_height" => "" /*get_option('AF_lineheight')*/,
		"text_align" => "" /*get_option('AF_textalign')*/,
		"span" => "" /*get_option('AF_span')*/
    ), $atts));
	
	if (!$font_family) {$font_family = get_option('AF_fontfamily');}
	if (!$font_size) {$font_size = get_option('AF_fontsize');}
	if (!$line_height) {$line_height = get_option('AF_lineheight');}
	if (!$text_align) {$text_align = get_option('AF_textalign');}
	if ($span == "yes") {$arabic_font = '<span style="font-family:'.$font_family.'; font-size:'.$font_size.'px; direction: rtl; line-height: '.$line_height.'px;">'.$content.'</span>';} 
	else {$arabic_font = '<div style="font-family:'.$font_family.'; font-size:'.$font_size.'px; direction: rtl; text-align: '.$text_align.'; line-height: '.$line_height.'px;">'.$content.'</div>';}
	
    return $arabic_font;
}

add_shortcode("arabic-font", "arabic_font_function");