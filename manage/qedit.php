<?php
require_once 'checklogin.php';
?>
<ul class="shortcut-buttons-set">
				
                <li><a class="shortcut-button nor-button" href="javascript:void(0)"><span>快速编辑</span></a></li>
                
				<li><a class="shortcut-button ajax" href="ajax.php?type=addnews"  data-fancybox-type="iframe" title="添加新闻"><span>
					<img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
					添加新闻
				</span></a></li>
				
				<li><a class="shortcut-button ajax" href="ajax.php?type=editclass"  data-fancybox-type="iframe" title="栏目管理"><span>
					<img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					栏目管理
				</span></a></li>
                
                <li><a class="shortcut-button" href="main.php?do=pro&tit=<?php echo urlencode('项目展示管理');?>" target="main"><span>
					<img src="resources/images/icons/54.png" alt="icon" /><br />
					项目展示管理
				</span></a></li>
				
				<li><a class="shortcut-button" href="main.php?do=addpro&tit=<?php echo urlencode('添加项目展示');?>" target="main"><span>
					<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					添加项目展示
				</span></a></li>
                
                <li><a class="shortcut-button various" href="upimg.php"  data-fancybox-type="iframe" title="上传图片"><span>
					<img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
					上传图片
				</span></a></li>
                
                <li><a class="shortcut-button various" href="ajax.php?type=password"  data-fancybox-type="iframe" title="修改后台密码"><span>
					<img src="resources/images/icons/padlock.png" alt="icon" /><br />
					修改后台密码
				</span></a></li>
				
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->