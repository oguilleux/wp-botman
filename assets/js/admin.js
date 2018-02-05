

jQuery(document).ready(function() {


    jQuery('.change_url_form').submit(function(e) {
        var wpurl=jQuery(".regular-text").val();
        /*jQuery('#setting-error-settings_updated').append(
            "<p>" +
            "<strong>" +
            "Settings have been saved." +
            "</strong>" +
            "</p>"
        );*/
        document.change_url_form.bm_url_hid.value=wpurl;

    });

    //upbottom?¾å?°Ä?Åªid
    jQuery('#upbottom').click(function() {
        //ashu_logo?Ê¸ËÜ°è
        //targetfield = jQuery.prev('#ashu_logo');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

    window.send_to_editor = function(html) {
        imgurl = jQuery('img',html).attr('src');
        jQuery('#ashu_logo').val(imgurl);
        tb_remove();
    }




});

