<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;



function bm_load_scripts() {

	$js_dir = WPBOTMAN_PLUGIN_JS_DIR;

	// Use minified libraries if SCRIPT_DEBUG is turned off
	$suffix = ''; //( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_register_script( 'bm-script', $js_dir . 'frontend' . $suffix . '.js', array( 'jquery' ), 0.5 );
	wp_enqueue_script( 'bm-script' );

    $base_url=get_option('bm_url_hid');//Get the input url

        wp_localize_script( 'bm-script', 'bm_script_vars', apply_filters( 'bm_script_vars', array(
			'messaging_platform' => apply_filters( 'myc_script_messaging_platform','default' ),
			'base_url' => $base_url,
			'messages' => array(
					'internal_error' => __( 'An internal error occured', 'chatbot' ),
					'input_unknown' => __( 'I\'m sorry I do not understand.', 'chatbot' )
			),
			'show_time' => apply_filters( 'myc_script_show_time', false ),
			'show_loading' => apply_filters( 'myc_script_show_loading',false),
	) ) );

}
add_action( 'wp_enqueue_scripts', 'bm_load_scripts' );



function bm_register_styles() {

	$css_dir = WPBOTMAN_PLUGIN_CSS_DIR;

	wp_register_style( 'bm-style', $css_dir . 'frontend.css', array(), 0.5, 'all' );

	$custom_css = '
		#bm-conversation-area .bm-icon-loading-dot {
			color:#1f4c73;
		}
		.bm-conversation-response, .bm-conversation-response:after {
			background-color:#e8e8e8;
			color:#323232;
		}
		.bm-conversation-request, .bm-conversation-request:before  {
			background-color: #1f4c73;
			color: #fff;
		}
		.bm-content-overlay-header {
			background-color: #1f4c73;
			color: #fff;
		}
		.bm-conversation-bubble {
			opacity: 0.8;
    		filter: alpha(opacity=' . 100 * intval( 0.8 ) . ' ); /* For IE8 and earlier */
		}
		.bm-is-active {
			opacity: 1.0;
    		filter: alpha(opacity=100); /* For IE8 and earlier */
		}
	';
    $custom_css .= '
			.bm-content-overlay-header .bm-icon-toggle-down, .bm-content-overlay-powered-by, .bm-content-overlay-container {
				display: none;
			}
		';

	wp_add_inline_style( 'bm-style', $custom_css );
	wp_enqueue_style( 'bm-style' );
}
add_action( 'wp_enqueue_scripts', 'bm_register_styles' );

function bm_load_admin_scripts() {

    $js_dir = WPBOTMAN_PLUGIN_JS_DIR;
    $css_dir = WPBOTMAN_PLUGIN_CSS_DIR;

    // Use minified libraries if SCRIPT_DEBUG is turned off
    $suffix = ''; //( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    wp_register_script( 'bm-admin-script', $js_dir . 'admin' . $suffix . '.js', array( 'jquery' ));
    wp_enqueue_script( 'bm-admin-script' );
}
add_action( 'admin_enqueue_scripts', 'bm_load_admin_scripts' );

