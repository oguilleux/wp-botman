

jQuery(document).ready(function() {


    jQuery('.bm_general_settings').submit(function(e) {
       /* var ashu_logo=jQuery("#ashu_logo").val();

        jQuery('#ashu_logo_hid').val(ashu_logo);*/

    });

    //upbottom?¾å?°Ä?Åªid
    jQuery('#botman-upbottom').click(function() {
        //ashu_logo?Ê¸ËÜ°è
        //targetfield = jQuery.prev('#ashu_logo');
        window.send_to_editor = function(html) {
            imgurl = jQuery('img',html).attr('src');
            jQuery('#botman_logo').val(imgurl);
            tb_remove();
        }
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

    jQuery('#user-upbottom').click(function() {
        //ashu_logo?Ê¸ËÜ°è
        //targetfield = jQuery.prev('#ashu_logo');
        window.send_to_editor = function(html) {
            imgurl = jQuery('img',html).attr('src');
            jQuery('#user_logo').val(imgurl);
            tb_remove();
        }
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });






});

