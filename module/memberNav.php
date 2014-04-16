<?php
include_once './smarty_config.php';

if(!empty($_COOKIE['qtwy'])) {
	list($Q_uid, $Q_username) = explode("\t", uc_authcode($_COOKIE['qtwy'], 'DECODE'));
} else {
	$Q_uid = $Q_username = '';
}

if(!$Q_username) {
	//用户未登录
	$memberinfo = '<a href="member.php?act=login">用户登录</a> | <a href="member.php?act=register">注册新用户</a> ';
} else {
	//用户已登录
	$memberinfo =  $Q_username.' <a href="member.php?act=logout">退出</a> ';
}

$smarty->assign("memberinfo",$memberinfo);
?>