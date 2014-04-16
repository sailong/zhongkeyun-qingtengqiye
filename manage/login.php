<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>后台登陆</title>
        <link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script type="text/javascript" src="../static/js/formValidator-4.0.1.min.js"></script>
        <script type="text/javascript" src="../static/js/formValidatorRegex.js"></script>
        <!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="../static/js/pngfix.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
        <script type="text/javascript">
			$(function(){
				$.formValidator.initConfig({formID:"form1",alertMessage:true,onError:function(msg){alert(msg)}});
				$("#username").formValidator().inputValidator({min:1,onError:"用户名不能为空,请确认"});
				$("#password").formValidator().inputValidator({min:1,onError:"密码不能为空,请确认"});
			})
		</script>
</head>
  
	<body id="login">
    	<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<h1>青藤物业</h1><div class="clear"></div>
				<img id="logo" src="resources/images/logologin.png" alt="Simpla Admin logo" />
			</div>
			
            <div class="clear"></div>
            
			<div id="login-content">
				
				<form action="checklogin.php?act=login" method="post" id="form1">
					<p>
						<label>用户名：</label>
						<input class="text-input" name="username" id="username" type="text" />
					</p>
					<div class="clear"></div>
					<p>
						<label>密 码：</label>
						<input class="text-input" name="password" id="password" type="password" />
					</p>
					<div class="clear"></div>
					<p>
						<input class="sbutton" type="submit" value="登录" />
					</p>
				</form>
                
			 </div>

		</div>
		
  </body>
  </html>
