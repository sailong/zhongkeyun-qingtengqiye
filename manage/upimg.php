<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style>
	body {font-size:14px; line-height:1.7em;}
	p {margin:0; padding:0}
	.closebox {font-family: Verdana, Arial, sans-serif;
                display: inline-block;
                background: #459300 url('resources/images/bg-button-green.gif') top left repeat-x !important;
                border: 1px solid #459300 !important;
                padding: 4px 12px 4px 12px !important;
                color: #fff !important;
                font-size: 12px !important;
				text-decoration:none;
				line-height:18px;
                cursor: pointer;
				margin-top:15px;
				-moz-border-radius: 4px;
                -webkit-border-radius: 4px;
				border-radius: 4px;}
	
</style>
</head>

<body>

<?php
$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
$xname = isset($_REQUEST['xname']) ? $_REQUEST['xname'] : '';
?>
<strong style="font-size:16px; line-height:2em;">请选择您要上传的图片：</strong>
<form method="post" action="upimg.php" enctype="multipart/form-data" style="padding:0; margin:0"> 
<table border=0 cellspacing=0 cellpadding=0 align=center width="100%" style="font-size:12px; margin:0 auto"> 
<tr> 
<td width=40 height=60 style="vertical-align:middle"><input type="hidden" name="MAX_FILE_SIZE" value="2000000">文件： </TD> 
<td style="vertical-align:middle"> 
<input name="upfile" type="file" value="浏览" > 
<input name="xname" type="hidden" value="<?php echo $xname?>" />
<input type="submit" value="上传" name="B1" > 
</td> 
</tr> 
</table> 
</form>


<?php

$uptypes=array('image/jpg',  //上传文件类型列表
'image/jpeg',
'image/png',
'image/pjpeg',
'image/gif',
'image/bmp',
'application/x-shockwave-flash',
'image/x-png'); 
$max_file_size=5000000;   //上传文件大小限制, 单位BYTE
$destination_folder="../upload/"; //上传文件路径
$watermark=0;   //是否附加水印(1为加水印,其他为不加水印);
$watertype=1;   //水印类型(1为文字,2为图片)
$waterposition=1;   //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);
$waterstring="newphp.site.cz"; //水印字符串
$waterimg="xplore.gif";  //水印图片
$imgpreview=0;   //是否生成预览图(1为生成,其他为不生成);
$imgpreviewsize=1/2;  //缩略图比例

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		
	if (!is_uploaded_file($_FILES["upfile"]["tmp_name"]))
		  //是否存在文件
		 { 
		 echo "<font color='red'>文件不存在！</font>";
		 exit;
		 }
		 
		$file = $_FILES["upfile"];
		 if($max_file_size < $file["size"])
		 //检查文件大小
		 {
		 echo "<font color='red'>文件太大！</font>";
		 exit;
		   }
		 
		if(!in_array($file["type"], $uptypes))
		 //检查文件类型
		 {
		 echo "<font color='red'>只能上传图像文件或Flash！</font>";
		 exit; 
		}
		 
		if(!file_exists($destination_folder))
		 mkdir($destination_folder);
		 
		$filename=$file["tmp_name"];
		 $image_size = getimagesize($filename); 
		$pinfo=pathinfo($file["name"]);
		 $ftype=$pinfo["extension"];
		 $destination = $destination_folder.time().".".$ftype;
		 if (file_exists($destination) && $overwrite != true)
		 {
			  echo "<font color='red'>同名文件已经存在了！</a>";
			  exit;
		   }
		 
		if(!move_uploaded_file ($filename, $destination))
		 {
			echo "<font color='red'>移动文件出错！</a>";
			  exit;
		   }
		 
		$pinfo=pathinfo($destination);
		$fname=$pinfo["basename"];
		 
		echo " <font color=red>已经成功上传</font><br>文件路径：<input type='text' style='width:70%;color:#0000ff' value='".str_replace('..','',$destination_folder).$fname."' /><br />";
		 echo " 宽度:".$image_size[0];
		 echo " &nbsp; 长度:".$image_size[1];
		 if($watermark==1)
		 {
		 $iinfo=getimagesize($destination,$iinfo);
		 $nimage=imagecreatetruecolor($image_size[0],$image_size[1]);
		 $white=imagecolorallocate($nimage,255,255,255);
		 $black=imagecolorallocate($nimage,0,0,0);
		 $red=imagecolorallocate($nimage,255,0,0);
		 imagefill($nimage,0,0,$white);
		 switch ($iinfo[2])
		 {
		 case 1:
		 $simage =imagecreatefromgif($destination);
		 break;
		 case 2:
		 $simage =imagecreatefromjpeg($destination);
		 break;
		 case 3:
		 $simage =imagecreatefrompng($destination);
		 break;
		 case 6:
		 $simage =imagecreatefromwbmp($destination);
		 break;
		 default:
		 die("<font color='red'>不能上传此类型文件！</a>");
		 exit;
		 }
		 
		imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
		 imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);
		 
		switch($watertype)
		 {
		 case 1:  //加水印字符串
		 imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);
		 break;
		 case 2:  //加水印图片
		 $simage1 =imagecreatefromgif("xplore.gif");
		 imagecopy($nimage,$simage1,0,0,0,0,85,15);
		 imagedestroy($simage1);
		 break;
		 } 
		
		switch ($iinfo[2])
		 {
		 case 1:
		 //imagegif($nimage, $destination);
		 imagejpeg($nimage, $destination);
		 break;
		 case 2:
		 imagejpeg($nimage, $destination);
		 break;
		 case 3:
		 imagepng($nimage, $destination);
		 break;
		 case 6:
		 imagewbmp($nimage, $destination);
		 //imagejpeg($nimage, $destination);
		 break;
		 }
		 
		//覆盖原上传文件
		 imagedestroy($nimage);
		 imagedestroy($simage);
		 }
		 
		if($imgpreview==1)
		 {
		 echo "<br>图片预览:<br>";
		 echo "<a href=\"".$destination."\" target='_blank'><img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);
		 echo " alt=\"图片预览:\r文件名:".$destination."\r上传时间:\" border='0'></a>";
		 }
		 
		 if($xname==''){
		 	echo "<p><a class='closebox' href=\"javascript:parent.jQuery.fancybox.close()\"> 确 认 </a></p>";
		 }
		 else{
		 	echo "<p><a class='closebox' href=\"javascript:parent.jQuery('#".$xname."').val('".str_replace('..','',$destination)."');parent.jQuery.fancybox.close()\"> 确 认 </a></p>";
		 }
}
?>
</body>
</html>
