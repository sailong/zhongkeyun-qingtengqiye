<?php
require_once './module/header.php';
require_once './module/nav.php';
require_once './module/memberNav.php';

$nid = isset($_REQUEST['nid']) ? $_REQUEST['nid'] : '';

if($sid==''){
	$rs=$db->query("SELECT sid,cid,sorder FROM smallclass where cid = ".$id." order by sorder desc limit 0,1");
	$rs = mysql_fetch_array($rs);
	$sid = $rs["sid"];
}

$rs=$db->query("SELECT classpic,classcolor FROM class where cid='".$id."'");
$rs = mysql_fetch_array($rs);
$cbg = array('classpic'=>$rs['classpic'],'classcolor'=>$rs['classcolor']);


$rs=$db->query("SELECT cid,classname FROM class where cid='".$id."'");
$rs = mysql_fetch_array($rs);
$columnfname= $rs['classname'];

$rs=$db->query("SELECT sid,sname,sorder,smod FROM smallclass where cid = ".$id." order by sorder desc");
$result = $db->get_rows_array();
foreach ($result as $row) {
	if($row['sid']==$sid){
		$columnf[] = '<li class="cur"><a href="column.php?id='.$id.'&sid='.$row["sid"].'">'.$row["sname"].'</a></li>';
	}else{
		$columnf[] = '<li><a href="column.php?id='.$id.'&sid='.$row["sid"].'">'.$row["sname"].'</a></li>';
	}
}

$a = array(19,20,21,24);
if(in_array($sid,$a)){
	if($nid!==''){
		$rs=$db->query("SELECT * FROM news where nid='".$nid."'");
		$row = mysql_fetch_array($rs);
		$newsInfo = array('nid'=>$row['nid'],'id'=>$row['cid'],'sid'=>$row['sid'],'title'=>$row['title'],'content'=>$row['content'],'postdate'=>$row['postdate']);

		$smarty->assign("newsInfo",$newsInfo);
		$display = "news.html";
	}else{
		require_once("./module/page.class.php");//分页类,函数
		$page = @$_GET["page"];
		$rs=$db->query("SELECT *,count(distinct nid) FROM news where cid='".$id."' and sid='".$sid."' group by nid order by postdate desc");
		$Total = @mysql_num_rows($rs);
		while($row = mysql_fetch_array($rs)){
			$newsList[] = $row;
		}
		pageft($Total,10,1,1,0,5,"?id=".$id."&sid=".$sid."",$page);
		if (!$page){
		$pagestart = 0;
		}
		else {
		$pagestart = ($page-1) * 10;
		}
		
		$smarty->assign('pagestart', $pagestart);
		$smarty->assign('pagenav', $pagenav);
		$smarty->assign("newsList",$newsList);
		$display = "newslist.html";
	}
	
}else{
	$n = array(5,9,10);
	if(in_array($id,$n)){
		$rs=$db->query("SELECT classname,classinfo FROM class where cid='".$id."'");
		$rs = mysql_fetch_array($rs);
		$sname = $rs["classname"];
		$stext = $rs["classinfo"];
	}else{
		$rs=$db->query("SELECT sname,stext FROM smallclass where sid='".$sid."'");
		$rs = mysql_fetch_array($rs);
		$sname = $rs["sname"];
		$stext = $rs["stext"];
	}
	
	$columnfinfo = array('sname'=>$sname,'stext'=>$stext);
	$smarty->assign("columnfinfo",$columnfinfo);
	$display = "column.html";
}





$smarty->assign("cbg",$cbg);
$smarty->assign("columnfname",$columnfname);
$smarty->assign("columnf",@$columnf);
$smarty->display($display);

?>