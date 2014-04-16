<?php
header('Content-Type:text/html;charset=UTF-8');
session_start();
if(@$_SESSION['username']==''){
	header("Location:login.php");
	die();
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
</head>

<frameset cols="250,*" frameborder="no" border="0" framespacing="0">
  <frame name="menu" src="menu.php" frameborder="0" noresize="noresize" scrolling="auto" id="menu" />
  <frame name="main" src="main.php" frameborder="0" noresize="noresize" id="main" />
</frameset>
<noframes></noframes>

</html>
