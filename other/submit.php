<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>正在为您跳转到支付页面，请稍候...</title>
    <style type="text/css">
        body {margin:0;padding:0;}
        p {position:absolute;
            left:50%;top:50%;
            width:330px;height:30px;
            margin:-35px 0 0 -160px;
            padding:20px;font:bold 14px/30px "宋体", Arial;
            background:#f9fafc url(../assets/load.gif) no-repeat 20px 26px;
            text-indent:22px;border:1px solid #c5d0dc;}
        #waiting {font-family:Arial;}
    </style>
<script>
function open_without_referrer(link){
document.body.appendChild(document.createElement('iframe')).src='javascript:"<script>top.location.replace(\''+link+'\')<\/script>"';
}
</script>
</head>
<body>
<?php
define('SYSTEM_ROOT_E', dirname(__FILE__).'/');
define('SYSTEM_ROOT_INFO', md5($_SERVER['HTTP_HOST']."24K"));
include '../ayangw/common.php';
if(empty($conf['xq_id'])){
    exit("未初始化支付账号！");
}
@header('Content-Type: text/html; charset=UTF-8');

$type=isset($_GET['type'])?$_GET['type']:exit('No type!');


if($type=='alipay' || $type=='tenpay' || $type=='qqpay' || $type=='wxpay'){

	require_once(SYSTEM_ROOT_E."fakajun.php");
	empty($_COOKIE['auth'])?exit():null;
	$or = $_GET['out_trade_no'];
	//防止修改价格
	$sql = "SELECT * FROM ayangw_order WHERE out_trade_no='{$or}' limit 1";
	$row = $DB->get_row($sql);
	if(!row || $row['money'] != $_GET['money']){
	    exit("验证失败1");
	}
	$sql = "select * from  ayangw_goods where id = ". $_GET['gid'];
	$row = $DB->get_row($sql);
	if(!row || $row['price'] != $_GET['money']){
	    exit("验证失败2");
	}
	//var_dump($sql);exit;

	if ($_GET['type'] == 'wxpay') {
		if (fakajun::mobile()) {
			$method = 'wxpay.pay.h5';
		} else {
			$method = 'wxpay.pay.unifiedorder';
		}
	} elseif ($_GET['type'] == 'tenpay') {
		$method = 'alipay.trade.precreate';
	} elseif ($_GET['type'] == 'qqpay') {
		$method = 'qq.pay.native';
	} else {
		if(fakajun::mobile()){
			$method = 'alipay.trade.wap.pay';
		}else{
			$method = 'alipay.trade.page.pay';
		}
	}

	/**
	 * 封装请求参数
	 * @var array
	 */
	$params = array(
		"app_id"		=> $conf['xq_id'],//商户ID
		"method"		=> $method,
	    'timestamp'     =>  date('Y-m-d H:i:s')
	);
	$params['biz_content'] = json_encode(array(
		"notify_url"	=> "http://".$_SERVER['HTTP_HOST'].'/other/fakajun_notify.php',//异步通知
		"return_url"	=> "http://".$_SERVER['HTTP_HOST'].'/other/fakajun_return.php',//回调
		"out_trade_no"	=> $_GET['out_trade_no'],//订单编号
		"spbill_create_ip"=>fakajun::ip(),
		"subject"		=> $_GET['name'],//商品名称
		"total_amount"	=> $_GET['money'],//金额
		"body"			=> $conf['title'],//网站名称
	));

	// 获得签名
	$sign = fakajun::sign($params, $conf['xq_key']);
	$params['sign'] = $sign;

	// 发送请求
	$res = fakajun::http($params);

	if ($res) {

		$json = json_decode($res, true);
		if (isset($json['url'])) {
			header('Location: '.$json['url']);
		} elseif (isset($json['msg'])) {
			exit($json['msg']);
		}
		exit($res);
	}
}
exit('未知错误！');
?>
<p>正在为您跳转到支付页面，请稍候...</p>
</body>
</html>