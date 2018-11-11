
jQuery(document).ready(function($) {
	/*
	 * When the user enters text in the text input text field and then the presses Enter key
	 */
    jQuery("input#bm-text").keypress(function(event) {
        if (event.which == 13) {
            event.preventDefault();
            jQuery("#bm-conversation-area .bm-conversation-request").removeClass("bm-is-active");
            var text = jQuery("input#bm-text").val();
            text=jQuery.trim(text);
            if(text.length==0){
                var innerHTML = "<div class=\"bm-conversation-bubble-container bm-conversation-bubble-container-request\">";
                if(bm_script_vars.userlogo){
                    innerHTML +="<img class=\"bm-chatLog-avatar\" src="+bm_script_vars.userlogo+" />";
                }
                innerHTML +="<div class=\"bm-conversation-bubble bm-conversation-request bm-is-active\"><p>Plaease do not enter a blank information.</p></div>";
                innerHTML += "</div>";
                jQuery("#bm-conversation-area").append(innerHTML);
                jQuery("input#bm-text").val("");
                jQuery("#bm-conversation-area").scrollTop(jQuery("#bm-conversation-area").prop("scrollHeight"));
                return;
            }

            if(text=='clear'){
                $("#bm-conversation-area").empty();
                jQuery("input#bm-text").val("");
                return;
            }

            var innerHTML = "<div class=\"bm-conversation-bubble-container bm-conversation-bubble-container-request\">";
            if(bm_script_vars.userlogo){
                innerHTML +="<img class=\"bm-chatLog-avatar\" src="+bm_script_vars.userlogo+" />";
            }
            innerHTML += "<div class=\"bm-conversation-bubble bm-conversation-request bm-is-active\">" + text + "</div>";
            innerHTML += "</div>";
            jQuery("#bm-conversation-area").append(innerHTML);
            jQuery("input#bm-text").val("");
            jQuery("#bm-conversation-area").scrollTop(jQuery("#bm-conversation-area").prop("scrollHeight"));

            var data={
                action:'bm_send',
                driver:'web',
                userId:userid(),
                message:text
            };

            $.post(bm_script_vars.ajaxurl,data,function (response) {
                if(response){
					var innerHTML = '';
                    // botsaid=response.replace(/\s/g,'');
                    if(response === "nourl"){
                        innerHTML = "<div class=\"bm-conversation-bubble-container bm-conversation-bubble-container-response\"><div class=\"bm-conversation-bubble bm-conversation-response bm-is-active \">No url is set.</div>";
                    }else{
                        var botsaid = eval("("+response+")");

                        if(typeof botsaid.messages !== 'undefined' ){
							if (botsaid.messages.length > 0) {
								botsaid.messages.forEach(function(element) {
									innerHTML += "<div class=\"bm-conversation-bubble-container bm-conversation-bubble-container-response\"><div class=\"bm-conversation-bubble bm-conversation-response bm-is-active \">"+ element.text + "</div>";

									if(bm_script_vars.botlogo){
										innerHTML += "<img class=\"bm-chatLog-avatar\" src="+bm_script_vars.botlogo+" /></div>";
									}
								});
							} else {
								innerHTML = "<div class=\"bm-conversation-bubble-container bm-conversation-bubble-container-response\"><div class=\"bm-conversation-bubble bm-conversation-response bm-is-active \">I'm sorry I don't understand what you're trying to say.</div>";

								if(bm_script_vars.botlogo){
									innerHTML += "<img class=\"bm-chatLog-avatar\" src="+bm_script_vars.botlogo+" /></div>";
								}

								innerHTML += "<div class=\"bm-conversation-bubble-container bm-conversation-bubble-container-response\"><div class=\"bm-conversation-bubble bm-conversation-response bm-is-active \">Try saying 'Hi'!</div>";

								if(bm_script_vars.botlogo){
									innerHTML += "<img class=\"bm-chatLog-avatar\" src="+bm_script_vars.botlogo+" /></div>";
								}
							}
						} else {
							innerHTML = "<div class=\"bm-conversation-bubble-container bm-conversation-bubble-container-response\"><div class=\"bm-conversation-bubble bm-conversation-response bm-is-active \">The Response is null.Please set the right url.</div>";

							if(bm_script_vars.botlogo){
								innerHTML += "<img class=\"bm-chatLog-avatar\" src="+bm_script_vars.botlogo+" /></div>";
							}
						}

                    }

                    jQuery("#bm-conversation-area").append(innerHTML);
                    jQuery("#bm-conversation-area").scrollTop(jQuery("#bm-conversation-area").prop("scrollHeight"));
                }
            });

        }

    });



	/* Overlay slide toggle */
	jQuery(".bm-content-overlay .bm-content-overlay-header").click(function(event){

		if (jQuery(this).find(".bm-icon-toggle-up").css("display") !== "none") {
			jQuery(this).find(".bm-icon-toggle-up").hide();
			jQuery(this).parent().removeClass("myc-toggle-closed");
			jQuery(this).parent().addClass("myc-toggle-open");
			jQuery(this).find(".bm-icon-toggle-down").show();
			jQuery(this).siblings(".bm-content-overlay-container, .bm-content-overlay-powered-by").slideToggle("slow", function() {});
		} else {
			jQuery(this).find(".bm-icon-toggle-down").hide();
			jQuery(this).parent().removeClass("myc-toggle-open");
			jQuery(this).parent().addClass("myc-toggle-closed");
			jQuery(this).find(".bm-icon-toggle-up").show();
			jQuery(this).siblings(".bm-content-overlay-container, .bm-content-overlay-powered-by").slideToggle("slow", function() {});
		}
	});

});

function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
};

function userid(){
    if(document.cookie.indexOf('userid=')>-1){
        //alert(1);
        var userid = getCookie("userid");

        if(!userid){
            var d = new Date();
            var userLang = navigator.language || navigator.userLanguage;
            userid=Math.floor(1000*Math.random()) + d.getTime() +  '.' + d.getTimezoneOffset() + '.' + userLang;
            //setcookie('userid',userid,3600,'/');
            document.cookie="userid="+userid;
        }
    }else{
        var d = new Date();
        var userLang = navigator.language || navigator.userLanguage;
        userid=Math.floor(1000*Math.random()) + d.getTime() +  '.' + d.getTimezoneOffset() + '.' + userLang;
        document.cookie="userid="+userid;
    }

    return userid;
};


