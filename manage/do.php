<?php
require_once 'checklogin.php';
$type = @$_REQUEST["type"];
if(!isset($type) || $type==''){
	die('非法操作！');
}

// ############################################### 系统设置 ##########################################
if($type=='sy'){
	$webname = isset($_POST['webname']) ? $_POST['webname'] : '';
	$webkeywords = isset($_POST['webkeywords']) ? $_POST['webkeywords'] : '';
	$webdescription = isset($_POST['webdescription']) ? $_POST['webdescription'] : '';
	$webcopyright = isset($_POST['webcopyright']) ? $_POST['webcopyright'] : '';
	$webinfo = isset($_POST['webinfo']) ? $_POST['webinfo'] : '';
	$qq1 = isset($_POST['qq1']) ? $_POST['qq1'] : '';
	$qq2 = isset($_POST['qq2']) ? $_POST['qq2'] : '';
	$qq3 = isset($_POST['qq3']) ? $_POST['qq3'] : '';
	$qq4 = isset($_POST['qq4']) ? $_POST['qq4'] : '';
	$webtel = isset($_POST['webtel']) ? $_POST['webtel'] : '';
	$rs=$db->query("UPDATE config SET webname='$webname',webkeywords='$webkeywords',webdescription='$webdescription',webcopyright='$webcopyright',webinfo='$webinfo',qq1='$qq1',qq2='$qq2',qq3='$qq3',qq4='$qq4',webtel='$webtel' where sid=1");
	echo "<script>alert('操作成功！');window.history.go(-1);</script>";
}


// ############################################### 首页焦点轮播图管理 ##########################################
if($type=='ph'){
	$picchange1 = isset($_POST['picchange1']) ? $_POST['picchange1'] : '';
	$picchange1_s = isset($_POST['picchange1_s']) ? $_POST['picchange1_s'] : '';
	$picchange2 = isset($_POST['picchange2']) ? $_POST['picchange2'] : '';
	$picchange2_s = isset($_POST['picchange2_s']) ? $_POST['picchange2_s'] : '';
	$picchange3 = isset($_POST['picchange3']) ? $_POST['picchange3'] : '';
	$picchange3_s = isset($_POST['picchange3_s']) ? $_POST['picchange3_s'] : '';
	$rs=$db->query("UPDATE config SET picchange1='$picchange1',picchange1_s='$picchange1_s',picchange2='$picchange2',picchange2_s='$picchange2_s',picchange3='$picchange3',picchange3_s='$picchange3_s' where sid=1");
	echo "<script>alert('操作成功！');window.history.go(-1);</script>";
}


// ############################################### 滚动新闻管理 ##########################################
if($type=='nh'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'allsz';
	$aid = isset($_POST['aid']) ? $_POST['aid'] : '';
	$nid = isset($_REQUEST['nid']) ? $_REQUEST['nid'] : '';
	if($set=='szgd'){
		$rs=$db->query("UPDATE news SET ishot = '1' where nid = '".$nid."'");
		echo "<script>alert('文章设置滚动成功！');window.history.go(-1);</script>";
	}
	if($set=='qxgd'){
		$rs=$db->query("UPDATE news SET ishot = '0' where nid = '".$nid."'");
		echo "<script>alert('文章取消滚动成功！');window.history.go(-1);</script>";
	}
	if($set=='allsz'){
		if($aid>0){
			foreach($aid as $n){
			$rs=$db->query("UPDATE news SET ishot = '1' where nid = '".$n."'");
			echo "<script>alert('文章设置滚动成功！');window.history.go(-1);</script>";
			}
		}else{
			echo "<script>alert('请至少选择一篇文章！');window.history.go(-1);</script>";
		}
	}
	if($set=='allqx'){
		if($aid>0){
			foreach($aid as $n){
			$rs=$db->query("UPDATE news SET ishot = '0' where nid = '".$n."'");
			echo "<script>alert('文章取消滚动成功！');window.history.go(-1);</script>";
			}
		}else{
			echo "<script>alert('请至少选择一篇文章！');window.history.go(-1);</script>";
		}
	}
}


// ############################################### 栏目内容设置 ##########################################
if($type=='ci'){
	$classname = isset($_POST['classname']) ? $_POST['classname'] : '';
	$classpic = isset($_POST['classpic']) ? $_POST['classpic'] : '';
	$classorder = isset($_POST['classorder']) ? $_POST['classorder'] : '';
	$classinfo = isset($_POST['classinfo']) ? $_POST['classinfo'] : '';
	$url = isset($_POST['url']) ? $_POST['url'] : '';
	$cid = isset($_POST['cid']) ? $_POST['cid'] : '';
	$rs=$db->query("UPDATE class SET classname='$classname',classpic='$classpic',classorder='$classorder',classinfo='$classinfo' where cid='".$cid."'");
	echo "<script>alert('操作成功！');self.location='".$url."';</script>";
}

// ############################################### 文章列表管理 ##########################################
if($type=='nl'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'alldel';
	$aid = isset($_POST['aid']) ? $_POST['aid'] : '';
	$nid = isset($_REQUEST['nid']) ? $_REQUEST['nid'] : '';
	
	if($set=='del'){
		$rs=$db->query("delete from news where nid = '".$nid."'");
		echo "<script>alert('删除文章成功！');window.history.go(-1);</script>";
	}
	if($set=='alldel'){
		if($aid>0){
			foreach($aid as $n){
			$rs=$db->query("delete from news where nid = '".$n."'");
			}
			echo "<script>alert('删除文章成功！');window.history.go(-1);</script>";
		}else{
			echo "<script>alert('请至少选择一篇文章！');window.history.go(-1);</script>";
		}
	}
}

// ############################################### 项目展示列表管理 ##########################################
if($type=='pl'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'alldel';
	$aid = isset($_POST['aid']) ? $_POST['aid'] : '';
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	
	if($set=='del'){
		$rs=$db->query("delete from product where id = '".$id."'");
		echo "<script>alert('删除项目成功！');window.history.go(-1);</script>";
	}
	if($set=='alldel'){
		if($aid>0){
			foreach($aid as $n){
			$rs=$db->query("delete from product where id = '".$n."'");
			}
			echo "<script>alert('删除项目成功！');window.history.go(-1);</script>";
		}else{
			echo "<script>alert('请至少选择一个项目！');window.history.go(-1);</script>";
		}
	}
}

// ############################################### 项目管理 ##########################################
if($type=='ps'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'add';
	$pname = $_POST['pname'];
	$pinfo = $_POST['pinfo'];
	$purl = $_POST['purl'];
	if(!isset($pname) || $pname == ''){
		echo "<script>alert('项目名称不能为空！');window.history.go(-1);</script>";
		die();
	}
	if(!isset($purl) || $purl == ''){
		echo "<script>alert('项目缩略图不能为空！');window.history.go(-1);</script>";
		die();
	}

	
	if($set=='add'){
		$rs=$db->query("insert into product (pname,pinfo,purl) values ('$pname','$pinfo','$purl')");
		echo "<script>alert('操作成功！');window.location.href='main.php?do=pro';</script>";
	}
	
	if($set=='edit'){
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		$rs=$db->query("UPDATE product SET pname='$pname',pinfo='$pinfo',purl='$purl' where id='".$id."'");
		echo "<script>alert('操作成功！');window.history.go(-1);</script>";
	}
}


// ############################################### 文章管理 ##########################################
if($type=='ns'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'add';
	$title = $_POST['title'];
	$postdate = GetMkTime($_POST['postdate']);
	$content = $_POST['content'];
	$pic = isset($_POST['pic']) ? $_POST['pic'] : '';
	if(!isset($title) || $title == ''){
		echo "<script>alert('标题不能为空！');window.history.go(-1);</script>";
		die();
	}
	if(!isset($content) || $content == ''){
		echo "<script>alert('文章内容不能为空！');window.history.go(-1);</script>";
		die();
	}

	
	if($set=='add' or $set=='add_ajax'){
		$cid = isset($_POST['cid']) ? $_POST['cid'] : '2';
		$sid = isset($_POST['sid']) ? $_POST['sid'] : '9';
		$rs=$db->query("insert into news (cid,sid,title,content,postdate,pic) values ('$cid','$sid','$title','$content','$postdate','$pic')");
		if($set=='add_ajax'){
			echo "<script>alert('操作成功！');parent.jQuery.fancybox.close();</script>";
		}else{
			echo "<script>alert('操作成功！');window.location.href='main.php?do=nlist&sid=".$sid."';</script>";
		}
	}
	
	if($set=='edit'){
		$nid = isset($_POST['nid']) ? $_POST['nid'] : '';
		$rs=$db->query("UPDATE news SET title='$title',content='$content',postdate='$postdate',pic='$pic' where nid='".$nid."'");
		echo "<script>alert('操作成功！');window.history.go(-1);</script>";
	}
}



// ############################################### 二级分类列表管理 ##########################################
if($type=='sl'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'alldel';
	$aid = isset($_POST['aid']) ? $_POST['aid'] : '';
	$sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';

	
	if($sid==24 or in_array(24,$aid)){
		echo "<script>alert('该栏目是招聘岗位栏目，不能删除！');window.history.go(-1);</script>";
		die;
	}
	
	if($set=='del'){
		$rs=$db->query("delete from smallclass where sid = '".$sid."'");
		echo "<script>alert('删除成功！');window.history.go(-1);</script>";
	}
	if($set=='alldel'){
		if($aid>0){
			foreach($aid as $n){
			$rs=$db->query("delete from smallclass where sid = '".$n."'");
			}
			echo "<script>alert('删除成功！');window.history.go(-1);</script>";
		}else{
			echo "<script>alert('请至少选择一个！');window.history.go(-1);</script>";
		}
	}
}

// ############################################### 二级分类管理 ##########################################
if($type=='sc'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'add';
	$sname = $_POST['sname'];
	$sorder = isset($_POST['sorder']) ? $_POST['sorder'] : '0';
	$stext = $_POST['stext'];
	$cid = isset($_POST['cid']) ? $_POST['cid'] : '4';
	if(!isset($sname) || $sname == ''){
		echo "<script>alert('产品名称不能为空！');window.history.go(-1);</script>";
		die();
	}
	if(!isset($stext) || $stext == ''){
		echo "<script>alert('文章内容不能为空！');window.history.go(-1);</script>";
		die();
	}
	if($set=='add'){
		$rs=$db->query("insert into smallclass (sname,cid,sorder,stext) values ('$sname','$cid','$sorder','$stext')");
		echo "<script>alert('操作成功！');window.history.go(-1);</script>";
	}
	if($set=='edit'){
		$sid = isset($_POST['sid']) ? $_POST['sid'] : '1';
		$rs=$db->query("UPDATE smallclass SET sname='$sname',cid='$cid',sorder='$sorder',stext='$stext' where sid='".$sid."'");
		echo "<script>alert('操作成功！');window.history.go(-1);</script>";
	}
	
}


// ############################################### 友情链接管理 ##########################################
if($type=='fc'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'add';
	$name = $_POST['name'];
	$url = $_POST['url'];
	if(!isset($name) || $name == ''){
		echo "<script>alert('网站名称不能为空！');window.history.go(-1);</script>";
		die();
	}
	if(!isset($url) || $url == ''){
		echo "<script>alert('网站地址不能为空！');window.history.go(-1);</script>";
		die();
	}
	if($set=='add'){
		$rs=$db->query("insert into flink (name,url) values ('$name','$url')");
		echo "<script>alert('操作成功！');window.history.go(-1);</script>";
	}
	if($set=='edit'){
		$id = isset($_POST['id']) ? $_POST['id'] : '1';
		$rs=$db->query("UPDATE flink SET name='$name',url='$url' where id='".$id."'");
		echo "<script>alert('操作成功！');window.history.go(-1);</script>";
	}
	
}

// ############################################### 友情链接列表管理 ##########################################
if($type=='fl'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'alldel';
	$aid = isset($_POST['aid']) ? $_POST['aid'] : '';
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	
	if($set=='del'){
		$rs=$db->query("delete from flink where id = '".$id."'");
		echo "<script>alert('删除链接成功！');window.history.go(-1);</script>";
	}
	if($set=='alldel'){
		if($aid>0){
			foreach($aid as $n){
			$rs=$db->query("delete from flink where id = '".$n."'");
			}
			echo "<script>alert('删除链接成功！');window.history.go(-1);</script>";
		}else{
			echo "<script>alert('请至少选择一条链接！');window.history.go(-1);</script>";
		}
	}
}

// ############################################### 应聘简历管理 ##########################################
if($type=='jl'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'del';
	$aid = isset($_POST['aid']) ? $_POST['aid'] : '';
	$sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
	if($set=='del'){
		$result = @unlink("../jobs/".$sid);
		if ($result == false) {
		echo "<script>alert('无法删除，无权限操作！');window.history.go(-1);</script>";
		}else{
		echo "<script>alert('删除简历成功！');window.history.go(-1);</script>";
		}
	}
	if($set=='alldel'){
		if($aid>0){
			foreach($aid as $n){
				$result = @unlink("../jobs/".$n);
				if ($result == false) {
				echo "<script>alert('无法删除，无权限操作！');window.history.go(-1);</script>";
				}else{
				echo "<script>alert('删除简历成功！');window.history.go(-1);</script>";
				}
			}
		}else{
			echo "<script>alert('请至少选择一封简历！');window.history.go(-1);</script>";
		}
	}
	
}

// ############################################### 快速编辑 ##########################################
if($type=='qedit'){
	$set = isset($_REQUEST['set']) ? $_REQUEST['set'] : 'contact';
	if($set=='contact'){
		$webcontact = isset($_POST['webcontact']) ? $_POST['webcontact'] : '';
		$rs=$db->query("UPDATE config SET webcontact='$webcontact' where sid=1");
		echo "<script>alert('操作成功！');window.history.go(-1);</script>";
	}
	if($set=='class'){
		$classname = isset($_POST['classname']) ? $_POST['classname'] : '';
		$classpic = isset($_POST['classpic']) ? $_POST['classpic'] : '';
		$classorder = isset($_POST['classorder']) ? $_POST['classorder'] : '0';
		$cid = isset($_POST['cid']) ? $_POST['cid'] : '1';
		if($classname==''){
			echo "<script>alert('对不起，栏目名称不能为空！');window.history.go(-1);</script>";
			die();
		}
		if($classpic==''){
			echo "<script>alert('对不起，栏目导航图不能为空！');window.history.go(-1);</script>";
			die();
		}
		$rs=$db->query("UPDATE class SET classname='$classname',classpic='$classpic',classorder='$classorder' where cid='".$cid."'");
		echo "<script>alert('操作成功！');window.history.go(-1);</script>";
	}
	if($set=='password'){
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$new_password_1 = isset($_POST['new_password_1']) ? $_POST['new_password_1'] : '';
		$new_password_2 = isset($_POST['new_password_2']) ? $_POST['new_password_2'] : '';
		if($password==''){
			echo "<script>alert('对不起，管理员旧密码不能为空！');window.history.go(-1);</script>";
			die();
		}
		if($new_password_1==''){
			echo "<script>alert('对不起，新密码不能为空！');window.history.go(-1);</script>";
			die();
		}
		$password = md5($password);
		$new_password_1 = md5($new_password_1);
		$new_password_2 = md5($new_password_2);
		if($new_password_1 !== $new_password_2){
			echo "<script>alert('两次密码输入不相同！');window.history.go(-1);</script>";
			die();
		}
		$rs=$db->query("SELECT password from manager where id=1");
		$row = mysql_fetch_array($rs);
		if($row["password"]!== $password){
			echo "<script>alert('对不起，旧密码输入不对！');window.history.go(-1);</script>";
			die();
		}else{
			$rs2=$db->query("UPDATE manager SET password='$new_password_1' where id=1");
			echo "<script>alert('操作成功！');parent.jQuery.fancybox.close();</script>";
		}
	}
}



/********************格式化日期时间**********************/
function GetMkTime($dtime)
{
	if(!ereg("[^0-9]",$dtime)) return $dtime;
	$dt = Array(1970,1,1,0,0,0);
	$dtime = ereg_replace("[\r\n\t]|日|秒"," ",$dtime);
	$dtime = str_replace("年","-",$dtime);
	$dtime = str_replace("月","-",$dtime);
	$dtime = str_replace("时",":",$dtime);
	$dtime = str_replace("分",":",$dtime);
	$dtime = trim(ereg_replace("[ ]{1,}"," ",$dtime));
	$ds = explode(" ",$dtime);
	$ymd = explode("-",$ds[0]);
	if(isset($ymd[0])) $dt[0] = $ymd[0];
	if(isset($ymd[1])) $dt[1] = $ymd[1];
	if(isset($ymd[2])) $dt[2] = $ymd[2];
	if(strlen($dt[0])==2) $dt[0] = '20'.$dt[0];
	if(isset($ds[1])){
		$hms = explode(":",$ds[1]);
		if(isset($hms[0])) $dt[3] = $hms[0];
		if(isset($hms[1])) $dt[4] = $hms[1];
		if(isset($hms[2])) $dt[5] = $hms[2];
	}
  foreach($dt as $k=>$v){
  	$v = ereg_replace("^0{1,}","",trim($v));
  	if($v=="") $dt[$k] = 0;
  }
	$mt = @mktime($dt[3],$dt[4],$dt[5],$dt[1],$dt[2],$dt[0]);
	if($mt>0) return $mt;
	else return mytime();
}

?>