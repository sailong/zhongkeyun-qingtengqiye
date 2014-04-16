<?php /* Smarty version 2.6.26, created on 2014-03-19 19:39:54
         compiled from newslist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'newslist.html', 19, false),array('modifier', 'strip_tags', 'newslist.html', 20, false),array('modifier', 'truncate', 'newslist.html', 20, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="content">
	<div class="left_box">
        <div class="c_left">
            <h2><?php echo $this->_tpl_vars['columnfname']; ?>
</h2>
            <ul>
              <?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['columnf']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <?php echo $this->_tpl_vars['columnf'][$this->_sections['list']['index']]; ?>

              <?php endfor; endif; ?>
            </ul>
        </div>
        <div class="tel"><img src="/static/images/tel.jpg" /></div>
    </div>
    <div class="acon">
        <ul class="newslist">
            <?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['newsList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list']['start'] = (int)$this->_tpl_vars['pagestart'];
$this->_sections['list']['max'] = (int)10;
$this->_sections['list']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['list']['show'] = true;
if ($this->_sections['list']['max'] < 0)
    $this->_sections['list']['max'] = $this->_sections['list']['loop'];
if ($this->_sections['list']['start'] < 0)
    $this->_sections['list']['start'] = max($this->_sections['list']['step'] > 0 ? 0 : -1, $this->_sections['list']['loop'] + $this->_sections['list']['start']);
else
    $this->_sections['list']['start'] = min($this->_sections['list']['start'], $this->_sections['list']['step'] > 0 ? $this->_sections['list']['loop'] : $this->_sections['list']['loop']-1);
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
            <li>
                <p class="title"><a href="/column.php?id=<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['cid']; ?>
&sid=<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['sid']; ?>
&nid=<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['nid']; ?>
" title="<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['title']; ?>
" target="_blank"><?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['title']; ?>
</a><span>[<?php echo ((is_array($_tmp=$this->_tpl_vars['newsList'][$this->_sections['list']['index']]['postdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
]</span></p>
                <p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['newsList'][$this->_sections['list']['index']]['content'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 100, "...") : smarty_modifier_truncate($_tmp, 100, "...")); ?>
<a href="/column.php?id=<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['cid']; ?>
&sid=<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['sid']; ?>
&nid=<?php echo $this->_tpl_vars['newsList'][$this->_sections['list']['index']]['nid']; ?>
" class="more">【查看全文】</a></p>
            </li>
            <?php endfor; endif; ?>
        </ul>
        <div class="pages">
            <?php echo $this->_tpl_vars['pagenav']; ?>

        </div>
    </div>
    <div class="clear"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>