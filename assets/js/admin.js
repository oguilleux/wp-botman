

jQuery(document).ready(function() {


    jQuery('.bm_general_settings').submit(function(e) {

    });

    //change the botman head image
    jQuery('#botman-upbottom').click(function() {
        window.send_to_editor = function(html) {
            imgurl = jQuery('img',html).attr('src');
            jQuery('#botman_logo').val(imgurl);
            tb_remove();
        }
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

    //change the ueser head image
    jQuery('#user-upbottom').click(function() {
        window.send_to_editor = function(html) {
            imgurl = jQuery('img',html).attr('src');
            jQuery('#user_logo').val(imgurl);
            tb_remove();
        }
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

});

