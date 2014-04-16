<?php
require_once 'checklogin.php';
$do = isset($_REQUEST['do']) ? $_REQUEST['do'] : 'sys';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>后台管理</title>
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
		<script type="text/javascript" src="../static/js/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="../static/js/simpla.jquery.configuration.js"></script>
        <script type="text/javascript" src="../static/js/easyTooltip.js"></script>
        <script type="text/javascript" src="../static/js/formValidator-4.0.1.min.js"></script>
        <script type="text/javascript" src="../static/js/formValidatorRegex.js"></script>
</head>

<body>
	<div id="main-content">
    	<?php
        	include 'qedit.php';
		?>
		<div class="content-box">
				<?php
               		if($do == 'sys'){
					$rs=$db->query("SELECT webname,webkeywords,webdescription,webcopyright,webinfo,qq1,qq2,webtel from config limit 0,1");
					$row = mysql_fetch_array($rs);
				?>
                <!--                            系统设置开始                             -->
				<div class="content-box-header">
					<h3>系统设置</h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
						<form action="do.php?type=sy" method="post" id="form1">
							<fieldset>
								<p>
									<label>网站名称</label>
										<input class="text-input small-input" type="text" name="webname" id="webname" value="<?php echo $row['webname']?>" />
								</p>
								<p>
									<label>网站关键字</label>
									<input class="text-input medium-input" type="text" name="webkeywords" value="<?php echo $row['webkeywords']?>" />
								</p>
								<p>
									<label>网站描述</label>
									<textarea name="webdescription" cols="60" rows="5"><?php echo $row['webdescription']?></textarea>
								</p>
                                <p>
									<label>底部版权信息</label>
									<textarea name="webcopyright" cols="60" rows="5"><?php echo $row['webcopyright']?></textarea>
								</p>
                                <p>
									<label>首页公司简介</label>
									<textarea name="webinfo" cols="60" rows="5"><?php echo $row['webinfo']?></textarea>
								</p>
								<p>
									<label>客服联系电话</label>
										<input class="text-input small-input" type="text" name="webtel" id="webtel" value="<?php echo $row['webtel']?>" />
								</p>
								<p>
									<label>客服1QQ代码</label>
									<textarea name="qq1" cols="60" rows="5"><?php echo $row['qq1']?></textarea>
								</p>
								<p>
									<label>客服2QQ代码</label>
									<textarea name="qq2" cols="60" rows="5"><?php echo $row['qq2']?></textarea>
								</p>
								<p>
									<label>客服3QQ代码</label>
									<textarea name="qq3" cols="60" rows="5"><?php echo $row['qq3']?></textarea>
								</p>
								<p>
									<label>客服4QQ代码</label>
									<textarea name="qq4" cols="60" rows="5"><?php echo $row['qq4']?></textarea>
								</p>
								<p>
									<input class="sbutton" type="submit" value=" 提 交 " />
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div>       
				</div>
                
                <?php
                	}elseif($do == 'newshot'){
					require_once "../module/page.class.php";
				?>
                <!--                            滚动新闻管理开始                             -->
                <div class="content-box-header">
					<h3>首页图片新闻</h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
                    	<table>
							<form method="post" action="do.php?type=nh">
							<thead>
								<tr>
								   <th width="6%"><input class="check-all" type="checkbox" /></th>
								   <th width="12%">所属栏目</th>
								   <th width="46%">文章标题</th>
								   <th width="12%">发布日期</th>
								   <th width="12%">状态</th>
								   <th>操作</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="set">
												<option value="allsz">---- 设置焦点新闻----</option>
												<option value="allqx">---- 取消焦点新闻----</option>
											</select>
											<input class="sbutton" type="submit" value="应用到所选项">
										</div>
										<div class="pages">
                                        	<?php 
											$page = @$_GET["page"];
											if (!$page){
											$pagestart = 0;
											}
											else {
											$pagestart = ($page-1) * 10;
											}
											$rs0=$db->query("SELECT count(distinct nid) FROM news group by nid");
											$Total = @mysql_num_rows($rs0);
											
											pageft($Total,10,1,1,0,5,"",$page);
											
											echo $pagenav;
											?>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							<tbody>
                            	<?php
                                	$rs=$db->query("SELECT * FROM news order by ishot desc,postdate desc limit ".$pagestart.",10");
									while($row = mysql_fetch_array($rs)){
									$query = "SELECT * FROM smallclass where sid='".$row['sid']."'";
									$rs2 = mysql_query($query);
									$row2 = mysql_fetch_array($rs2);
								?>
								<tr>
									<td><input type="checkbox" name="aid[]" value="<?php echo $row['nid']?>" /></td>
									<td><?php echo $row2['sname']?></td>
									<td><a href="<?php echo "/news.php?id=".$row['cid']."&sid=".$row['sid']."&nid=".$row['nid']."";?>" target="_blank"><?php echo $row['title']?></a></td>
									<td><?php echo strftime('%Y-%m-%d',$row['postdate'])?></td>
									<td><?php if($row['ishot']==1){echo "<font color='red'>已设置焦点</font>";}else{echo "正常";}?></td>
									<td>
										<!-- Icons -->
										 <a href="do.php?type=nh&set=szgd&nid=<?php echo $row['nid']?>" class="tooltip" title="将文章设置焦点图片"><img src="resources/images/icons/tick.png" alt="将文章设置焦点图片" /></a>
										 <a href="do.php?type=nh&set=qxgd&nid=<?php echo $row['nid']?>" class="tooltip" title="将文章取消焦点图片"><img src="resources/images/icons/tcross.png" alt="将文章取消焦点图片" /></a>
									</td>
								</tr>
								<?php
                                	}
								?>
							</tbody>
							</form>
						</table>
                    </div>
                </div>
                <?php
                	}elseif($do == 'class'){
					$cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : '';
					$rs=$db->query("SELECT * from class where cid='".$cid."'");
					$row = mysql_fetch_array($rs);
				?>
                <!--                            栏目内容开始                             -->
                <script type="text/javascript" src="../ueditor/editor_config.js"></script>
				<script type="text/javascript" src="../ueditor/editor_all_min.js"></script>
                <link rel="stylesheet" href="../ueditor/themes/default/ueditor.css"/>
                <div class="content-box-header">
					<h3><?php echo $row['classname']?></h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
						<form action="do.php?type=ci" method="post" id="form1">
                        	<input type="hidden" name="cid" value="<?php echo $row['cid']?>" />
							<fieldset>
								<p>
									<label>栏目名称</label>
									<input class="text-input small-input" type="text" name="classname" id="classname" value="<?php echo $row['classname']?>" />
								</p>
								<p>
									<label>栏目导航图片</label>
									<input class="text-input medium-input" type="text" id="classpic" name="classpic" value="<?php echo $row['classpic']?>" /> &nbsp; <a href="upimg.php?xname=classpic" class="various tooltip" title="栏目导航图片，尺寸为944x150" data-fancybox-type="iframe">&gt;&gt;上传图片</a>
								</p>
								<p>
									<label>栏目排序</label>
									<input class="text-input small-input" type="text" name="classorder" value="<?php echo $row['classorder']?>" />
								</p>
                                <?php
                                	if($row['classinfo']!=''){
								?>
                                <p>
									<label>栏目简介</label>
									<textarea name="classinfo" id="myEditor" cols="60" rows="5"><?php echo $row['classinfo']?></textarea>
								</p>
                                 <script type="text/javascript">
									var editor = new baidu.editor.ui.Editor({
										initialStyle: 'body{margin:8px;font-family:"微软雅黑";font-size:13px;color:#666666;line-height:175%}p{text-indent:2em;margin:15px 0;}'
									});
									editor.render("myEditor");
								</script>
                                <?php 
									}
								?>
								<p>
									<input type="hidden" name="url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>" />
									<input class="sbutton" type="submit" value=" 提 交 " />
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div>       
				</div>
                <?php
                	}elseif($do == 'nlist'){
					require_once "../module/page.class.php";
					$sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
					$this_title = isset($_REQUEST['tit']) ? urldecode($_REQUEST['tit']) : '文章管理';
				?>
                <!--                            新闻管理开始                             -->
                <div class="content-box-header">
					<h3><?php echo $this_title?></h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
                    	<table>
							<form method="post" action="do.php?type=nl">
							<thead>
								<tr>
								   <th width="6%"><input class="check-all" type="checkbox" /></th>
								   <th width="13%">所属栏目</th>
								   <th width="52%">文章标题</th>
								   <th width="18%">发布日期</th>
								   <th>操作</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="set">
												<option value="alldel">---- 删除文章 ----</option>
											</select>
											<input class="sbutton" type="submit" value="应用到所选项">
										</div>
										<div class="pages">
                                        	<?php 
											$page = @$_GET["page"];
											if (!$page){
											$pagestart = 0;
											}
											else {
											$pagestart = ($page-1) * 10;
											}
											$rs0=$db->query("SELECT count(distinct nid) FROM news where sid='".$sid."' group by nid");
											$Total = @mysql_num_rows($rs0);
											
											pageft($Total,10,1,1,0,5,"",$page);
											
											echo $pagenav;
											?>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							<tbody>
                            	<?php
                                	$rs=$db->query("SELECT * FROM news where sid='".$sid."' order by postdate desc limit ".$pagestart.",10");
									while($row = mysql_fetch_array($rs)){
									$query = "SELECT * FROM smallclass where sid='".$row['sid']."'";
									$rs2 = mysql_query($query);
									$row2 = mysql_fetch_array($rs2);
								?>
								<tr>
									<td><input type="checkbox" name="aid[]" value="<?php echo $row['nid']?>" /></td>
									<td><?php echo $row2['sname']?></td>
									<td><a href="<?php echo "/news.php?id=".$row['cid']."&sid=".$row['sid']."&nid=".$row['nid']."";?>" target="_blank"><?php echo $row['title']?></a></td>
									<td><?php echo strftime('%Y-%m-%d',$row['postdate'])?></td>
									<td>
										<!-- Icons -->
                                         <a href="main.php?do=editnews&sid=<?php echo $row['sid']?>&nid=<?php echo $row['nid']?>" class="tooltip" title="编辑该篇文章"><img src="resources/images/icons/hammer_screwdriver.png" alt="编辑该文章" /></a>
										 <a onclick="return(confirm('确定删除?'))" href="do.php?type=nl&set=del&nid=<?php echo $row['nid']?>" class="tooltip" title="删除该篇文章"><img src="resources/images/icons/cross.png" alt="删除该文章" /></a>
                                         
									</td>
								</tr>
								<?php
                                	}
								?>
							</tbody>
							</form>
						</table>
                    </div>
                </div>
                <?php
                	}elseif($do == 'flink'){
					require_once "../module/page.class.php";
					$this_title = isset($_REQUEST['tit']) ? urldecode($_REQUEST['tit']) : '友情链接';
				?>
                <!--          友情链接管理开始                             -->
                <div class="content-box-header">
					<h3><?php echo $this_title?></h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
                    	<table>
							<form method="post" action="do.php?type=fl">
							<thead>
								<tr>
								   <th width="6%"><input class="check-all" type="checkbox" /></th>
								   <th width="13%">ID</th>
								   <th width="32%">网站名称</th>
								   <th width="38%">网站地址</th>
								   <th>操作</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="set">
												<option value="alldel">---- 删除链接----</option>
											</select>
											<input class="sbutton" type="submit" value="应用到所选项">
										</div>
										<div class="pages">
                                        	<?php 
											$page = @$_GET["page"];
											if (!$page){
											$pagestart = 0;
											}
											else {
											$pagestart = ($page-1) * 10;
											}
											$rs0=$db->query("SELECT count(distinct id) FROM flink group by id");
											$Total = @mysql_num_rows($rs0);
											
											pageft($Total,10,1,1,0,5,"",$page);
											
											echo $pagenav;
											?>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							<tbody>
                            	<?php
                                	$rs=$db->query("SELECT * FROM flink order by id desc limit ".$pagestart.",10");
									while($row = mysql_fetch_array($rs)){
								?>
								<tr>
									<td><input type="checkbox" name="aid[]" value="<?php echo $row['id']?>" /></td>
									<td><?php echo $row['id']?></td>
									<td><?php echo $row['name']?></td>
									<td><?php echo $row['url']?></td>
									<td>
										<!-- Icons -->
                                         <a href="main.php?do=editlink&id=<?php echo $row['id']?>" class="tooltip" title="编辑该链接"><img src="resources/images/icons/hammer_screwdriver.png" alt="编辑该链接" /></a>
										 <a onclick="return(confirm('确定删除?'))" href="do.php?type=fl&set=del&id=<?php echo $row['id']?>" class="tooltip" title="删除该链接"><img src="resources/images/icons/cross.png" alt="删除该链接" /></a>
									</td>
								</tr>
								<?php
                                	}
								?>
							</tbody>
							</form>
						</table>
                    </div>
                </div>
                <?php
                	}elseif($do == 'addflink' || $do == 'editlink'){
					$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
					$this_title = isset($_REQUEST['tit']) ? urldecode($_REQUEST['tit']) : '编辑友情链接';
					
					if($do == 'editlink'){
						$rs=$db->query("SELECT * from flink where id='".$id."'");
						$row = mysql_fetch_array($rs);
						$name = $row['name'];
						$url =  $row['url'];
						$set = 'edit';
						
					}elseif($do == 'addflink'){
						$name = '';
						$url =  '';
						$set = 'add';

					}
				?>
                <!--                            添加友情链接开始                             -->
                <div class="content-box-header">
					<h3><?php echo $this_title?></h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
						<form action="do.php?type=fc" method="post" id="form1">
							<input type="hidden" name="id" value="<?php echo $id?>" />
                            <input type="hidden" name="set" value="<?php echo $set?>" />
							<fieldset>
								<p>
									<label>网站名称</label>
									<input class="text-input small-input" type="text" name="name" id="name" value="<?php echo $name?>" />
								</p>
								<p>
									<label>网站地址</label>
									<input class="text-input medium-input" type="text" name="url" value="<?php echo $url?>" />
								</p>
								<p>
									<input class="sbutton" type="submit" value=" 提 交 " />
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div>       
				</div>
                <?php
                	}elseif($do == 'addnews' || $do == 'editnews'){
					$sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
					$nid = isset($_REQUEST['nid']) ? $_REQUEST['nid'] : '';
					$this_title = isset($_REQUEST['tit']) ? urldecode($_REQUEST['tit']) : '编辑文章';
					$rs=$db->query("SELECT * from news where nid='".$nid."'");
					$row = mysql_fetch_array($rs);
					if($row['postdate']==0){$row['postdate']=time();}
					if($do == 'editnews'){
						$nid = $row['nid'];
						$title = $row['title'];
						$postdate = $row['postdate'];
						$content =  $row['content'];
						$pic=  $row['pic'];
						$set = 'edit';
						$cid = '';
						
					}elseif($do == 'addnews'){
						$cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : '';
						$title = '';
						$pic = '';
						$postdate = time();
						$content =  '';
						$set = 'add';

					}
				?>
                <!--                            文章页面开始                             -->
                <script type="text/javascript" src="../ueditor/editor_config.js"></script>
				<script type="text/javascript" src="../ueditor/editor_all_min.js"></script>
                <script type="text/javascript" src="../static/js/calendar.js"></script>
                <link rel="stylesheet" href="../ueditor/themes/default/ueditor.css"/>
                <div class="content-box-header">
					<h3><?php echo $this_title?></h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
						<form action="do.php?type=ns" method="post" id="form1">
                        	<input type="hidden" name="nid" value="<?php echo $nid?>" />
                            <input type="hidden" name="cid" value="<?php echo $cid?>" />
                            <input type="hidden" name="sid" value="<?php echo $sid?>" />
                            <input type="hidden" name="set" value="<?php echo $set?>" />
							<fieldset>
								<p>
									<label>文章标题</label>
									<input class="text-input medium-input" type="text" name="title" id="title" value="<?php echo $title?>" />
								</p>
								<p>
									<label>文章缩略图</label>
									<input class="text-input medium-input" type="text" id="pic" name="pic" value="<?php echo $pic?>" /> &nbsp; <a href="upimg.php?xname=pic" class="various tooltip" title="缩略图尺寸请不要超过50KB，没有可以为空。" data-fancybox-type="iframe">&gt;&gt;上传图片</a>
								</p>
								<p>
									<label>发表时间</label>
									<input class="text-input small-input" type="text" name="postdate" id="postdate" value="<?php echo strftime('%Y-%m-%d %X',$postdate)?>" />
                                    <script language="javascript" type="text/javascript">
										var showX = getElementLeft($Obj("postdate")) - 0;
										var showY = (window.navigator.userAgent.indexOf("MSIE") >=1 )? getElementTop($Obj("postdate")) + 0 :  getElementTop($Obj("postdate")) + 0;
										if((window.navigator.userAgent.indexOf("MSIE 7.0") >=1 )) {
											showX = getElementLeft($Obj("postdate"))+105;
											showY = getElementTop($Obj("postdate"))+1200;
										}
										if(window.navigator.userAgent.indexOf("MSIE 6.0")>=1)
										{
											Calendar.setup({
												inputField     :    "postdate",
												ifFormat       :    "%Y-%m-%d %H:%M:%S",
												showsTime      :    true,
												timeFormat     :    "24"
											});
										} else {
											Calendar.setup({
												inputField     :    "postdate",
												ifFormat       :    "%Y-%m-%d %H:%M:%S",
												showsTime      :    true,
												position       :    [showX, showY],
												timeFormat     :    "24"
											});
										}
									 </script>
								</p>
                                <p>
									<label>文章内容</label>
									<textarea name="content" id="myEditor" cols="60" rows="5"><?php echo $content?></textarea>
								</p>
                                 <script type="text/javascript">
									var editor = new baidu.editor.ui.Editor({
										initialStyle: 'body{margin:8px;font-family:"微软雅黑";font-size:13px;color:#666666;line-height:175%}p{text-indent:2em;margin:15px 0;}'
									});
									editor.render("myEditor");
								</script>
								<p>
									<input class="sbutton" type="submit" value=" 提 交 " />
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div>       
				</div>
				
				<?php
                	}elseif($do == 'pro'){
					require_once "../module/page.class.php";
					$this_title = isset($_REQUEST['tit']) ? urldecode($_REQUEST['tit']) : '项目展示管理';
				?>
                <!--                            项目管理开始                             -->
                <div class="content-box-header">
					<h3><?php echo $this_title?></h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
                    	<table>
							<form method="post" action="do.php?type=pl">
							<thead>
								<tr>
								   <th width="6%"><input class="check-all" type="checkbox" /></th>
								   <th width="38%">项目名称</th>
								   <th width="42%">缩略图地址</th>
								   <th>操作</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="4">
										<div class="bulk-actions align-left">
											<select name="set">
												<option value="alldel">---- 删除项目----</option>
											</select>
											<input class="sbutton" type="submit" value="应用到所选项">
										</div>
										<div class="pages">
                                        	<?php 
											$page = @$_GET["page"];
											if (!$page){
											$pagestart = 0;
											}
											else {
											$pagestart = ($page-1) * 10;
											}
											$rs0=$db->query("SELECT count(distinct id) FROM product group by id");
											$Total = @mysql_num_rows($rs0);
											
											pageft($Total,10,1,1,0,5,"",$page);
											
											echo $pagenav;
											?>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							<tbody>
                            	<?php
                                	$rs=$db->query("SELECT * FROM product order by id desc limit ".$pagestart.",10");
									while($row = mysql_fetch_array($rs)){
								?>
								<tr>
									<td><input type="checkbox" name="aid[]" value="<?php echo $row['id']?>" /></td>
									<td><?php echo $row['pname']?></td>
									<td><?php echo $row['purl']?></td>
									<td>
										<!-- Icons -->
                                         <a href="main.php?do=editpro&id=<?php echo $row['id']?>" class="tooltip" title="编辑该项目"><img src="resources/images/icons/hammer_screwdriver.png" alt="编辑该项目" /></a>
										 <a onclick="return(confirm('确定删除?'))" href="do.php?type=pl&set=del&id=<?php echo $row['id']?>" class="tooltip" title="删除该项目"><img src="resources/images/icons/cross.png" alt="删除该项目" /></a>
									</td>
								</tr>
								<?php
                                	}
								?>
							</tbody>
							</form>
						</table>
                    </div>
                </div>
                
                <?php
                	}elseif($do == 'addpro' || $do == 'editpro'){
					$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
					$this_title = isset($_REQUEST['tit']) ? urldecode($_REQUEST['tit']) : '编辑项目';
					$rs=$db->query("SELECT * from product where id='".$id."'");
					$row = mysql_fetch_array($rs);
					
					if($do == 'editpro'){
						$id = $row['id'];
						$pname = $row['pname'];
						$purl = $row['purl'];
						$pinfo =  $row['pinfo'];
						$set = 'edit';
						
					}elseif($do == 'addpro'){
						$id = '';
						$pname = '';
						$purl = '';
						$pinfo =  '';
						$set = 'add';

					}
				?>
                <!--                            项目展示页面开始                             -->
                <script type="text/javascript" src="../ueditor/editor_config.js"></script>
				<script type="text/javascript" src="../ueditor/editor_all_min.js"></script>
                <link rel="stylesheet" href="../ueditor/themes/default/ueditor.css"/>
                <div class="content-box-header">
					<h3><?php echo $this_title?></h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
						<form action="do.php?type=ps" method="post" id="form1">
                        	<input type="hidden" name="id" value="<?php echo $id?>" />
                        	<input type="hidden" name="set" value="<?php echo $set?>" />
							<fieldset>
								<p>
									<label>项目名称</label>
									<input class="text-input medium-input" type="text" name="pname" id="pname" value="<?php echo $pname?>" />
								</p>
								<p>
									<label>项目缩略图</label>
									<input class="text-input medium-input" type="text" id="purl" name="purl" value="<?php echo $purl?>" /> &nbsp; <a href="upimg.php?xname=purl" class="various tooltip" title="缩略图尺寸请不要超过50KB，不能为空！" data-fancybox-type="iframe">&gt;&gt;上传图片</a>
								</p>
                                <p>
									<label>项目介绍</label>
									<textarea name="pinfo" id="myEditor" cols="60" rows="5"><?php echo $pinfo?></textarea>
								</p>
                                 <script type="text/javascript">
									var editor = new baidu.editor.ui.Editor({
										initialStyle: 'body{margin:8px;font-family:"微软雅黑";font-size:13px;color:#666666;line-height:175%}p{text-indent:2em;margin:15px 0;}'
									});
									editor.render("myEditor");
								</script>
								<p>
									<input class="sbutton" type="submit" value=" 提 交 " />
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div>       
				</div>
				
                <?php
                	}elseif($do == 'sclass'){
					require_once "../module/page.class.php";
					$cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : '1';
					$this_title = isset($_REQUEST['tit']) ? urldecode($_REQUEST['tit']) : '子类别管理';
				?>
                <!--                            技术产品管理开始                             -->
                <div class="content-box-header">
					<h3><?php echo $this_title?></h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
                    	<table>
							<form method="post" action="do.php?type=sl">
							<thead>
								<tr>
								   <th width="6%"><input class="check-all" type="checkbox" /></th>
								   <th width="40%">子类别名称</th>
								   <th width="30%">子类别排序</th>
								   <th>操作</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="set">
												<option value="alldel">---- 删除子类别 ----</option>
											</select>
											<input class="sbutton" type="submit" value="应用到所选项">
										</div>
										<div class="pages">
                                        	<?php 
											$page = @$_GET["page"];
											if (!$page){
											$pagestart = 0;
											}
											else {
											$pagestart = ($page-1) * 10;
											}
											$rs0=$db->query("SELECT count(distinct sid) FROM smallclass where cid='".$cid."' group by sid");
											$Total = @mysql_num_rows($rs0);
											
											pageft($Total,10,1,1,0,5,"",$page);
											
											echo $pagenav;
											?>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							<tbody>
                            	<?php
                                	$rs=$db->query("SELECT * FROM smallclass where cid='".$cid."' order by sorder desc limit ".$pagestart.",10");
									while($row = mysql_fetch_array($rs)){
								?>
								<tr>
									<td><input type="checkbox" name="aid[]" value="<?php echo $row['sid']?>" /></td>
									<td><?php echo $row['sname']?></td>
									<td><?php echo $row['sorder']?></td>
									<td>
										<!-- Icons -->
                                          <a href="main.php?do=editsl&cid=<?php echo $row['cid']?>&sid=<?php echo $row['sid']?>" class="tooltip" title="编辑子类别信息"><img src="resources/images/icons/hammer_screwdriver.png" alt="编辑子类别信息" /></a>
										  <a onclick="return(confirm('确定删除?'))" href="do.php?type=sl&set=del&sid=<?php echo $row['sid']?>" class="tooltip" title="删除此子类别"><img src="resources/images/icons/cross.png" alt="删除此子类别" /></a>
                                         
									</td>
								</tr>
								<?php
                                	}
								?>
							</tbody>
							</form>
						</table>
                    </div>
                </div>
                <?php
                	}elseif($do == 'addsl' || $do == 'editsl'){
					$sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
					$this_title = isset($_REQUEST['tit']) ? urldecode($_REQUEST['tit']) : '编辑子类别';
					$rs=$db->query("SELECT * from smallclass where sid='".$sid."'");
					$row = mysql_fetch_array($rs);
					if($do == 'editsl'){
						$sid = $row['sid'];
						$cid = $row['cid'];
						$sname = $row['sname'];
						$sorder =  $row['sorder'];
						$stext =  $row['stext'];
						$set = 'edit';
						
					}elseif($do == 'addsl'){
						$cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : '';
						$sname = '';
						$sorder =  '';
						$stext =  '';
						$set = 'add';

					}
				?>
                <!--                            产品页面开始                             -->
                <script type="text/javascript" src="../ueditor/editor_config.js"></script>
				<script type="text/javascript" src="../ueditor/editor_all_min.js"></script>
                <link rel="stylesheet" href="../ueditor/themes/default/ueditor.css"/>
                <div class="content-box-header">
					<h3><?php echo $this_title?></h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
						<form action="do.php?type=sc" method="post" id="form1">
                            <input type="hidden" name="cid" value="<?php echo $cid?>" />
                            <input type="hidden" name="sid" value="<?php echo $sid?>" />
                            <input type="hidden" name="set" value="<?php echo $set?>" />
							<fieldset>
								<p>
									<label>子类别标题</label>
									<input class="text-input medium-input" type="text" name="sname" id="sname" value="<?php echo $sname?>" />
								</p>
								<p>
									<label>子类别排序</label>
									<input class="text-input small-input" type="text" name="sorder" value="<?php echo $sorder?>" />
								</p>
                                <p>
									<label>子类别内容</label>
									<textarea name="stext" id="myEditor" cols="60" rows="5"><?php echo $stext?></textarea>
								</p>
                                 <script type="text/javascript">
									var editor = new baidu.editor.ui.Editor({
										initialStyle: 'body{margin:8px;font-family:"微软雅黑";font-size:13px;color:#666666;line-height:175%}p{text-indent:2em;margin:15px 0;}'
									});
									editor.render("myEditor");
								</script>
								<p>
									<input class="sbutton" type="submit" value=" 提 交 " />
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div>       
				</div>
                <?php
                	}
				?>
				
	</div>

			
			
    <div id="footer">
         <!-- Remove this notice or replace it with whatever you want -->
                Copyright 2011 shaoxing qingteng All Rights Reserved | <a href="#">返回顶部</a>
        
    </div><!-- End #footer -->
</div>
</body>
</html>