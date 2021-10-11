<?php
/*
Plugin Name: JS Console Debugger
Description: Output any PHP expression to browser JS console!
Author: Andrei Sirant
Version: 1.0.0
Author URI: https://github.com/An147
Text Domain: jsdebug
*/

$js_console_debug_strings = [];

if(!function_exists('debugToJsConsole')){
	function debugToJsConsole($var){
	  global $js_console_debug_strings;
	  $scriptDebug = '<script defer> console.log('.json_encode($var, JSON_HEX_TAG).');</script>';
	  $js_console_debug_strings []= $scriptDebug;
	}
}

if(!function_exists('jsConsoleDebugOutput')){
	function jsConsoleDebugOutput(){
	  global $js_console_debug_strings;
	  foreach ($js_console_debug_strings as $key => $js_output_string) {
	    echo $js_output_string;
	  }
	}

	add_action('wp_footer', 'jsConsoleDebugOutput');
}


