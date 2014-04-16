<?php /* Smarty version 2.6.26, created on 2014-03-27 16:26:51
         compiled from login.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
	<link rel="stylesheet" href="/static/css/from.css" media="all" />
<div class="index_head">
	<div class="link_a"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "member.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
</div>
<script src="/static/js/jquery.validationEngine-zh_CN-ciaoca.js"></script>
<script src="/static/js/jquery.validationEngine.min.js"></script>
<script>
jQuery(document).ready(function(){
	$("#user_form").validationEngine({ 
		scroll:false,
		//binded:false,
		//showArrow:false,
		promptPosition:"centerRight",
		maxErrorsPerField:1,
		showOneMessage:true,
		addPromptClass:"formError-noArrow formError-text"
	});
});
</script>
<div class="landing">
	<h2 class="x_nav"><a href="/index.php">首页</a> > 用户登陆</h2>
    <div class="landing_left">
    	<form id="user_form" class="user_form formular" method="post" action="?act=db_login">
    	<ul>
        	<li><label>用户名：</label><input name="username" type="text" class="validate[required,minSize[2],maxSize[30]]" /></li>
            <li><label>密码：</label><input name="password" type="password" class="validate[required,minSize[6],maxSize[30]]" /> </li>
            <li><label>验证码：</label><input name="validate" type="text" class="validate[required,minSize[4],maxSize[4]]" /></li>
            <li style="padding-left:60px"><img src="/module/misc.php" onclick="this.src='/module/misc.php?'+Math.random();" title="点击刷新" /> <span style="font-size:12px;color:#999">点击图片可刷新验证码</span></li>
            <li class="dl_but"><input name="submit" type="image" src="/static/images/landing.jpg" style='border:0;width:auto;padding:0' /></li>
        </ul>
        </form>
    </div>
    <div class="landing_right">
    	还没有账号？请点击这里注册
        <a href="/member.php?act=register" style="margin-top: 15px"><img src="/static/images/registered.jpg" /></a>
    </div>
    <div class="clear"></div>
</div>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>