<?php
require_once '../config.php';
session_start();

$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if($act=="login"){
	if($username=='' || $password==''){
		echo "<script>alert('请输入完整的信息！');window.location.href='login.php';</script>";
		die();
	}
	else{
		//只允许用户名和密码用0-9,a-z,A-Z,'@','_','.','-'这些字符
		$username=preg_replace("/[^0-9a-zA-Z_@!\.-]/", '', $username);
		$password=preg_replace("/[^0-9a-zA-Z_@!\.-]/", '', $password);
		$rs=$db->query("SELECT * from manager limit 0,1");
		$row = mysql_fetch_array($rs);
		if($username==$row["username"] && md5($password)==$row["password"]){
			$_SESSION['username']=$username;
			header("Location:index.php");
		}
		else{
			echo "<script>alert('用户名或密码不正确！');window.location.href='login.php';</script>";
			die();
		}
	}
}

if(@$_SESSION['username']==''){
	header("Location:index.php");
	die();
}

?>