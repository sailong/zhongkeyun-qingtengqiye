<?php /* Smarty version 2.6.26, created on 2014-03-31 11:04:02
         compiled from register.html */ ?>
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


<form id="user_form" class="user_form formular" method="post" action="?act=db_reg">
<div class="landing">
	<h2 class="x_nav"><a href="/member.php?act=login" class="zh_txt">已有账号？现在登陆立即注册</a><a href="/index.php">首页</a> > 用户注册</h2>
    <div class="reg_box">
    	<ul>
        	<li><label><span>*</span>用户名：</label><input name="username" class="validate[required,minSize[2],maxSize[30]]" type="text" /></li>
            <li><label><span>*</span>密码：</label><input name="password" id="password" class="text-input validate[required,minSize[6],maxSize[30]]" type="password"></li>
            <li><label><span>*</span>确认密码：</label><input name="password2" class="text-input validate[condRequired[password],equals[password]]" type="password"></li>
            <li><label><span>*</span>Email：</label><input name="email" class="validate[required,custom[email]]" type="text" /></li>
            <li><label><span>*</span>验证码：</label><input name="validate" type="text" class="validate[required,minSize[4],maxSize[4]]" /></li>
            <li style="padding-left:80px"><img src="/module/misc.php" onclick="this.src='/module/misc.php?'+Math.random();" title="点击刷新" /> <span style="font-size:12px;color:#999">点击图片可刷新验证码</span></li>
            <li class="dl_but"><input name="submit" type="image" value="" src="/static/images/registered.jpg" class="zc_but" /></li>
        </ul>
    </div>
</div>
</form>





<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>