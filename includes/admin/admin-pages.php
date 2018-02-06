<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


function bm_add_options_link() {

	add_options_page( __( 'Botman', 'wp-botman' ), __( 'Botman', 'wp-botman' ), 'manage_options', 'botman', 'bm_options_page');
	
}
add_action( 'admin_menu', 'bm_add_options_link');

function bm_options_page() {
    $options = getOptions();
?>

    <div class="setting_error" id="setting-error-settings_updated"></div>
    <div class="wrap">
        <h1><?php _e( 'Botman Settings', 'wp-botman' ); ?></h1>
        <h2 class="nav-tab-wrapper">
            <?php
            $current_tab = 'bm_general_settings';
            //$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'bm_general_settings';
            /*$tabs = array (
               // 'bm_general_settings'				=> __( 'General', 'botman' ),
            );

            $tabs = apply_filters( 'bm_settings_tabs', $tabs );

            foreach ( $tabs as $tab_key => $tab_caption ) {
                $active = $current_tab == $tab_key ? 'nav-tab-active' : '';
                echo '<a class="nav-tab ' . $active . '" href="options-general.php?page=botman&tab=' . $tab_key . '">' . $tab_caption . '</a>';
            }
            */
            ?>
        </h2>

        <form method="post" name="<?php echo $current_tab; ?>" class="<?php echo $current_tab; ?>" action="options.php">
            <?php
            do_settings_sections( 'botman&tab=' . $current_tab );
            //²Ã?¾å??ÊÒÅªjs(wp¼«?)
            wp_enqueue_script('thickbox');
            //²Ã?css(wp¼«?)
            wp_enqueue_style('thickbox');
            ?>

            <!--<label>
                <input type="text" size="80"  name="ashu_logo" id="ashu_logo" value="<?php /*echo($options['ashu_logo']); */?>"/>
                <input type="button" name="upload_button" value="load" id="upbottom"/>
                <input type="hidden" id="ashu_logo_hid" name="ashu_logo_hid" value="55" />
            </label>-->

            <?php

            //?È¡¿ô?½Ð°¨Ð¤?é¶°è¡¤ÍÑÍè??É½?Íè¸»
            wp_nonce_field( 'update-options' );
            settings_fields( $current_tab );
            submit_button( null, 'primary', 'submit', true, null );

            /*if(isset($_POST['submit'])) {
                $options = getOptions();
                $options['ashu_logo'] = stripslashes($_POST['ashu_logo']);
                update_option('classic_options', $options);
            } else {
                getOptions();
            }*/

            /*if($_POST['ashu_logo_hid']){
                $options = getOptions();
                $options['ashu_logo'] = stripslashes($_POST['ashu_logo_hid']);
                update_option('classic_options', $options);
            }else {
                getOptions();
            }*/


            ?>
        </form>
    </div>

    <?php


}

function getOptions() {
    $options = get_option('classic_options');
    if (!is_array($options)) {
        $options['ashu_logo'] = '333';
        update_option('classic_options', $options);
    }
    return $options;
}


/**
 * General settings section
 */
function bm_section_general_desc() {
    ?>
    <p class="bm-settings-section"><?php _e( 'Dialogflow integration settings and chatbot conversation styles.', 'wp-botman'); ?></p>
    <?php
}

/**
* Field input setting
*/
function bm_field_input( $args ) {
    $settings = (array) get_option( $args['option_name' ] );
    $class = isset( $args['class'] ) ? $args['class'] : 'regular-text';
    $type = isset( $args['type'] ) ? $args['type'] : 'text';
    $min = isset( $args['min'] ) && is_numeric( $args['min'] ) ? intval( $args['min'] ) : null;
    $max = isset( $args['max'] ) && is_numeric( $args['max'] ) ? intval( $args['max'] ) : null;
    $step = isset( $args['step'] ) && is_numeric( $args['step'] ) ? floatval( $args['step'] ) : null;
    $readonly = isset( $args['readonly'] ) && $args['readonly'] ? ' readonly' : '';
    $placeholder = isset( $args['placeholder'] ) ? $args['placeholder'] : '';
    $required = isset( $args['required'] ) && $args['required'] === true ? 'required' : '';
    ?>
    <input class="<?php echo $class; ?>" type="<?php echo $type; ?>" name="<?php echo $args['option_name']; ?>[<?php echo $args['setting_id']; ?>]"
           value="<?php echo esc_attr( $settings[$args['setting_id']] ); ?>" <?php if ( $min !== null ) { echo ' min="' . $min . '"'; } ?>
        <?php if ( $max !== null) { echo ' max="' . $max . '"'; } echo $readonly; ?>
        <?php if ( $step !== null ) { echo ' step="' . $step . '"'; } ?>
           placeholder="<?php echo $placeholder; ?>" <?php echo $required; ?> />
    <?php
    if ( isset( $args['label'] ) ) { ?>
        <label><?php echo $args['label']; ?></label>
    <?php }
}

/*
 * Field label
 */
function bm_field_label($args){
    $settings = (array) get_option( $args['option_name' ] );
    ?>
    <label><?php echo $args['label']; ?></label>
    <?php
}

/*
 * Field logo
 */
function bm_field_logo($args){
    $settings = (array) get_option( $args['option_name' ] );
    $class = isset( $args['class'] ) ? $args['class'] : 'regular-text';
    $type = isset( $args['type'] ) ? $args['type'] : 'text';
    $butid=isset($args['butid'])?$args['butid']:'';
    $logoid=isset($args['logoid'])?$args['logoid']:'';
    ?>
    <label>
        <input id= "<?php echo $logoid; ?>" type="<?php echo $type; ?>" size="80"  name="<?php echo $args['option_name']; ?>[<?php echo $args['setting_id']; ?>]" class="<?php echo $class; ?>" value="<?php echo esc_attr( $settings[$args['setting_id']] ); ?>"/>
        <input type="button" name="upload_button" value="load" id="<?php echo $butid; ?>"/>
    </label>
    <?php
}



