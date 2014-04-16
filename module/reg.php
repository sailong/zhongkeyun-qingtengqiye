<?php
/**
 * UCenter 应用程序开发 Example
 *
 * 应用程序无数据库，用户注册的 Example 代码
 * 使用到的接口函数：
 * uc_user_register()	必须，注册用户数据
 * uc_authcode()	可选，借用用户中心的函数加解密 Cookie
 */


session_start();
session_destroy();

$validate="";
if(isset($_POST["validate"])){
$validate=$_POST["validate"];
	if($validate!=$_SESSION["authnum_session"]){
	//判断session值与用户输入的验证码是否一致;
	echo '<script>alert("验证码错误！");location.href="/member.php?act=register";</script>'; 
	}else{
		$uid = uc_user_register($_POST['username'], $_POST['password'], $_POST['email']);
		if($uid <= 0) {
			if($uid == -1) {
				echo '<script>alert("用户名不合法")</script>';
			} elseif($uid == -2) {
				echo '<script>alert("包含要允许注册的词语")</script>';
			} elseif($uid == -3) {
				echo '<script>alert("用户名已经存在")</script>';
			} elseif($uid == -4) {
				echo '<script>alert("Email 格式有误")</script>';
			} elseif($uid == -5) {
				echo '<script>alert("Email 不允许注册")</script>';
			} elseif($uid == -6) {
				echo '<script>alert("该 Email 已经被注册")</script>';
			} else {
				echo '<script>alert("未定义")</script>';
			}
		} else {
			//注册成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
			setcookie('qtwy', uc_authcode($uid."\t".$_POST['username'], 'ENCODE'));
			$ucsynlogin = uc_user_synlogin($uid);
			echo $ucsynlogin;
		}
		echo '<script>location.href="/member.php?act=register";</script>';
	}
} 
?>