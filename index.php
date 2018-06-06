<?php
/*
 * 源码来源：	Hack易支付
 * QQ:53587800
 * QQ:821425543
 * 最新源码下载地址：www.hackwl.cn
 * */

include 'ayangw/common.php';
if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')!==false && $conf['qqtz']==1){
    header("Content-Type: text/html; charset=utf-8");
    echo '<!DOCTYPE html>
    <html>
     <head>
      <title>请使用浏览器打开</title>
      <script src="https://open.mobile.qq.com/sdk/qqapi.js?_bid=152"></script>
      <script type="text/javascript"> mqq.ui.openUrl({ target: 2,url: "'.$siteurl.'"}); </script>
     </head>
     <body></body>
    </html>';
     exit;
}

$rs=$DB->query("select * from ayangw_type");
$select = "";
while ($row = $DB->fetch($rs)){
    $select.='<option value="'.$row['id'].'">'.$row['tName'].'</option>';
}

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php echo $conf['title'];?></title>
  <meta name="keywords" content="<?php echo $conf['keywords'];?>">
  <meta name="description" content="<?php echo $conf['description'];?>">
  <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/4.png" media="screen" />
  <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="layer/layer.js"></script>

  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <script src="js/ayangw.js"></script>
  <script type="text/javascript">
  $(function(){
	 
		//获取商品
	  getPoint($("#tp_tid"));
	
		
})
 
  </script>
<style>
img.logo{width:14px;height:14px;margin:0 5px 0 3px;}
body{
	background-image: url("assets/imgs/bj3.jpg");
	background-repeat: repeat;
}
</style>
</head>
<body>



<div style="height: 20px;">

</div>
<div class="container" >
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-9 center-block" style="float: none;">
<div class="panel panel-default" style="border: 2px solid #63B8FF;">
    <div class="panel-body" style="text-align: center;" >
<img alt="" height="82px" src="assets/imgs/logo.png">

</div>
</div>

<div class="panel panel-primary">

<div class="panel-body" style="text-align: center;">
	<div class="list-group">
		<!--div class="list-group-item list-group-item-info">
			<img src="logo.png">
		</div-->
		
			<div class="panel panel-info">
						<div class="list-group-item reed" style="background: #66bdff;">
							<h3 class="panel-title">
								<font color="#fff"><i class="fa fa-volume-up"></i>&nbsp;&nbsp;<b>购买须知<用户必看></b></font>
							</h3>
						</div>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td align="center"><font color="#808080">本站域名：<?php echo $_SERVER['HTTP_HOST']?></font></td>
									<td align="center"><font color="#808080">客服QQ:<?php echo $conf['zzqq']?></font></td>
								</tr>
								
							</tbody>
						</table>
						<div class="list-group-item reed">
							
							<font style="color:#009ACD;font-weight: bold;"><?php echo $conf['notice1']?></font>
						</div>
						<div class="list-group-item reed">
							<font style="color:#556B2F;font-weight: bold;"><?php echo $conf['notice2']?></font>
						</div>
						<div class="list-group-item reed">
							<font style="color:#008B00;font-weight: bold;"><?php echo $conf['notice3']?></font>
						</div>
						
						
						
					
		
		</div>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#onlinebuy" data-toggle="tab">在线购买下单</a></li>
			<li><a href="getkm.php" >订单查询提卡</a></li>
		</ul>
		<div class="list-group-item">
			<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade in active" id="onlinebuy">
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">商品分类</div>
					<select name="tp_id" id="tp_tid" class="form-control" onchange="getPoint(this);"><?php echo $select?></select>
				</div></div>
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">选择商品</div>
					<select name="gid" id="gid" class="form-control" onchange="getPrice(this)">
					
					</select>
				</div></div>
				<div class="form-group">
					<div class="panel panel-default">
                    <div class="panel-body" id="ginfo">
                    </div>
                   
                </div>
				</div></div>
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">商品价格</div>
					<input type="text" name="need" id="need" class="form-control" disabled/>
				</div></div>
				
				<div class="form-group" style="<?php if($conf['showKc'] == 2) echo "display:none;"?> ">
					<div class="input-group"><div class="input-group-addon">商品库存</div>
					<input type="text" name="kc" id="kc" class="form-control" disabled/>
				</div></div>
			
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">联系方式</div>
					<input type="text" name="lx" id="lx" value="" class="form-control" placeholder="输入您的QQ,您的QQ号码也可以作为您的提取密码" required/>
				</div></div>
				
				<div class="form-group">
			     <span class="btn btn-default btnSpan" title="alipay"><input type="radio" name="type" value="alipay" class="pay" id="alipay" value="alipay" title="支付宝" ><img alt="" src="assets/alipay.ico" class="logo">支付宝</span>
			     <span class="btn btn-default btnSpan" title="qqpay"><input type="radio" name="type" value="qqpay"  class="pay" id="qqpay" value="qqpay" title="QQ钱包" ><img alt="" src="assets/qqpay.ico" class="logo">QQ</span>
			     <span class="btn btn-default btnSpan" title="tenpay" style="display: none"><input type="radio" name="type" value="tenpay" class="pay" id="tenpay" value="tenpay" title="财付通" ><img alt="" src="assets/tenpay.ico" class="logo">财付通</span>
			     <span class="btn btn-default btnSpan"  title="wxpay"><input type="radio" name="type" value="wxpay" class="pay" id="wxpay" value="wxpay" title="微信" ><img alt="" src="assets/wechat.ico" class="logo">微信</span>
			    </div>
			
				</div>
				<input type="submit" id="submit_buy" class="btn btn-primary btn-block" value="立即购买">
			</div>
			
			
			
		</div>
		<hr/>
		<div class="container-fluid">
			
			<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['zzqq']?>&site=qq&menu=yes" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-user"></span> 联系客服</a>
		</div>
		<br>
		<span>Copyright © 2017 <?php echo $conf['foot']?></span>
		
		
		
		</div>
	</div>
</div>
</div>
</div>
</body>
</html>