<?php
require_once 'checklogin.php';
$type = @$_REQUEST["type"];
if(!isset($type) || $type==''){
	die('非法操作！');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" href="resources/css/iframe.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="../static/js/formValidator-4.0.1.min.js"></script>
<script type="text/javascript" src="../static/js/formValidatorRegex.js"></script>
<script>
$(function(){
	$('tbody tr:even').addClass("alt-row"); 
	$('.check-all').click(
		function(){
			$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));   
		}
	);
	$.formValidator.initConfig({formID:"form1",alertMessage:true,onError:function(msg){alert(msg)}});
	$("#password").formValidator().inputValidator({min:1,onError:"旧密码不能为空,请确认"});
	$("#new_password_1").formValidator().inputValidator({min:1,onError:"新密码不能为空,请确认"});
	$("#new_password_2").formValidator().inputValidator({min:1,onError:"重复密码不能为空,请确认"}).compareValidator({desID:"new_password_1",operateor:"=",onError:"2次密码不一致,请确认"});
	$("#title").formValidator().inputValidator({min:1,onError:"标题不能为空,请确认"});
	$("#postdate").formValidator().inputValidator({min:1,onError:"发表日期不能为空,请确认"});
		
})
</script>
</head>
<body>

<?php
// ############################################### 查看简历 ##########################################

	if($type=='jobinfo'){
		$sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
		$xml = simplexml_load_file('../jobs/'.$sid);
?>

	<table class="hrtab" cellspacing="1" cellpadding="0" border="0" width="780" align="center">
					<tr><td>
				<strong>姓　　名</strong>: <font color="red"><?php echo $xml->name;?></font>
				</td><td>
            	<strong>性　　别</strong>: <?php echo $xml->sex;?>
				</td><td>
            	<strong>出生日期</strong>: <?php echo $xml->birthday;?>
				</td></tr>
				<tr><td>
				<strong>民　　族</strong>: <?php echo $xml->nationality;?>
				</td><td>
            	<strong>政治面貌</strong>: <?php echo $xml->political_landscape;?>
				</td><td>
				<strong>婚姻情况</strong>: <?php echo $xml->marital_status;?>
				</td></tr>
            	<tr><td>
            	<strong>籍　　贯</strong>: <?php echo $xml->native_place;?>
				</td><td>
				<strong>户籍地</strong>: <?php echo $xml->registered_residence;?>
				</td><td>
            	<strong>血　　型</strong>: <?php echo $xml->blood_type;?>
				</td></tr>
				<tr><td>
				<strong>应聘职位</strong>: <font color="red"><?php echo $xml->title;?></font>
				</td><td>
            	<strong>身份证</strong>: <?php echo $xml->uid;?>
				</td><td>
				<strong>身高(cm)</strong>: <?php echo $xml->height;?>
				</td></tr>
				<tr><td>
            	<strong>健康状况</strong>: <?php echo $xml->health_condition;?>
				</td><td>
				<strong>职　　称</strong>: <?php echo $xml->positional_title;?>
				</td><td>
            	<strong>毕业院校</strong>: <?php echo $xml->graduate_school;?>
				</td></tr>
				<tr><td>
            	<strong>专　　业</strong>: <?php echo $xml->specialty;?>
				</td><td>
				<strong>学　　历</strong>: <?php echo $xml->degrees;?>
				</td><td>
            	<strong>英语水平</strong>: <?php echo $xml->english_level;?>
				</td></tr>
				<tr><td>
				<strong>联系电话</strong>: <font color="red"><?php echo $xml->tel;?></font>
				</td><td>
            	<strong>邮　　编</strong>: <?php echo $xml->postal_code;?>
				</td><td>
            	<strong>E-Mail　</strong>: <font color="red"><?php echo $xml->email;?></font>
				</td></tr>
				<tr><td colspan="3">
				<strong>现住址　</strong>:	<?php echo $xml->current_address;?>
				</td></tr>
				<tr><td colspan="3">
            	<strong>根据你对公司及职位的了解，请简要描述你对所应聘职位的工作设想:</strong>
            	<br />
                <?php echo $xml->plans;?>
				</td></tr>
				<tr><td colspan="1">
				<strong>期望薪酬</strong>: <?php echo $xml->expectation_of_salary;?> 元/月（税前）
				
				</td><td colspan="2">
            	<strong>最低可接受</strong>: <?php echo $xml->minimum_acceptable_salary;?> 元/月（税前）
				
				</td></tr>
				<tr><td colspan="3">
            	<strong>自我评价</strong>:
            	<br />
				<?php echo $xml->self_evaluation;?>
				</td></tr>
				<tr><td colspan="3">
            	<strong>特长及爱好</strong>:
            	<br />
				<?php echo $xml->interests_expertise;?>
				</td></tr>
				<tr><td colspan="3">
            	<strong>有无重大疾病、传染病病史</strong>: <?php echo $xml->has_disease_history;?>
            	<strong>何种疾病</strong>: <?php echo $xml->disease;?>
				
				</td></tr>
				<tr><td colspan="3">
            	<strong>是否有亲属或熟人在公司任职</strong>: <?php echo $xml->has_relatives;?>
            	<strong>如有：请列姓名、关系与部门</strong>: <?php echo $xml->relatives;?>
				
				</td></tr>
				<tr><td colspan="3">
				<br />

							<table width="100%">
								<legend style="font-weight: bold">学习经历</legend>
								<tr>
									<td><strong>起止时间</strong></td><td><strong>毕业院校</strong></td><td><strong>学历</strong></td><td><strong>专业</strong></td>
								</tr>
								
								<tr>
									 <td width="25%"><?php echo $xml->period_0;?></td>
									 <td width="25%"><?php echo $xml->graduate_school_0;?></td>
									 <td width="25%"><?php echo $xml->degrees_0;?></td>
									 <td width="25%"><?php echo $xml->specialty_0;?></td>
									
								</tr>
								
								<tr>
									 <td><?php echo $xml->period_1;?></td>
									 <td><?php echo $xml->graduate_school_1;?></td>
									 <td><?php echo $xml->degrees_1;?></td>
									 <td><?php echo $xml->specialty_1;?></td>
									
								</tr>
								
								<tr>
									 <td><?php echo $xml->period_2;?></td>
									 <td><?php echo $xml->graduate_school_2;?></td>
									 <td><?php echo $xml->degrees_2;?></td>
									 <td><?php echo $xml->specialty_2;?></td>
									
								</tr>
								
								<tr>
									 <td><?php echo $xml->period_3;?></td>
									 <td><?php echo $xml->graduate_school_3;?></td>
									 <td><?php echo $xml->degrees_3;?></td>
									 <td><?php echo $xml->specialty_3;?></td>
									
								</tr>
								
							</table>

				</td></tr>
				<tr><td colspan="3">
							<table width="100%">
								<legend style="font-weight: bold">工作经历</legend>
								<tr>
									<td><strong>起止时间</strong></td><td><strong>单位名称</strong></td><td><strong>岗位名称</strong></td><td><strong>离职原因/证明人/电话</strong></td>
								</tr>
								
								<tr>
									 <td width="25%"><?php echo $xml->periodtime_0;?></td>
									 <td width="25%"><?php echo $xml->organization_0;?></td>
									 <td width="25%"><?php echo $xml->position_0;?></td>
									 <td width="25%"><?php echo $xml->reason_to_leave_0;?></td>
									
								</tr>
								
								<tr>
									 <td><?php echo $xml->periodtime_1;?></td>
									 <td><?php echo $xml->organization_1;?></td>
									 <td><?php echo $xml->position_1;?></td>
									 <td><?php echo $xml->reason_to_leave_1;?></td>
									
								</tr>
								
								<tr>
									 <td><?php echo $xml->periodtime_2;?></td>
									 <td><?php echo $xml->organization_2;?></td>
									 <td><?php echo $xml->position_2;?></td>
									 <td><?php echo $xml->reason_to_leave_2;?></td>
									
								</tr>
								
								<tr>
									 <td><?php echo $xml->periodtime_3;?></td>
									 <td><?php echo $xml->organization_3;?></td>
									 <td><?php echo $xml->position_3;?></td>
									 <td><?php echo $xml->reason_to_leave_3;?></td>
									
								</tr>
								
							</table>

				</td></tr>
				<tr><td colspan="3">							
							<table width="100%">
								<legend style="font-weight: bold">培训经历</legend>
								<tr>
									<td><strong>起止时间</strong></td><td><strong>培训内容</strong></td><td><strong>培训地点</strong></td><td><strong>证书情况</strong></td>
								</tr>
								
								<tr>
									 <td width="25%"><?php echo $xml->periodpx_0;?></td>
									 <td width="25%"><?php echo $xml->training_0;?></td>
									 <td width="25%"><?php echo $xml->addr_0;?></td>
									 <td width="25%"><?php echo $xml->certification_0;?></td>
									
								</tr>
								
								<tr>
									 <td><?php echo $xml->periodpx_1;?></td>
									 <td><?php echo $xml->training_1;?></td>
									 <td><?php echo $xml->addr_1;?></td>
									 <td><?php echo $xml->certification_1;?></td>
									
								</tr>
								
								<tr>
									 <td><?php echo $xml->periodpx_2;?></td>
									 <td><?php echo $xml->training_2;?></td>
									 <td><?php echo $xml->addr_2;?></td>
									 <td><?php echo $xml->certification_2;?></td>
									
								</tr>
								
								<tr>
									 <td><?php echo $xml->periodpx_3;?></td>
									 <td><?php echo $xml->training_3;?></td>
									 <td><?php echo $xml->addr_3;?></td>
									 <td><?php echo $xml->certification_3;?></td>
									
								</tr>
								
							</table>

				</td></tr>
				<tr><td colspan="3">
							<table width="100%">
								<legend style="font-weight: bold">家庭情况</legend>
								<tr> 	 	 	 	
									<td><strong>姓 名</strong></td><td><strong>出生年月</strong><br /><span style="font-size: smaller">格式：2012-03-15</span></td><td><strong>与本人关系</strong></td><td><strong>工作单位及职务名称</strong></td><td><strong>户籍</strong></td>
								</tr>
								
								<tr>
									 <td width="20%"><span style="font-size: smaller"></span><?php echo $xml->name_0;?></td>
									 <td width="20%"><span style="font-size: smaller"></span><?php echo $xml->birthday_0;?></td>
									 <td width="20%"><span style="font-size: smaller"></span><?php echo $xml->relationship_0;?></td>
									 <td width="20%"><span style="font-size: smaller"></span><?php echo $xml->jobs_information_0;?></td>

									 <td width="20%"><span style="font-size: smaller"></span><?php echo $xml->registered_residence_0;?></td>
									
								</tr>
								
								<tr>
									 <td><span style="font-size: smaller"></span><?php echo $xml->name_1;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->birthday_1;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->relationship_1;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->jobs_information_1;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->registered_residence_1;?></td>
									
								</tr>
								
								<tr>
									 <td><span style="font-size: smaller"></span><?php echo $xml->name_2;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->birthday_2;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->relationship_2;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->jobs_information_2;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->registered_residence_2;?></td>
									
								</tr>
								
								<tr>
									 <td><span style="font-size: smaller"></span><?php echo $xml->name_3;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->birthday_3;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->relationship_3;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->jobs_information_3;?></td>
									 <td><span style="font-size: smaller"></span><?php echo $xml->registered_residence_3;?></td>
									
								</tr>
								
							</table>

				</td></tr>
				<tr><td colspan="3">
							<strong>应 聘 人 承 诺 / 声 明 </strong>
                      <ol >
                        <li>本人恪守诚信，无以下不良状况：⑴正在接受刑法处罚；⑵正在被国家司法机关通缉；⑶因财产犯罪曾被追究刑事责任；⑷因品行恶劣曾被行政处罚；⑸患有精神病或严重传染病；⑹有酗酒、吸毒、暴力等不良嗜好； </li>
                        <li>本人授权公司向本人曾任职的雇主查询所有记录； </li>
                        <li>本人保证以上填写的全部信息完全真实，如有隐瞒或被证明其中有虚假成分，本人愿意承担全部责任，同时公司有权因此单方解除劳动合同。 </li>
                      </ol>
                      
				</td></tr>
				<tr><td style="padding:20px 8px"> 
                <strong>签名:</strong> <?php echo $xml->sign_name;?>
				</td><td colspan="2">
            	<strong>申请日期:</strong> <?php echo $xml->sign_date;?>
				</td></tr>

					
				</table>

<?php
	}elseif($type=='addnews'){
	// ############################################### 添加新闻 ##########################################
?>
	
                <link rel="stylesheet" href="../ueditor/themes/default/ueditor.css"/>
					<div class="tab-content">
						<form action="do.php?type=ns" method="post" id="form1">
                        	<input type="hidden" name="cid" value="6" />
                            <input type="hidden" name="set" value="add_ajax" />
							<fieldset>
								<p>
									<label>文章标题</label>
									<input class="text-input medium-input" type="text" name="title" id="title" value="" />
								</p>
								<p>
                                	<label>所属类别</label>
                                   <select name="sid">
                                   	<option value="19">公司动态</option>
                                   	<option value="20">行业新闻</option>
                                    <option value="21">政策法规</option>
                                   </select>
                                   &nbsp;
									<label>发表时间</label>
									<input class="text-input small-input" type="text" name="postdate" id="postdate" value="<?php echo strftime('%Y-%m-%d %X',time())?>" />
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
									<textarea name="content" id="myEditor" cols="60" rows="5"></textarea>
								</p>
                                <script type="text/javascript" src="../ueditor/editor_config.js"></script>
				<script type="text/javascript" src="../ueditor/editor_all_min.js"></script>
                <script type="text/javascript" src="../static/js/calendar.js"></script>
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
<?php
	}elseif($type=='jobs'){
	// ############################################### 应聘简历管理 ##########################################
?>
	<div class="tab-content">
                    	<table>
							<form method="post" action="do.php?type=jl">
							<thead>
								<tr>
								   <th width="6%"><input class="check-all" type="checkbox" /></th>
								   <th width="16%">应聘者姓名</th>
								   <th width="20%">电话</th>
                                   <th width="20%">应聘职位</th>
                                   <th width="24%">提交日期</th>
								   <th>操作</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="set">
												<option value="alldel">---- 删除简历 ----</option>
											</select>
											<input class="sbutton" type="submit" value="应用到所选项">
										</div>
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							<tbody>
                            	<?php
                                	$dir = "../jobs/";
									$list = scandir($dir);
									foreach($list as $file){
										$match = ".xml";
										if(ereg($match,$file)){
											$xml = simplexml_load_file($dir.$file)
								?>
								<tr>
									<td><input type="checkbox" name="aid[]" value="<?php echo $file;?>" /></td>
									<td><?php echo $xml->name;?></td>
									<td><?php echo $xml->tel;?></td>
                                    <td><?php echo $xml->title;?></td>
                                    <td><?php echo strftime('%Y-%m-%d %X',filectime($dir.$file));?></td>
									<td>
										<!-- Icons -->
                                          <a href="ajax.php?type=jobinfo&sid=<?php echo $file;?>" target="_blank" title="查看用户简历"><img src="resources/images/icons/search.png" alt="查看用户简历" /></a>
										  <a onclick="return(confirm('确定删除?'))" href="do.php?type=jl&set=del&sid=<?php echo $file;?>" title="删除此封简历"><img src="resources/images/icons/cross.png" alt="删除此封简历" /></a>
                                         
									</td>
								</tr>
								<?php
										}
                                	}
								?>
							</tbody>
							</form>
						</table>
                    </div>
<?php
	}elseif($type=='contact'){
	$rs=$db->query("SELECT webcontact from config limit 0,1");
	$row = mysql_fetch_array($rs);
	// ############################################### 首页联系方式管理 ##########################################
?>
	<script type="text/javascript" src="../ueditor/editor_config.js"></script>
				<script type="text/javascript" src="../ueditor/editor_all_min.js"></script>
                <link rel="stylesheet" href="../ueditor/themes/default/ueditor.css"/>
					<div class="tab-content">
						<form action="do.php?type=qedit" method="post">
                            <input type="hidden" name="set" value="contact" />
							<fieldset>
                                <p>
									<textarea name="webcontact" id="myEditor" cols="60" rows="5"><?php echo $row["webcontact"];?></textarea>
								</p>
                                 <script type="text/javascript">
									var editor = new baidu.editor.ui.Editor({
										initialStyle: 'body{margin:8px;font-family:"微软雅黑";font-size:13px;color:#666666;line-height:175%}.tel{font-size:18px; color:#60a105; line-height:28px}'
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
<?php
	}elseif($type=='editclass'){
	// ############################################### 栏目管理 ##########################################
?>
					<div class="tab-content">
                    	<table>
							<thead>
								<tr>
								   <th width="18%">栏目名称</th>
								   <th width="40%">栏目导航图</th>
                                   <th width="18%">栏目排序</th>
								   <th>操作</th>
								</tr>
							</thead>
							<tbody>
                            	<?php
                                	$rs=$db->query("SELECT * FROM class order by classorder");
									while($row = mysql_fetch_array($rs)){
								?>
                                <form method="post" action="do.php?type=qedit">
                                <input type="hidden" name="set" value="class" />
                                <input type="hidden" name="cid" value="<?php echo $row["cid"];?>" />
								<tr>
									<td><input class="text-input" type="text" name="classname" value="<?php echo $row["classname"];?>" /></td>
									<td><input class="text-input" style="width:90%" type="text" name="classpic" value="<?php echo $row["classpic"];?>" /></td>
                                    <td><input class="text-input" type="text" name="classorder" value="<?php echo $row["classorder"];?>" /></td>
                                    <td><input class="sbutton" type="submit" value="提交修改" /></td>
								</tr>
                                </form>
								<?php
                                	}
								?>
							</tbody>
						</table>
                    </div>
<?php
	}elseif($type=='password'){
	// ############################################### 修改后台密码 ##########################################
?>
	<div class="tab-content">
						<form action="do.php?type=qedit" method="post" id="form1">
                            <input type="hidden" name="set" value="password" />
							<fieldset>
                                <p>
									<label>&nbsp;&nbsp;管理员旧密码：</label> <input class="text-input" type="password" name="password" id="password" value="" />
								</p>
                                <p>
									<label>&nbsp;&nbsp;请输入新密码：</label> <input class="text-input" type="password" name="new_password_1" id="new_password_1" value="" />
								</p>
                                <p>
									<label>再次输入新密码：</label> <input class="text-input" type="password" name="new_password_2" id="new_password_2" value="" />
								</p>
								<p>
									<span style="padding-left:9em;"><input class="sbutton" type="submit" value=" 提 交 " /></span>
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div> 
<?php
	}
?>

</body>
</html>