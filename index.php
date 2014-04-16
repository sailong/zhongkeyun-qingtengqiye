<?php
require_once './module/header.php';
require_once './module/nav.php';
require_once './module/memberNav.php';
require_once './module/flink.php';

$rs=$db->query("SELECT nid,cid,sid,title,postdate FROM news where sid<>'24' order by postdate desc");
while($row = mysql_fetch_array($rs)){
	$newsList[] = $row;
}

$rs=$db->query("SELECT cid,sid,nid,title,pic,ishot FROM news where ishot='1' limit 0,1");
$row = mysql_fetch_array($rs);
if($row['pic']==''){
	$npic = '/static/images/none.jpg';
}else{
	$npic = $row['pic'];
}
$picNewsInfo = array('nid'=>$row['nid'],'cid'=>$row['cid'],'sid'=>$row['sid'],'title'=>$row['title'],'pic'=>$npic);

$rs=$db->query("SELECT id,pname,purl FROM product order by id desc");
while($row = mysql_fetch_array($rs)){
	$proList[] = $row;
}


$smarty->assign("newsList",$newsList);
$smarty->assign("picNewsInfo",$picNewsInfo);
$smarty->assign("proList",$proList);
$smarty->display('index.html');

?>