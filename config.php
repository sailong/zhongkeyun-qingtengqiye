<?php
header("Content-type: text/html; charset=utf-8"); 
date_default_timezone_set("PRC");
class mysql{
 private $Host="";
 private $User="";
 private $Password="";
 private $DB="";
 private $dbCharSet="";
 //==================
 private $Link_ID=0;    //数据库连接
 private $Query_ID=0;   //查询结果
 private $Row_Result=array();  //结果集成组的数组
 private $Field_Result=array();  //结果集字段名组成数组
 private $Affected_row;   //影响行数
 private $Rows;   //结果集中记录的行数
 private $Fields;  //结果集字段数
 private $Row_Position; //记录指针位置索引
 private $Error;
 
 
 function __construct($hostname,$username,$password,$db,$dbcharset){
  $this->Host=$hostname;
  $this->User=$username;
  $this->Password=$password;
  $this->DB=$db;
  $this->dbCharSet=$dbcharset;
 }
 //连接数据库
 private function connect(){
  if(0 == $this->Link_ID){
   $this->Link_ID=mysql_connect($this->Host,$this->User,$this->Password);
   if(!$this->Link_ID){
    $this->halt("连接数据库服务端失败!");
   }
   if(!mysql_select_db($this->DB,$this->Link_ID)){
    $this->halt("不能打开指定的数据库".$this->DB);
   }
   mysql_query("SET NAMES $this->dbCharSet");
  }
 }
 //查询数据
 function query($Query_string){
  if($this->Query_ID){
   $this->free();
  }
  if(0 == $this->Link_ID){
   $this->connect();
  }
  $this->Query_ID=mysql_query($Query_string);
  if(!$this->Query_ID){
   $this->halt("SQL查询语句出错：".$Query_string);
  }
  return $this->Query_ID;
 }
 //将结果集指针指向指定行
 
 function seek($Position){
  if(@mysql_data_seek($this->Query_ID,$Position)){
   $this->Row_Position=$Position;
   return true;
  }else{
   $this->halt("定位结果集发生错误");
   return false;
  }
 }
 //释放内存
 function free(){
  if(@mysql_free_result($this->Query_ID)){
   unset($this->Row_Result);   //释放由结果集组成的数组
  }
  $this->QueryID=0;
 }
 //返回结果集记录组成的数组
 function get_rows_array(){
  $this->get_rows();
  for($i=0;$i<$this->Rows;$i++){
   if(!mysql_data_seek($this->Query_ID,$i)){
    $this->halt("mysql_data_seek查询语句出错");
   }
   $this->Row_Result[$i]=mysql_fetch_array($this->Query_ID);
  }
  return $this->Row_Result;
 }

 //返回结果集字段组成的数组
 function get_fields_array(){
  $this->get_fields();
  for($i=0;$i<$this->Fields;$i++){
   $obj=mysql_fetch_field($this->Query_ID);
   $this->Field_Result[$i]=$obj->name;
  }
  return $this->Field_Result;
 }
 //返回影响记录数
 function affected_rows(){
  $this->Affected_row=mysql_affected_rows($this->Link_ID);
  return $this->Affected_row;
 }
 //返回结果集的记录行数
 private function get_rows(){
  $this->Rows=mysql_num_rows($this->Query_ID);
  return $this->Rows;
 }
 //返回结果集字段数
 private function get_fields(){
  $this->Fields=mysql_num_fields($this->Query_ID);
  return $this->Fields;
 }
 //执行SQL语句并返回由查询结果中第一行记录组成的数组
 function fetch_one_array($Query_string){
  $this->query($Query_string);
  return mysql_fetch_array($this->Query_ID);
 }
 //取得Mysql数据库的版本
 function version(){
  return mysql_get_server_info();
 }
 //打印错误信息
 function halt($msg){
  $this->Error=mysql_error();
  printf("<br><b>数据库发生错误：</b>%s<br>\n",$msg);
  printf("<b>MySQL 返回错误信息:</b> %s <br>\n",$this->Error);
  die("脚本终止");
 }
 function close(){
  if(0 != $this->Link_ID){
   mysql_close($this->Link_ID);
  }
 }
 function __destruct(){
  $this->close();
 }
}

class dbstuff {

	var $version = '';
	var $querynum = 0;
	var $link;

	function connect($dbhost, $dbuser, $dbpw, $dbname = '', $pconnect = 0, $halt = TRUE) {

		$func = empty($pconnect) ? 'mysql_connect' : 'mysql_pconnect';
		if(!$this->link = @$func($dbhost, $dbuser, $dbpw)) {
			$halt && $this->halt('Can not connect to MySQL server');
		} else {
			if($this->version() > '4.1') {
				global $charset, $dbcharset;
				$dbcharset = !$dbcharset && in_array(strtolower($charset), array('gbk', 'big5', 'utf-8')) ? str_replace('-', '', $charset) : $dbcharset;
				$serverset = $dbcharset ? 'character_set_connection='.$dbcharset.', character_set_results='.$dbcharset.', character_set_client=binary' : '';
				$serverset .= $this->version() > '5.0.1' ? ((empty($serverset) ? '' : ',').'sql_mode=\'\'') : '';
				$serverset && mysql_query("SET $serverset", $this->link);
			}
			$dbname && @mysql_select_db($dbname, $this->link);
		}

	}

	function select_db($dbname) {
		return mysql_select_db($dbname, $this->link);
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}

	function fetch_first($sql) {
		return $this->fetch_array($this->query($sql));
	}

	function result_first($sql) {
		return $this->result($this->query($sql), 0);
	}
	function query($sql, $type = '') {
		global $debug, $discuz_starttime, $sqldebug, $sqlspenttimes;

		$func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ?
			'mysql_unbuffered_query' : 'mysql_query';
		if(!($query = $func($sql, $this->link))) {
			if(in_array($this->errno(), array(2006, 2013)) && substr($type, 0, 5) != 'RETRY') {
				$this->close();
				require './config.inc.php';
				$this->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
				$this->query($sql, 'RETRY'.$type);
			} elseif($type != 'SILENT' && substr($type, 5) != 'SILENT') {
				$this->halt('MySQL Query Error', $sql);
			}
		}

		$this->querynum++;
		return $query;
	}

	function affected_rows() {
		return mysql_affected_rows($this->link);
	}

	function error() {
		return (($this->link) ? mysql_error($this->link) : mysql_error());
	}

	function errno() {
		return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
	}

	function result($query, $row) {
		$query = @mysql_result($query, $row);
		return $query;
	}

	function num_rows($query) {
		$query = mysql_num_rows($query);
		return $query;
	}

	function num_fields($query) {
		return mysql_num_fields($query);
	}

	function free_result($query) {
		return mysql_free_result($query);
	}

	function insert_id() {
		return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
	}

	function fetch_row($query) {
		$query = mysql_fetch_row($query);
		return $query;
	}

	function fetch_fields($query) {
		return mysql_fetch_field($query);
	}

	function version() {
		if(empty($this->version)) {
			$this->version = mysql_get_server_info($this->link);
		}
		return $this->version;
	}

	function close() {
		return mysql_close($this->link);
	}

	function halt($message = '', $sql = '') {
		echo 'SQL Error:<br />'.$message.'<br />'.$sql;
	}
}


$host = "localhost";
$dbuser = "root";
$dbpsw = "123456";
$dbname = "yskn";
$tablepre = "pre_ucenter_";
$pconnect = 0;

$db=new mysql($host,$dbuser,$dbpsw,$dbname,"utf8");

define('UC_CONNECT', 'mysql');
define('UC_DBHOST', $host);
define('UC_DBUSER', $dbuser);
define('UC_DBPW', $dbpsw);
define('UC_DBNAME', $dbname);
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`yskn`.pre_ucenter_');
define('BBS_DBTABLEPRE', '`yskn`.pre_common_');
define('UC_DBCONNECT', '0');
define('UC_KEY', 'qtwy2014');
define('UC_API', 'http://yskn.com/bbs/uc_server');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '2');
define('UC_PPP', '20');





//同步登录 Cookie 设置
$cookiedomain = ''; 			// cookie 作用域
$cookiepath = '/';			// cookie 作用路径

?>
