<?php

if($conf['paiapi'] == 1){
    $payapi='http://pay.hackwl.cn/';//Hakc易支付主接口
}elseif($conf['paiapi'] == 2){
    $payapi='http://pay.hackwl.cn/'; //Hakc易支付备用接口
}
?>
