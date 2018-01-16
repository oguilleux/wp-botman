<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


function bm_get_template_part( $slug, $name = null, $load = true, $template_vars ) {
	// Execute code for this part
	do_action( 'get_template_part_' . $slug, $slug, $name );
 
	// Setup possible parts
	$templates = array();
	if ( isset( $name ) )
		$templates[] = $slug . '-' . $name . '.php';
	$templates[] = $slug . '.php';
 
	// Allow template parts to be filtered
	$templates = apply_filters( 'bm_get_template_part', $templates, $slug, $name );
 
	// Return the part that is found
	bm_locate_template( $templates, $load, false, $template_vars );
}


function bm_locate_template( $template_names, $load = false, $require_once = true, $template_vars ) {
	// No file found yet
	$located = false;

	// Try to find a template file
	foreach ( (array) $template_names as $template_name ) {

		// Continue if template is empty
		if ( empty( $template_name ) )
			continue;

		// Trim off any slashes from the template name
		$template_name = ltrim( $template_name, '/' );

		// Check child theme first
		if ( file_exists( trailingslashit( bm_get_templates_dir() ) . $template_name ) ) {
			$located = trailingslashit( bm_get_templates_dir() ) . $template_name;
			break;
		}
	}
	
	if ( ( true == $load ) && ! empty( $located ) ) {
		bm_load_template( $located, $require_once, $template_vars );
	}

	return $located;
}


function bm_load_template( $_template_file, $require_once = true, $template_vars = array() ) {
	
	global $authordata, $user_ID;
	
	apply_filters( 'myc_load_template_params', $template_vars ); // in case you want to add your own global variables or common data
		
	if ( $template_vars ) {
		extract( $template_vars );
	}
		
	if ( $require_once )
		require_once( $_template_file );
	else
		require( $_template_file );
}


function bm_get_templates_dir() {
	return WPBOTMAN_PLUGIN_INCLUDE_DIR . '/templates/';
}
?>