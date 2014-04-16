<?php /* Smarty version 2.6.26, created on 2014-04-03 15:27:05
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'index.html', 19, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div class="index_head">
	<div class="link_a"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "member.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "nav.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="box_1">
	<div class="index_news">
    	<h3 class="title_h3">
        	<a href="/column.php?id=6" class="more"><img src="/static/images/more.jpg" /></a><b class="index_title">新闻中心</b>
        </h3>
        <ul>
        	<li><a href="column.php?id=<?php echo $this->_tpl_vars['picNewsInfo']['cid']; ?>
&sid=<?php echo $this->_tpl_vars['picNewsInfo']['sid']; ?>
&nid=<?php echo $this->_tpl_vars['picNewsInfo']['nid']; ?>
" title="<?php echo $this->_tpl_vars['picNewsInfo']['title']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['picNewsInfo']['pic']; ?>
" width="238" height="157" alt="<?php echo $this->_tpl_vars['picNewsInfo']['title']; ?>
" /></a></li>
            <li class="n_list">
            	<dl>
            		<?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['newsList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list']['max'] = (int)6;
$this->_sections['list']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['list']['show'] = true;
if ($this->_sections['list']['max'] < 0)
    $this->_sections['list']['max'] = $this->_sections['list']['loop'];
$this->_sections['list']['start'] = $this->_sections['list']['step'] > 0 ? 0 : $this->_sections['list']['loop']-1;
if ($this->_sections['list']['show']) {
    $this->_sections['list']['total'] = min(ceil(($this->_sections['list']['step'] > 0 ? $this->_sections['list']['loop'] - $this->_sections['list']['start'] : $this->_sections['list']['start']+1)/abs($this->_sections['list']['step'])), $this->_sections['list']['max']);
    if ($this->_sections['list']['total'] == 0)
        $this->_sections['list']['show'] = false;
} else
    $this->_sections['list']['total'] = 0;
if ($this->_sections['list']['show']):

            for ($this->_sections['list']['index'] = $this->_sections['list']['start'], $this->_sections['list']['iteration'] = 1;
                 $this->_sections['list']['iteration'] <= $this->_sections['list']['total'];
                 $this->_sections['list']['index'] += $this->_sections['list']['step'], $this->_sections['list']['iteration']++):
$this->_sections['list']['rownum'] = $this->_sections['list']['iteration'];
$this->_sections['list']['index_prev'] = $this->_sections['list']['index'] - $this->_sections['list']['step'];
$this->_sections['list']['index_next'] = $this->_sections['list']['index'] + $this->_sections['list']['step'];
$this->_sections['list']['first']      = ($this->_sections['list']['iteration'] == 1);
$this->_sections['list']['last']       = ($this->_sections['list']['iteration'] == $this->_sections['list']['total']);
?>
                	<dt><span><?php echo ((is_array($_tmp=$this->_tpl_vars['newsList'][$this->_sections['list']['index']]['postdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</span><a href="/column.php?id=<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['cid']; ?>
&sid=<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['sid']; ?>
&nid=<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['nid']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['title']; ?>
"><?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['title']; ?>
</a></dt>
                    <?php endfor; endif; ?>
                </dl>
            </li>
        </ul>
    </div>
    <div class="intr">
    	<h3><a href="/column.php?id=1" class="more"><img src="/static/images/more.jpg" /></a>公司介绍</h3>
    	<ul>
        	<li><img src="/static/images/img3.jpg" /></li>
            <li class="intr_c"><?php echo $this->_tpl_vars['webInfo']['webinfom']; ?>
</li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<div class="zzfw">
	<ul>
    	<li><a href="column.php?id=4&sid=12" target="_blank"><img src="/static/images/link1.png" /></a></li>
        <li><a href="column.php?id=4&sid=13" target="_blank"><img src="/static/images/link2.png" /></a></li>
        <li><a href="column.php?id=4&sid=14" target="_blank"><img src="/static/images/link3.png" /></a></li>
        <li><a href="column.php?id=4&sid=15" target="_blank"><img src="/static/images/link4.png" /></a></li>
        <li><a href="column.php?id=4&sid=16" target="_blank"><img src="/static/images/link5.png" /></a></li>
        <li><a href="column.php?id=4&sid=17" target="_blank"><img src="/static/images/link6.png" /></a></li>
        <li><a href="column.php?id=4&sid=18" target="_blank"><img src="/static/images/link7.png" /></a></li>
    </ul>
</div>
<div id="wrapper">
	<h3 class="title_h3"><a href="products.php" class="more"><img src="/static/images/more.jpg" /></a><b class="index_title">项目展示</b></h3>
    <div id="carousel">
    	<ul>
    		<?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['proList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list']['show'] = true;
$this->_sections['list']['max'] = $this->_sections['list']['loop'];
$this->_sections['list']['step'] = 1;
$this->_sections['list']['start'] = $this->_sections['list']['step'] > 0 ? 0 : $this->_sections['list']['loop']-1;
if ($this->_sections['list']['show']) {
    $this->_sections['list']['total'] = $this->_sections['list']['loop'];
    if ($this->_sections['list']['total'] == 0)
        $this->_sections['list']['show'] = false;
} else
    $this->_sections['list']['total'] = 0;
if ($this->_sections['list']['show']):

            for ($this->_sections['list']['index'] = $this->_sections['list']['start'], $this->_sections['list']['iteration'] = 1;
                 $this->_sections['list']['iteration'] <= $this->_sections['list']['total'];
                 $this->_sections['list']['index'] += $this->_sections['list']['step'], $this->_sections['list']['iteration']++):
$this->_sections['list']['rownum'] = $this->_sections['list']['iteration'];
$this->_sections['list']['index_prev'] = $this->_sections['list']['index'] - $this->_sections['list']['step'];
$this->_sections['list']['index_next'] = $this->_sections['list']['index'] + $this->_sections['list']['step'];
$this->_sections['list']['first']      = ($this->_sections['list']['iteration'] == 1);
$this->_sections['list']['last']       = ($this->_sections['list']['iteration'] == $this->_sections['list']['total']);
?>
			<li><a href="product.php?pid=<?php echo $this->_tpl_vars['proList'][$this->_sections['list']['index']]['id']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['proList'][$this->_sections['list']['index']]['purl']; ?>
" /><br /><?php echo $this->_tpl_vars['proList'][$this->_sections['list']['index']]['pname']; ?>
</a></li>
            <?php endfor; endif; ?>
        </ul>
    </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "flink.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="/static/js/jquery.jcarousellite.js"></script>

<script type="text/javascript">  
$("#carousel").jCarouselLite({
auto: 1800,
speed: 1500
});
</script> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>