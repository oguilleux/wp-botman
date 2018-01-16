

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



	    
});

