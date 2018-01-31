<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


function bm_add_options_link() {

	add_options_page( __( 'Botman', 'chatbot' ), __( 'Botman', 'chatbot' ), 'manage_options', 'botman', 'bm_options_page');
	
}
add_action( 'admin_menu', 'bm_add_options_link');

function bm_options_page() {
    $option_name = 'bm_url_hid' ;
    if(!get_option($option_name)){
        $newvalue="https://e2bot.localhost.com/wpbot";
        update_option($option_name,$newvalue);
    }

    bm_change_url();

?>
    <div class="setting_error" id="setting-error-settings_updated"></div>
    <div class="wrap">
        <h1><?php _e( 'Botman Settings', 'chatbot' ); ?></h1>
        <form name="change_url_form" class="change_url_form" method="post">
            <tr>
                <th scope="row">Modify the URL</th>
                <td><input class="regular-text" type="text" name="bm_url_input" value="<?php echo get_option('bm_url_hid'); ?>"/></td>
            </tr>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Save changes" action="suburl">
            </p>
            <input type="hidden" name="bm_url_hid" value="">
        </form>
    </div>


    <?php


}
   /*
    * ´ÉÍý³¦ÌÌ½¤²þurl¸ùÇ½
    */
function bm_change_url(){
    //echo  $_POST["bm_url_hid"];
    $option_name = 'bm_url_hid' ;
    $newvalue=$_POST["bm_url_hid"];
   /* if($newvalue){
        if(preg_match('/^http[s]?:\/\/'.
            '(([0-9]{1,3}\.){3}[0-9]{1,3}'. // IP·Á¼°ÅªURL- 199.194.52.184
            '|'. // °ô?IPÏÂDOMAIN¡Ê°èÌ¾¡Ë
            '([0-9a-z_!~*\'()-]+\.)*'. // °èÌ¾- www.
            '([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\.'. // Æó?°èÌ¾
            '[a-z]{2,6})'.  // first level domain- .com or .museum
            '(:[0-9]{1,4})?'.  // Ã¼¸ý- :80
            '((\/\?)|'.  // a slash isn't required if there is no file name
            '(\/[0-9a-zA-Z_!~\'\(\)\[\]\.;\?:@&=\+\$,%#-\/^\*\|]*)?)$/',$newvalue)){
            if(get_option($option_name)==$newvalue){
                $html="<div class=\"setting_error\" id=\"setting-error-settings_updated\"><strong>This URL is the same as the previous modification.</strong></div>";
                return $html;
            }
            update_option($option_name, $newvalue);
            $html="<div class=\"setting_error\" id=\"setting-error-settings_updated\"><strong>The URl have been modified to ".get_option($option_name).".</strong></div>";
            return $html;
        }else{
            $html="<div class=\"setting_error\" id=\"setting-error-settings_updated\"><strong>Your url is not correct!Please enter a correct url.</strong></div>";
            return $html;
        }

    }*/
    if($newvalue){
        $newvalue=$_POST["bm_url_hid"];
        update_option($option_name, $newvalue);
        $html="<div class=\"setting_error\" id=\"setting-error-settings_updated\"><strong>The URl have been modified to ".get_option($option_name).".</strong></div>";
        return $html;
    }
}
