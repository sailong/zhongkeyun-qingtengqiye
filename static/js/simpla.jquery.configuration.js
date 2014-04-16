$(document).ready(function(){
		
		$(".close").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(400);
				});
				return false;
			}
		);

    // Alternating table rows:
		
		$('tbody tr:even').addClass("alt-row"); // Add class "alt-row" to even table rows

    // Check all checkboxes when the one in a table head is checked:
		
		$('.check-all').click(
			function(){
				$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));   
			}
		);


		$(".various").fancybox({
			maxWidth	: 360,
			maxHeight   : 230,
			fitToView	: false,
			autoSize	: false,
			closeClick	: false,
			title       : '',
			openEffect	: 'none',
			closeEffect	: 'none'
		});
		
		$(".ajax").fancybox({
			maxWidth	: 940,
			maxHeight   : 500,
			fitToView	: false,
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});

		
		$(".tooltip").easyTooltip({
			xOffset: -60,
			yOffset: 60
		}); 
		
		
		//####################表单验证##########################
		$.formValidator.initConfig({formID:"form1",alertMessage:true,onError:function(msg){alert(msg)}});
		$("#webname").formValidator().inputValidator({min:1,onError:"网站名称不能为空,请确认"});
		$("#picchange1").formValidator().inputValidator({min:1,onError:"焦点图大图不能为空,请确认"});
		$("#picchange1_s").formValidator().inputValidator({min:1,onError:"焦点图小图不能为空,请确认"});
		$("#picchange2").formValidator().inputValidator({min:1,onError:"焦点图大图不能为空,请确认"});
		$("#picchange2_s").formValidator().inputValidator({min:1,onError:"焦点图小图不能为空,请确认"});
		$("#picchange3").formValidator().inputValidator({min:1,onError:"焦点图大图不能为空,请确认"});
		$("#picchange3_s").formValidator().inputValidator({min:1,onError:"焦点图小图不能为空,请确认"});
		$("#classname").formValidator().inputValidator({min:1,onError:"栏目名称不能为空,请确认"});
		$("#classpic").formValidator().inputValidator({min:1,onError:"栏目导航图不能为空,请确认"});
		$("#title").formValidator().inputValidator({min:1,onError:"标题不能为空,请确认"});
		$("#postdate").formValidator().inputValidator({min:1,onError:"发表日期不能为空,请确认"});
		$("#sname").formValidator().inputValidator({min:1,onError:"产品标题不能为空,请确认"});
		$("#username").formValidator().inputValidator({min:1,onError:"用户名不能为空,请确认"});
		$("#password").formValidator().inputValidator({min:1,onError:"密码不能为空,请确认"});
});
  
  
  