/**
 * Created by wangjh on 2015/7/8.
 */
var pop = {
    picProp : new prompt(),

    delDiv : function(obj){
        var div = document.getElementById(obj);
        if (div != null){
            div.parentNode.removeChild(div);
        }
    },
    closeX : function (obj){
        //$(obj).remove();
        this.delDiv(obj);
        background().remove();
        return;
    },

    showVedio: function(content,title) {
      /*  var html = '<div class="pop_up_video">\
						<a href="javascript:;" class="popup_video_right_close" title="关闭">关闭</a>\
						<div class="pop_gamePic_content">\
						  <div class="img_pop_up">\
						    <embed src="'+content+'" allowFullScreen="true" quality="high" width="100%" height="310" align="middle" allowScriptAccess="always" wmode="transparent" type="application/x-shockwave-flash"></embed>\
						  </div>\
						</div>\
					</div>';
		*/
        var html='';
        html    =    '<div class="pop_up_video">\
                            <div class="popup_video_left">\
                                <p class="popup_video_pics">\
        						    <embed src="'+content+'" allowFullScreen="true" quality="high" width="100%" height="480" align="middle" allowScriptAccess="always" wmode="transparent" type="application/x-shockwave-flash"></embed>\
                                </p>\
                            </div>\
                            <div class="popup_video_right">\
                                <a href="javascript:;" class="popup_video_right_close">close</a>\
                            </div>\
                      </div>';
        this.picProp.init(html, function(o){
            o.container.find('a.popup_video_right_close').click(function() {
                o.container.remove();
                background().hide();
                return false;
            });
        }).show();
    }
}

//视频
function openVideo(src,title){
    pop.showVedio(src,title);
}


