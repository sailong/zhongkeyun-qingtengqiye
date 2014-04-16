<?php
error_reporting(0);
require_once './module/header.php';

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';


$smallclass[] = '<div class="navbg"><div class="col960"><ul id="navul" class="cl"><li><a href="/index.php">网站首页</a></li>';
$rs=$db->query("SELECT cid,classname,classen,classorder FROM class order by classorder");

$result = $db->get_rows_array();

foreach ($result as $row) {
	
	if($row['cid']==7){
		$url = '/bbs';
	}else{
		$url = 'column.php?id='.$row["cid"];
	}
	
	if($id==$row['cid']){
		$smallclass[] = '<li><a class="nav_cur" href="'.$url.'">'.$row["classname"].'</a><ul>';
	}else{
		$smallclass[] = '<li><a href="'.$url.'">'.$row["classname"].'</a><ul>';
	}
	$db->query("SELECT sid,sname,cid,sorder,sen FROM smallclass where cid='".$row['cid']."' order by sorder desc");
	$result2 = $db->get_rows_array();
	foreach ($result2 as $row2) {

		$smallclass[] = '<li><a href="column.php?id='.$row2["cid"].'&sid='.$row2["sid"].'">'.$row2["sname"].'</a></li>';
		
	}
	
	$smallclass[] = '</ul></li>';
}

$smallclass[] = '</ul></div></div>';


$smarty->assign("smallclass",@$smallclass);
?>