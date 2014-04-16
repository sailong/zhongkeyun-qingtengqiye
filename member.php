<?php
require_once './module/header.php';
require_once './module/memberNav.php';


$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';

switch($act) {
	case 'login':
		if(!empty($_COOKIE['qtwy'])) {
			header("Location: /index.php");
		} else {
			$smarty->display('login.html');
		}
	break;
	
	case 'register':
		if(!empty($_COOKIE['qtwy'])) {
			header("Location: /index.php");
		} else {
			$smarty->display('register.html');
		}
	break;
	
	case 'db_reg':
		include 'module/reg.php';
	break;
	
	case 'db_login':
		include 'module/login.php';
	break;
	
	case 'logout':
		setcookie('qtwy', '', -86400);
		$ucsynlogout = uc_user_synlogout();
		echo $ucsynlogout.'<script>alert("成功退出！");location.href="/index.php";</script>';
		exit;
	break;
}


?>