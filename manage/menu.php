<?php
require_once 'checklogin.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>后台管理</title>
        <link rel="stylesheet" href="resources/css/f1.css" type="text/css" media="screen" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script type="text/javascript">
			$(document).ready(function(){
				$("#main-nav li ul").hide(); // Hide all sub menus
				
				$("#main-nav li ul a").click(function(){
					$("#main-nav li ul").find("a").removeClass("current");
					$("#main-nav li").children("a").removeClass("current");
					$(this).addClass("current");
					$(this).parent().parent().siblings().addClass("current");
				})
				
				$("a.no-submenu").click(function(){
					$("#main-nav li").children("a").removeClass("current");
					$(this).addClass("current");
				})
				
				$("#main-nav li a.current").parent().find("ul").slideToggle("slow"); // Slide down the current menu item's sub menu
				
				$("#main-nav li a.nav-top-item").click( // When a top menu item is clicked...
					function () {
						$(this).parent().siblings().find("ul").slideUp("normal"); // Slide up all sub menus except the one clicked
						$(this).next().slideToggle("normal"); // Slide down the clicked sub menu
					}
				);
				
				$("#main-nav li .nav-top-item").hover(
					function () {
						$(this).stop().animate({ paddingRight: "25px" }, 200);
					}, 
					function () {
						$(this).stop().animate({ paddingRight: "15px" });
					}
				);
			});
		</script>
</head>
<body>
	<div id="sidebar">
		<div id="sidebar-wrapper">
			<a href="main.php" target="main"><img id="logo" src="resources/images/logo.png" alt="益世康宁" /></a>
		  
			<div id="profile-links">
				<script>
					 function getDouble(number){
					  var numbers=["0","1","2","3","4","5","6","7","8","9"];
					  for(var i=0;i<numbers.length;i++){
					   if(numbers[i]==number){
						return "0"+numbers[i];
					   }else if(i==9){
						return number;
					   }
					   
					  }
					 }
					//得到当天时间
					 function getTodayTime(){
					  var days=["星期日","星期一","星期二","星期三","星期四","星期五","星期六"];
					  var today=new Date();
					  var str= (today.getYear()<1900?1900+today.getYear():today.getYear())+"年" + getDouble([today.getMonth()+1])+"月" +getDouble(today.getDate()) +"日 "+ days[today.getDay()] +" "+getDouble(today.getHours())+":"+getDouble(today.getMinutes())+":"+getDouble(today.getSeconds());
					  document.getElementById('datetime').innerHTML=str;
					  
					 }
					//每隔一秒刷新一次
					 setInterval("getTodayTime()",1000);

                </script>
				<div id="datetime">&nbsp;</div>
				<a href="/" title="查看网站" target="_blank">查看网站</a> | <a href="logout.php" title="退出登录" target="_parent">退出登录</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="javascript:void(0)" class="nav-top-item current"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
					网站设置
					</a>
                    <ul>
						<li><a class="current" href="main.php?do=sys" target="main">系统设置</a></li>
						<li><a href="main.php?do=newshot" target="main">首页图片新闻</a></li>
						<li><a href="main.php?do=flink" target="main">友情链接</a></li>
						<li><a href="main.php?do=addflink&tit=添加友情链接" target="main">添加友情链接</a></li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:void(0)" class="nav-top-item">
					新闻中心管理
					</a>
					<ul>
						<li><a href="main.php?do=nlist&sid=19&tit=<?php echo urlencode('公司动态管理');?>" target="main">公司动态管理</a></li>
                        <li><a href="main.php?do=addnews&cid=6&sid=19&tit=<?php echo urlencode('添加动态');?>" target="main">添加动态</a></li>
						<li><a href="main.php?do=nlist&sid=20&tit=<?php echo urlencode('行业新闻管理');?>" target="main">行业新闻管理</a></li>
                        <li><a href="main.php?do=addnews&cid=6&sid=20&tit=<?php echo urlencode('添加新闻');?>" target="main">添加新闻</a></li>
                        <li><a href="main.php?do=nlist&sid=21&tit=<?php echo urlencode('物业政策法规管理');?>" target="main">物业政策法规管理</a></li>
                        <li><a href="main.php?do=addnews&cid=6&sid=21&tit=<?php echo urlencode('添加政策法规');?>" target="main">添加政策法规</a></li>
                        <li><a href="main.php?do=class&cid=6" target="main">新闻中心栏目信息</a></li>
					</ul>
				</li>

				<li> 
					<a href="javascript:void(0)" class="nav-top-item">走进青藤</a>
					<ul>
						<li><a href="main.php?do=class&cid=1&tit=走进青藤" target="main">栏目设置</a></li>
						<li><a href="main.php?do=sclass&cid=1&tit=走进青藤" target="main">子类别管理</a></li>
						<li><a href="main.php?do=addsl&cid=1&tit=走进青藤" target="main">添加子类别</a></li>
					</ul>
				</li>
				
				<li> 
					<a href="javascript:void(0)" class="nav-top-item">企业文化</a>
					<ul>
						<li><a href="main.php?do=class&cid=2&tit=企业文化" target="main">栏目设置</a></li>
						<li><a href="main.php?do=sclass&cid=2&tit=企业文化" target="main">子类别管理</a></li>
						<li><a href="main.php?do=addsl&cid=2&tit=企业文化" target="main">添加子类别</a></li>
					</ul>
				</li>
				
				<li> 
					<a href="javascript:void(0)" class="nav-top-item">七彩e生活</a>
					<ul>
						<li><a href="main.php?do=class&cid=4&tit=七彩e生活" target="main">栏目设置</a></li>
						<li><a href="main.php?do=sclass&cid=4&tit=七彩e生活" target="main">子类别管理</a></li>
						<li><a href="main.php?do=addsl&cid=4&tit=七彩e生活" target="main">添加子类别</a></li>
					</ul>
				</li>
				
				<li> 
					<a href="main.php?do=class&cid=10" class="nav-top-item no-submenu" target="main"> <!-- Add the class "current" to current menu item -->
					接管项目
					</a>
				</li>
				
				<li> 
					<a href="main.php?do=class&cid=5" class="nav-top-item no-submenu" target="main">
					信息查询
					</a>
				</li>
				
				<li>
					<a href="javascript:void(0)" class="nav-top-item">
					人力资源管理
					</a>
					<ul>
						<li><a href="main.php?do=nlist&sid=24&tit=<?php echo urlencode('招聘职位管理');?>" target="main">招聘职位管理</a></li>
                        <li><a href="main.php?do=addnews&cid=8&sid=24&tit=<?php echo urlencode('添加职位');?>" target="main">添加职位</a></li>
                        <li><a href="main.php?do=class&cid=8&tit=人力资源" target="main">人力资源栏目设置</a></li>
                        <li><a href="main.php?do=sclass&cid=8&tit=人力资源" target="main">子类别管理</a></li>
                        <li><a href="main.php?do=addsl&cid=8&tit=人力资源" target="main">添加子类别</a></li>
					</ul>
				</li>  
                
                <li> 
					<a href="main.php?do=class&cid=9" class="nav-top-item no-submenu" target="main"> <!-- Add the class "current" to current menu item -->
					联系我们
					</a>
				</li>

				
			</ul> <!-- End #main-nav -->

		</div>
	</div>
</body>
</html>