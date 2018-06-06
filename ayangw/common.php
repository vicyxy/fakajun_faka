<?php
error_reporting(0);
define('CACHE_FILE', 0);
define('IN_CRONLITE', true);
define('VERSION', '2.0');
define('TYPE', '3');
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
define('SYS_KEY', 'fk_key');
define('CHK', 'aHR0cDovL2F1dGguYXlhbmd3LmNuLzI0Sy5waHA=');
session_start();

/*
 * 源码来源：	Hack易支付
 * QQ:53587800
 * QQ:821425543
 * 最新源码下载地址：www.hackwl.cn
 * */

date_default_timezone_set("PRC");
session_start();

$http =base64_decode(CHK);
$date = date("Y-m-d H:i:s");

$scriptpath=str_replace('\\','/',$_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$sitepath.'/';
include_once(SYSTEM_ROOT."function.php");
if(is_file(SYSTEM_ROOT.'360safe/360webscan.php')){//360网站卫士
    require_once(SYSTEM_ROOT.'360safe/360webscan.php');
}

$password_hash='!@#%!s!0';
setcookie("auth",100,time()+1800);//用于授权，自己写授权代码



require ROOT.'config.php';
if(!defined('SQLITE') && (!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname']))//检测安装
{
header('Content-type:text/html;charset=utf-8');
echo '你还没安装！<a href="install/">点此安装</a>';
exit();
}

//连接数据库
include_once(SYSTEM_ROOT."db.class.php");
$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);

if($DB->query("select * from ayangw_config where 1")==FALSE)//检测安装2
{
header('Content-type:text/html;charset=utf-8');
echo '你还没安装！<a href="install/">点此安装</a>';
exit();
}else{
$rs=$DB->query("select * from ayangw_config");
while($row=$DB->fetch($rs)){ 
	$conf[$row['ayangw_k']]=$row['ayangw_v'];
}
}
include_once('api.php');

if($conf['CC_Defender'] == 1){
    define('CC_Defender', 1); //防CC攻击开关(1为session模式)
    include_once SYSTEM_ROOT.'security.php';
  
}
if($conf['txprotect'] == 1)
    include_once(SYSTEM_ROOT."txprotect.php");

include_once(SYSTEM_ROOT."member.php");




?>