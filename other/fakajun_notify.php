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

// 生成签名
$sign = fakajun::sign($_POST, $conf['xq_key']);
// 校验签名
if ($sign == $_POST['sign']) {
    // 匹配AppID
    if ($conf['xq_id'] == $_POST['app_id']) {


        $out_trade_no = $_GET['out_trade_no'];
        $trade_no = $_GET['trade_no'];
        $trade_status = $_GET['trade_status'];

        $sql = "SELECT * FROM ayangw_order WHERE out_trade_no='{$out_trade_no}' limit 1";
       
        $res = $DB->query($sql);
        $srow = $DB->fetch($res);
        if($_GET['trade_status'] == 'TRADE_FINISHED') {
            //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
        }
        else if ($_GET['trade_status'] == 'TRADE_SUCCESS' && $srow['sta']==0) {
            $sql = "update ayangw_order set sta = 1, trade_no = '{$trade_no}' ,endTime = now() where out_trade_no = '{$out_trade_no}'";
            $sql2 = "UPDATE ayangw_km set endTime = now(),out_trade_no = '{$out_trade_no}',trade_no='{$trade_no}',rel ='{$srow['rel']}',stat = 1
            where gid = {$srow['gid']} and stat = 0
            limit  1";
             $DB->query($sql);
             $DB->query($sql2);
            
        }
        exit('success');

    }
}
exit('fail');