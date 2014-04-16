<?php
/**
 * UCenter 应用程序开发 Example
 *
 * 应用程序无数据库，用户登录的 Example 代码
 * 使用到的接口函数：
 * uc_user_login()	必须，判断登录用户的有效性
 * uc_authcode()	可选，借用用户中心的函数加解密 Cookie
 * uc_user_synlogin()	可选，生成同步登录的代码
 */

session_start();
session_destroy();

$validate="";
if(isset($_POST["validate"])){
$validate=$_POST["validate"];
	if($validate!=$_SESSION["authnum_session"]){
	//判断session值与用户输入的验证码是否一致;
	echo '<script>alert("验证码错误！");location.href="/member.php?act=login";</script>'; 
	}else{
		list($uid, $username, $password, $email) = uc_user_login($_POST['username'], $_POST['password']);
		setcookie('qtwy', '', -86400);
		if($uid > 0) {
			//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
			setcookie('qtwy', uc_authcode($uid."\t".$username, 'ENCODE'));
			//生成同步登录的代码
			$ucsynlogin = uc_user_synlogin($uid);
			echo $ucsynlogin.'<script>alert("登录成功！");location.href="/index.php";</script>';
			exit;
			
		} elseif($uid == -1) {
			echo '<script>alert("用户不存在,或者被删除！");location.href="/member.php?act=login";</script>';
		} elseif($uid == -2) {
			echo '<script>alert("密码错误！");location.href="/member.php?act=login";</script>';
		} else {
			echo '<script>alert("未定义！");location.href="/member.php?act=login";</script>';
		}
	}
} 
?>