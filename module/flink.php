<?php
$rs=$db->query("SELECT name,url FROM flink order by id desc");
while($row = mysql_fetch_array($rs)){
	$flink[] = $row;
}

$smarty->assign("flink",$flink);
?>