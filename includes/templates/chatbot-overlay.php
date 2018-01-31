<div class="bm-content-overlay ">
        <div class="bm-content-overlay-header">
            <span class="bm-content-overlay-header-text"><?php echo $overlay_header_text; ?></span>
            <span class="bm-icon-toggle-up" title="<?php _e( 'Open', 'chatbot' ); ?>"><img class="bm-chatLog-up" src=<?php echo WPBOTMAN_PLUGIN_URL."assets/fonts/arrow-up.png"  ?> /></span>
            <span class="bm-icon-toggle-down" title="<?php _e( 'Close', 'chatbot' ); ?>"><img class="bm-chatLog-down" src=<?php echo WPBOTMAN_PLUGIN_URL."assets/fonts/arrow-down.png"  ?> /></span>
        </div>
        <?php /*if ( strlen( $overlay_powered_by_text ) > 0 ) {
            */?><!--
            <div class="bm-content-overlay-powered-by"><?php /*echo $overlay_powered_by_text; */?></div>
            --><?php
/*        } */?>
            <div class="bm-content-overlay-container"><?php echo do_shortcode( '[wp-botman]' ); ?></div>
</div>

