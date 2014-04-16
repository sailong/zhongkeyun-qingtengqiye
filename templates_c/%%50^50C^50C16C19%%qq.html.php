<?php /* Smarty version 2.6.26, created on 2014-04-10 13:43:45
         compiled from qq.html */ ?>
<script>
	$(function(){
		$("#online_qq_tab a").toggle(function(){
				$(this).addClass("flh");
				$("#onlineService").animate({width:"show"});
				
			},function(){
				$(this).hide().siblings().show();
				$(this).removeClass("flh");
				$("#onlineService").animate({width:"hide"});
				
		});
	})
</script>

<div id="online_qq_layer">
	<div id="online_qq_tab">
		<a style="display:block;" href="javascript:void(0);">收缩</a> 
		<a style="display:none;" href="javascript:void(0);">展开</a>
	</div>
	<div id="onlineService">
		<div class="onlineMenu">
			<h3 class="tQQ">QQ在线客服</h3>
			<ul>
				<li class="tli zixun">在线咨询</li>
				<li><?php echo $this->_tpl_vars['webInfo']['qq1']; ?>
</li>
				<li><?php echo $this->_tpl_vars['webInfo']['qq2']; ?>
</li>
				<li><?php echo $this->_tpl_vars['webInfo']['qq3']; ?>
</li>
				<li><?php echo $this->_tpl_vars['webInfo']['qq4']; ?>
</li>
			</ul>
			<h3 class="tele">QQ在线客服</h3>
			<ul>
				<li class="tli phone"><?php echo $this->_tpl_vars['webInfo']['webtel']; ?>
</li>
			</ul>
		</div>
		<div class="btmbg"></div>
	</div>
</div>