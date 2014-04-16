<?php
require_once './module/header.php';
require_once './module/nav.php';

$pid = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : '';
$rs=$db->query("SELECT id,pname,purl,pinfo FROM product where id='".$pid."'");
$rs = mysql_fetch_array($rs);
$proinfo = array('pname'=>$rs['pname'],'purl'=>$rs['purl'],'pinfo'=>$rs['pinfo']);

$cbg = array('classpic'=>'/static/images/bg_zj.jpg','classcolor'=>'#dbf2fd');

$smarty->assign("cbg",$cbg);
$smarty->assign("proinfo",$proinfo);
$smarty->display('product.html');

?>