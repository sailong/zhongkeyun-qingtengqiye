<?php
require_once './module/header.php';
require_once './module/nav.php';


$rs=$db->query("SELECT id,pname,purl,porder FROM product order by id desc");
while($row = mysql_fetch_array($rs)){
	$proList[] = $row;
}

$cbg = array('classpic'=>'/static/images/bg_zj.jpg','classcolor'=>'#dbf2fd');

$smarty->assign("cbg",$cbg);
$smarty->assign("proList",$proList);
$smarty->display('products.html');

?>