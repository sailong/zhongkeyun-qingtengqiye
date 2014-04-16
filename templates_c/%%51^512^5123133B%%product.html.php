<?php /* Smarty version 2.6.26, created on 2014-03-31 11:23:02
         compiled from product.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="content img_list_box">
	<h1 class="title_C">项目展示 - <?php echo $this->_tpl_vars['proinfo']['pname']; ?>
</h1>
    <div class="img_list_c">
    	<div class="bimg_p"><img src="<?php echo $this->_tpl_vars['proinfo']['purl']; ?>
" /></div>
        <div class="txt_p">
        	<h4><a href="/products.php" class="more_p"><img src="/static/images/fhlb.jpg" /></a><?php echo $this->_tpl_vars['proinfo']['pname']; ?>
</h4>
            <?php echo $this->_tpl_vars['proinfo']['pinfo']; ?>

        </div>
    </div>
    <div class="clear"></div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>