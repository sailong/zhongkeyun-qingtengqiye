/*
*author:Null
*DATE:2013.5.24
*/

$(function(){		   
//澶撮〉鐧诲綍
$("#navul > li").not(".navhome").hover(function(){$(this).addClass("navmoon")},function(){$(this).removeClass("navmoon")})


var maxwidth = 580;
$(".news_text img").each(function(){
  if ($(this).width() > maxwidth) {
   $(this).width(maxwidth);}
   }); 
}); 
function $tomato(id) {
	return document.getElementById(id);
}
function runCode(obj) {
	var winname = window.open('', "_blank", '');
	winname.document.open('text/html', 'replace');
	winname.document.writeln(obj.value);
	winname.document.close();
}


(function($){
    $.fn.capacityFixed = function(options) {
        var opts = $.extend({},$.fn.capacityFixed.deflunt,options);
        var FixedFun = function(element) {
            var top = opts.top;
            element.css({
                "top":top
            });
            $(window).scroll(function() {
                var scrolls = $(this).scrollTop();
                if (scrolls > top) {

                    if (window.XMLHttpRequest) {
                        element.css({
                            position: "fixed",
                            top: 0							
                        });
                    } else {
                        element.css({
                            top: scrolls
                        });
                    }
                }else {
                    element.css({
                        position: "absolute",
                        top: top
                    });
                }
            });
            element.find(".close-ico").click(function(event){
                element.remove();
                event.preventDefault();
            })
        };
        return $(this).each(function() {
            FixedFun($(this));
        });
    };
    $.fn.capacityFixed.deflunt={
		right : 0,//鐩稿浜庨〉闈㈠搴︾殑鍙宠竟瀹氫綅
        top:0
	};
})(jQuery);