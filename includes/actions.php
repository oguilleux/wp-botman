<?php

// Exit if accessed directly
if (! defined ( 'ABSPATH' ))
	exit ();

/**
 * Content content
 */
function bm_content_overlay() {
	//if ( myc_is_chatbot_overlay_enabled() ) {
    $overlay_settings = (array) get_option( 'bm_general_settings' );
		ob_start();
		bm_get_template_part( 'chatbot', 'overlay', true, array(
				'overlay_header_text' 		=> $overlay_settings['header_text'],
		) );
		$html = ob_get_contents();
		ob_end_clean();

		echo $html;
	//}


}
add_action( 'wp_footer', 'bm_content_overlay');
