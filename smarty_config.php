<?php 

include("./libs/Smarty.class.php"); 

$smarty = new smarty(); 

$smarty->config_dir = "./libs/Config_File.class.php"; 

$smarty->template_dir = "./templates";

$smarty->compile_dir = "./templates_c"; 

$smarty->cache_dir = "./cache"; 

$smarty->caching = false; 

$smarty->left_delimiter = "{#"; 

$smarty->right_delimiter = "#}";


?> 
