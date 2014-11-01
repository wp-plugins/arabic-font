<?php
/* ---------------------------------------------------------
Declare options
----------------------------------------------------------- */
 
$AF_options = array (
 
array( "name" => $AF_pluginname." Options",
"type" => "title"),

/* ---------------------------------------------------------
section
----------------------------------------------------------- */
array( "name" => "Settings",
"type" => "section",
"class" => "dashicons-editor-paragraph"),
array( "type" => "open"),

array( "name" => "Font Family",
"desc" => "Choose one of your main Arabic fonts",
"id" => $shortname."_fontfamily",
"type" => "select",
"options" => array("flatjozoor" => "JF Flat Jozoor", "arajozoor" => "Ara Jozoor", "kfgqpc" => "KFGQPC Uthman Taha Naskh", "pdms" => "PDMS Saleem QuranFont", "amiriweb" => "AmiriWeb", "amiriquranweb" => "Amiri QuranWeb", "droidarabicnaskh" => "Droid Arabic Naskh", "droidarabickufi" => "Droid Arabic Kufi", "thabit" => "Thabit", "scheherazade" => "Scheherazade"),
"std" => "KFGQPC Uthman Taha Naskh"),
 
array( "name" => "Font Size",
"desc" => "Default font size",
"id" => $shortname."_fontsize",
"type" => "text",
"std" => "18"),

array( "name" => "Line Height",
"desc" => "Default line height",
"id" => $shortname."_lineheight",
"type" => "text",
"std" => "45"),

array( "name" => "Text Align",
"desc" => "Default text align",
"id" => $shortname."_textalign",
"type" => "select",
"options" => array("center" => "Center", "right" => "Right", "left" => "Left"),
"std" => "Center"),

array( "type" => "close"),
 
);