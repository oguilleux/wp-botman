<?php


// Exit if accessed directly
if (! defined ( 'ABSPATH' ))
	exit ();

/**
 * Content content
 */
function bm_content_overlay() {
	//if ( myc_is_chatbot_overlay_enabled() ) {
		ob_start();
		bm_get_template_part( 'chatbot', 'overlay', true, array(
				'overlay_header_text' 		=> "Botman",
				'overlay_powered_by_text' 	=> 'Powered by <a href="#">e2info</a>',
				//'toggle_class'				=> false == true ? 'myc-toggle-open' :  'myc-toggle-closed'
		) );
		$html = ob_get_contents();
		ob_end_clean();

		echo $html;
	//}


}
add_action( 'wp_footer', 'bm_content_overlay');




