<?php
require './smarty_config.php';
require './config.php';
include_once './client/client.php';


$rsweb=$db->query("SELECT * FROM config limit 0,1");
$rowweb = mysql_fetch_array($rsweb);
$webInfo = array('title'=>$rowweb['webname'],'webdescription'=>$rowweb['webdescription'],'webkeywords'=>$rowweb['webkeywords'],'webinfom'=>$rowweb['webinfo'],'webcopyright'=>$rowweb['webcopyright'],'qq1'=>$rowweb['qq1'],'qq2'=>$rowweb['qq2'],'qq3'=>$rowweb['qq3'],'qq4'=>$rowweb['qq4'],'webtel'=>$rowweb['webtel']);


$smarty->assign("webInfo",$webInfo);
?>