<?php
/*
 * 源码来源：	Hack易支付
 * QQ:53587800
 * QQ:821425543
 * 最新源码下载地址：www.hackwl.cn
 * */
define('SYSTEM_ROOT_E', dirname(__FILE__).'/');
include '../ayangw/common.php';
require_once(SYSTEM_ROOT_E."fakajun.php");

// var_dump($_GET);exit;

function showalert($msg,$status,$orderid=null){
    echo '<meta charset="utf-8"/><script>window.location.href="../getkm.php?out_trade_no='.$orderid.'";</script>';
}

// 生成签名
$sign = fakajun::sign($_GET, $conf['xq_key']);

// 校验签名
if ($sign == $_GET['sign']) {
    // 匹配AppID
    if ($conf['xq_id'] == $_GET['app_id']) {

		//商户订单号	
		$out_trade_no = $_GET['out_trade_no'];

		//支付宝交易号	
		$trade_no = $_GET['trade_no'];

		//交易状态
		$trade_status = $_GET['trade_status'];

		$sql = "SELECT * FROM ayangw_order WHERE out_trade_no='{$out_trade_no}' limit 1";
	    $res = $DB->query($sql);
	    $srow = $DB->fetch($res);

	    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
			if($srow['sta']==0){
			    if(!srow || $srow['money'] != $_GET['total_fee']){
			       showalert('验证失败！',4,'订单回调验证失败！');
			    }
				 $sql = "update ayangw_order set sta = 1, trade_no = '{$trade_no}' ,endTime = now() where out_trade_no = '{$out_trade_no}'";
				 $sql2 = "UPDATE ayangw_km set endTime = now(),out_trade_no = '{$out_trade_no}',trade_no='{$trade_no}',rel ='{$srow['rel']}',stat = 1
	                      where gid = {$srow['gid']} and stat = 0 
	                      limit  1";
				 $DB->query($sql);
				 $DB->query($sql2);
				showalert('您所购买的商品已付款成功，感谢购买！',1,$out_trade_no);
			}else{
				showalert('您所购买的商品已付款成功，感谢购买！',1,$out_trade_no);
			}
	    }
	    else {
	      echo "trade_status=".$_GET['trade_status'];
	    }

    }
} else {
	showalert('验证失败！',4,'订单回调验证失败！');	
}
?>