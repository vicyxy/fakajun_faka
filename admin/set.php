<?php
/*
 * 源码来源：	发卡君免签约支付
 * QQ:53587800
 * QQ:821425543
 * 最新源码下载地址：www.hackwl.cn
 * */

$title='后台管理';
include './head.php';


?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") != $.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }else{

    }
    </script>
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php 
if($_GET['mod'] == "site"){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">网站信息配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=site_n" method="post" class="form-horizontal" role="form">
  <div class="form-group">
	  <label class="col-sm-2 control-label">网站域名</label>
	  <div class="col-sm-10"><input type="text" name="web_url" id="web_url" value="<?php echo  $conf['web_url'] ?>" class="form-control" required/>
	  <span style="color:red; font-weight: bold;"> * 域名格式必须为：http://xxxx.xxx.xx/ 系统检查您的域名应填：http://<?php echo  $_SERVER['HTTP_HOST']?>/</span></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站名称</label>
	  <div class="col-sm-10"><input type="text" name="sitename" id="web_name" value="<?php echo  $conf['title'];  ?>" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">标题栏描述</label>
	  <div class="col-sm-10"><input type="text" name="title" id="web_description" value="<?php echo $conf['description'];  ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">关键字</label>
	  <div class="col-sm-10"><input type="text" name="keywords" id="web_keywords" value="<?php echo $conf['keywords']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">客服ＱＱ</label>
	  <div class="col-sm-10"><input type="text" name="kfqq" id="web_qq" value="<?php echo $conf['zzqq']; ?>" class="form-control"/></div>
	</div><br/>

	<div class="form-group">
	  <label class="col-sm-2 control-label">首页公告1</label>
	  <div class="col-sm-10"><textarea class="form-control" id="web_notice1" name="anounce" rows="5"><?php echo $conf['notice1'];?></textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">首页公告2</label>
	  <div class="col-sm-10"><textarea class="form-control" id="web_notice2" name="anounce" rows="5"><?php echo $conf['notice2'];?></textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">首页公告3</label>
	  <div class="col-sm-10"><textarea class="form-control" id="web_notice3" name="anounce" rows="5"><?php echo $conf['notice3'];?></textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">发货页面公告</label>
	  <div class="col-sm-10"><textarea class="form-control" id="dd_notice" name="dd_notice" rows="5"><?php echo $conf['dd_notice'];?></textarea></div>
	</div><br/>
<div class="form-group">
	  <label class="col-sm-2 control-label">底部版权</label>
	  <div class="col-sm-10"><textarea class="form-control" id="web_foot" name="anounce" rows="5"><?php echo $conf['foot'];?></textarea></div>
	</div><br/>
	<div class="form-group">
		<label class="col-sm-2 control-label">首页显示库存</label>
		<div class="col-sm-10">
			<select class="form-control" id="showKc" name="showKc">
				<option value="1" <?php if($conf['showKc']==1) echo "selected"; ?> >显示</option>
				<option value="2" <?php if($conf['showKc']==2) echo "selected"; ?>>不显示</option>
			</select>
		</div>
	</div><br />
	<div class="form-group">
		<label class="col-sm-2 control-label">防CC模式</label>
		<div class="col-sm-10">
			<select class="form-control" id="CC_Defender" name="CC_Defender">
				<option value="1" <?php if($conf['CC_Defender']==1) echo "selected"; ?> >开启</option>
				<option value="2" <?php if($conf['CC_Defender']==2) echo "selected"; ?>>关闭</option>
			</select>
		</div>
	</div><br />
	<div class="form-group">
		<label class="col-sm-2 control-label">反腾讯检测</label>
		<div class="col-sm-10">
			<select class="form-control" id="txprotect" name="txprotect">
				<option value="1" <?php if($conf['txprotect']==1) echo "selected"; ?> >开启</option>
				<option value="2" <?php if($conf['txprotect']==2) echo "selected"; ?>>关闭</option>
			</select>
		</div>
	</div><br />
	<div class="form-group">
		<label class="col-sm-2 control-label">QQ跳转</label>
		<div class="col-sm-10">
			<select class="form-control" id="qqtz" name="qqtz">
				<option value="1" <?php if($conf['qqtz']==1) echo "selected"; ?> >开启</option>
				<option value="2" <?php if($conf['qqtz']==2) echo "selected"; ?>>关闭</option>
			</select>
		</div>
	</div><br />
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">
	  <input type="button"  id="submit_webInfo" value="修改保存" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
<?php
}elseif($_GET['mod'] =='pay'){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">支付接口商户配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=pay_n" method="post" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-lg-3 control-label">选择支付接口</label>
		<div class="col-lg-8">
			<select class="form-control" id="paiapi" name="paiapi">
				<option value="1" <?php if($conf['paiapi']==1) echo "selected"; ?>>发卡君免签约支付主接口- 主 </option>
				<option value="2" <?php if($conf['paiapi']==2) echo "selected"; ?>>发卡君免签约支付备接口- 备 </option>
			</select>
			<font style="color: green;">具体提现相关手续请查看官网或联系官方结算客服!</font>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">发卡君AppID</label>
		<div class="col-lg-8">
			<input type="text" id="epay_pid" name="epay_pid" class="form-control"
				   value="<?php echo $conf['xq_id']?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">发卡君AppKEY</label>
		<div class="col-lg-8">
			<input type="text" id="epay_key" name="epay_key" class="form-control" value="<?php echo  $conf['xq_key']?>">
		</div>
	</div>
	
	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8"><input type="button" id="submit_epay" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
    <div class="downapk"><strong>申请发卡君免签约支付接口：</strong><a style="font-weight: 800;color: #09f;" href="https://www.fakajun.com/register" target="_blank">点击进入</a></div><br>
	<div class="downapk"><strong>发卡君免签约支付商户登录：</strong><a style="font-weight: 800;color: #09f;" href="https://www.fakajun.com/" target="_blank">点击进入</a></div><br>
	<div class="downapk"><strong>发卡君免签约支付官方QQ群：</strong><a style="font-weight: 800;color: #09f;" href="https://jq.qq.com/?_wv=1027&k=5CUiCWS" target="_blank">点击加入</a></div>
  </form>
</div>
</div>

<?php
}elseif($_GET['mod'] =='admin'){?>

<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">管理员信息配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=pay_n" method="post" class="form-horizontal" role="form">
	
	<div class="form-group">
		<label class="col-lg-3 control-label">管理员账号</label>
		<div class="col-lg-8">
			<input type="text" id="web_admin" name="web_admin" class="form-control"
				   value="<?php echo $conf['admin']?>" disabled>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">管理员密码</label>
		<div class="col-lg-8">
			<input type="text" id="web_pwd" name="web_pwd" class="form-control" value="<?php echo $conf['pwd']?>">
		</div>
	</div>

	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8"><input type="button" id="submit_admin" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>



<?php }elseif($_GET['mod'] =='epay_n'){
	$account=$_POST['account'];
	$username=$_POST['username'];
	if($account==NULL || $username==NULL){
		showmsg('保存错误,请确保每项都不为空!',3);
	} else {
	$data=get_curl($payapi.'api.php?act=change&pid='.$conf['xq_id'].'&key='.$conf['xq_key'].'&account='.$account.'&username='.$username.'&url='.$_SERVER['HTTP_HOST']);
	$arr=json_decode($data,true);
	if($arr['code']==1) {
		showmsg('修改成功!');
	}else{
		showmsg($arr['msg']);
	}
	}
}elseif($_GET['mod'] =='epay'){
if(isset($conf['xq_id']) && isset($conf['xq_key'])){
	$data=get_curl($payapi.'api.php?act=query&pid='.$conf['xq_id'].'&key='.$conf['xq_key'].'&url='.$_SERVER['HTTP_HOST']);
	$arr=json_decode($data,true);
	if($arr['code']==-2) {
		showmsg('支付接口KEY校验失败！');
	}elseif(!$data){
		showmsg('获取失败，请刷新重试！');
	}
}else{
	showmsg('你还未填写支付接口商户ID和密钥，请返回填写！');
}
if($arr['active']==0)showmsg('该商户已被封禁');
$key=substr($arr['key'],0,8).'****************'.substr($arr['key'],24,32);
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">支付接口设置</h3></div>
<div class="panel-body">
<ul class="nav nav-tabs"><li class="active"><a href="#">支付接口设置</a></li><li><a href="./set.php?mod=epay_order">订单记录</a></li><li><a href="./set.php?mod=epay_settle">结算记录</a></li></ul>
  <form action="./set.php?mod=epay_n" method="post" class="form-horizontal" role="form">
    <h4>商户信息查看：</h4>
	<div class="form-group">
	  <label class="col-sm-2 control-label">商户ID</label>
	  <div class="col-sm-10"><input type="text" name="pid"  value="<?php echo $arr['pid']; ?>" class="form-control" disabled/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">商户KEY</label>
	  <div class="col-sm-10"><input type="text" name="key" value="<?php echo $key; ?>" class="form-control" disabled/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">商户余额</label>
	  <div class="col-sm-10"><input type="text" name="money" value="<?php echo $arr['money']; ?>" class="form-control" disabled/></div>
	</div><br/>
	<h4>收款账号设置：</h4>
	<div class="form-group">
	  <label class="col-sm-2 control-label">支付宝账号</label>
	  <div class="col-sm-10"><input type="text" name="account" value="<?php echo $arr['account']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">支付宝姓名</label>
	  <div class="col-sm-10"><input type="text" name="username" value="<?php echo $arr['username']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="确定修改" class="btn btn-primary form-control"/><br/>
	 </div>
	 </div>
	 <h4><span class="glyphicon glyphicon-info-sign"></span> 注意事项</h4>
1.支付宝账户和支付宝真实姓名请仔细核对，一旦错误将无法结算到账！<br/>2.每笔交易会有<?php echo (100-$arr['money_rate'])?>%的手续费，这个手续费是支付宝、微信和财付通收取的，非本接口收取。<br/>3.结算是通过支付宝进行结算，每天满<?php echo $arr['settle_money']?>元自动结算，如需人工结算需要扣除<?php echo $arr['settle_fee']?>元手续费
  </form>
</div>
</div>
<?php
}elseif($_GET['mod'] =='epay_settle')
{
	$data=get_curl($payapi.'api.php?act=settle&pid='.$conf['xq_id'].'&key='.$conf['xq_key'].'&limit=20&url='.$_SERVER['HTTP_HOST']);
	$arr=json_decode($data,true);c();
	if($arr['code']==-2) {
		showmsg('支付接口KEY校验失败！');
	}
echo '<div class="panel panel-primary"><div class="panel-heading w h"><h3 class="panel-title">支付接口结算记录</h3></div>
	<div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>ID</th><th>结算账号</th><th>结算金额</th><th>手续费</th><th>结算时间</th></tr></thead>
          <tbody>';
foreach($arr['data'] as $res){
	echo '<tr><td><b>'.$res['id'].'</b></td><td>'.$res['account'].'</td><td><b>'.$res['money'].'</b></td><td><b>'.$res['fee'].'</b></td><td>'.$res['time'].'</td></tr>';
}
		  echo '</tbody>
        </table>
      </div>
	  </div>';
}
elseif($_GET['mod'] =='epay_order')
{
	$data=get_curl($payapi.'api.php?act=orders&pid='.$conf['xq_id'].'&key='. $conf['xq_key'].'&limit=30&url='.$_SERVER['HTTP_HOST']);
	
	$arr=json_decode($data,true);
	if($arr['code']==-2) {
		showmsg('支付接口KEY校验失败！');
	}
echo '<div class="panel panel-primary"><div class="panel-heading"><h3 class="panel-title">支付订单记录</h3></div>订单只展示前30条[<a href="set.php?mod=epay">返回</a>]
	<div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>交易号/商户订单号</th><th>付款方式</th><th>商品名称/金额</th><th>创建时间/完成时间</th><th>状态</th></tr></thead>
          <tbody>';
foreach($arr['data'] as $res){
	echo '<tr><td>'.$res['trade_no'].'<br/>'.$res['out_trade_no'].'</td><td>'.$res['type'].'</td><td>'.$res['name'].'<br/>￥ <b>'.$res['money'].'</b></td><td>'.$res['addtime'].'<br/>'.$res['endtime'].'</td><td>'.($res['status']==1?'<font color=green>已完成</font>':'<font color=red>未完成</font>').'</td></tr>';
}
		  echo '</tbody>
        </table>
      </div>
	  </div>';
}else if($_GET['mod']=="email"){
    include '../emailConfig.php';
    ?>
    <div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">邮箱配置　　* 用于给用户发送订单信息</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=sfEmail" method="post" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-lg-3 control-label">邮箱SMTP服务器:</label>
		<div class="col-lg-8">
			<input type="text" id="host" name="host" class="form-control"
				   value="<?php echo $emailConfig['host'];?>">
				   <font color="green">示例：smtp.yeah.net</font>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-lg-3 control-label">设置发件人姓名</label>
		<div class="col-lg-8">
			<input type="text" id="fromName" name="fromName" class="form-control"
				   value="<?php echo $emailConfig['fromName'];?>">
			<font color="green">示例：发卡君免签约支付</font>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">邮箱SMTP端口:</label>
		<div class="col-lg-8">
			<input type="text" id="port" name="port" class="form-control"
				   value="<?php echo $emailConfig['port'];?>">
		     <font color="green">示例：25</font>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">邮箱账号</label>
		<div class="col-lg-8">
			<input type="text" id="user" name="user" class="form-control"
				   value="<?php echo $emailConfig['user'];?>">
		     <font color="green">示例：ayangw</font>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">邮箱密码</label>
		<div class="col-lg-8">
			<input type="text" id="pwd" name="pwd" class="form-control"
				   value="<?php echo $emailConfig['pwd'];?>">
		       <font color="green">示例：自己设置</font>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">发件人邮箱地址</label>
		<div class="col-lg-8">
			<input type="text" id="from" name="from" class="form-control" value="<?php echo $emailConfig['from']?>">
		   <font color="green">示例：ayangw@yeah.net</font>
		</div>
		
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">邮件标题</label>
		<div class="col-lg-8">
			<input type="text" id="title" name="title" class="form-control" value="<?php echo  $emailConfig['title']?>">
		    <font color="green">示例：发卡君免签约支付发卡平台</font>
		</div>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8"><input type="submit" id="submit_email" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
    
    
<?php
 }elseif($_GET['mod']=="sfEmail"){
    if($_POST['host'] == "" || $_POST['port'] == "" || $_POST['user'] == "" || $_POST['from'] == ""){
        showmsg("重要信息不能为空！");
        exit();
    }
     $text="<?php
 \$emailConfig = array(
  'host'=>'".$_POST['host']."',//邮箱的服务器地址
  'fromName'=>'".$_POST['fromName']."',//设置发件人姓名（昵称） 任意内容
  'port'=>'".$_POST['port']."',//端口
  'user'=>'".$_POST['user']."',//邮箱账号
  'pwd'=>'".$_POST['pwd']."',//邮箱密码
  'from'=>'".$_POST['from']."',//设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
  'title'=>'".$_POST['title']."'//添加该邮件的主题
  );
?>
";
     saveFile("../emailConfig.php",$text);
     showmsg("ok!",1);
 }elseif($_GET['mod']=='upimg'){
echo '<div class="panel panel-primary"><div class="panel-heading"><h3 class="panel-title">更改首页LOGO</h3> </div><div class="panel-body">';
if($_POST['s']==1){
$extension=explode('.',$_FILES['file']['name']);
if (($length = count($extension)) > 1) {
$ext = strtolower($extension[$length - 1]);
}
if($ext=='png'||$ext=='gif'||$ext=='jpg'||$ext=='jpeg'||$ext=='bmp')$ext='png';
copy($_FILES['file']['tmp_name'], ROOT.'/assets/imgs/logo.'.$ext);
echo "成功上传文件!<br>（可能需要清空浏览器缓存才能看到效果）";
}
echo '<form action="set.php?mod=upimg" method="POST" enctype="multipart/form-data"><label for="file"></label><input type="file" name="file" id="file" /><input type="hidden" name="s" value="1" /><br><input type="submit" class="btn btn-primary btn-block" value="确认上传" /></form>*请上传300*82的png格式的图片<br><br>现在的图片：<br><img src="../assets/imgs/logo.png?r='.rand(10000,99999).'" style="max-width:100%">';
echo '</div></div>';
}else{
     showmsg("无效请求");
 }
?>
<script>
var items = $("select[default]");
if (typeof c == 'undefined')	window.close();
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default"));
}
c();
</script>
    </div>
  </div>
  
  <?php 
  

  ?>