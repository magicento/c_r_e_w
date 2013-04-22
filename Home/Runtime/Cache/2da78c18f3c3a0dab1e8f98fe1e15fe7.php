<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($pagetitle); ?>_<?php echo C('SITE_NAME') ?></title>
	<link rel="stylesheet" type="text/css" href="/Public/css/home/template.css" />
	<script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/json2.js"></script><script type="text/javascript" src="/Public/js/common.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/artDialog/artDialog.js?skin=chrome"></script>
	<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>
</head>
<body class="<?php echo ($browser); ?>">
<div class="bshade"></div>
<div class="userapplyinfobox">
<div class="regboxcontent iwantapplypopupbox">
<link rel="stylesheet" type="text/css" href="/Public/images/home/tip-yellowsimple/tip-yellowsimple.css" /><link rel="stylesheet" type="text/css" href="/Public/images/home/datepicker/css/jquery-ui.css" />
<script type="text/javascript" src="/Public/js/jquery_poshytip.js"></script><script type="text/javascript" src="/Public/js/city.js"></script><script type="text/javascript" src="/Public/images/home/datepicker/js/jquery-ui-datepicker.js"></script>
<form action="##" class="reg-form" method="post">
	<table class="regtableleft">
		<tr>
			<th>应用名称：</th>
			<td>91移动开放平台</td>
		</tr>
		<tr>
			<th>身份证号码：</th>
			<td><?php echo ($_SESSION['userinfo']['identitycard']); ?></td>
		</tr>
		<tr>
			<th>姓名：</th>
			<td><?php echo ($_SESSION['userinfo']['account']); ?></td>
		</tr>
		<tr>
			<th>邮箱：</th>
			<td>
				<input type="text" name="usereamil" id="usereamil" value="<?php echo ($_SESSION['userinfo']['email']); ?>" class="txt" title="请输入常用邮箱" />
			</td>
		</tr>
		<tr>
			<th>性别：</th>
			<td>
				<?php $sex = $_SESSION['userinfo']['sex'];if($sex==1){$m = 'checked';}else{$w = 'checked';} ?>
				<input type="radio" <?php echo $m; ?> name="sex" id="sexman" value="1" /><label for="sexman">男</label>
				<span style="width: 20px;">&nbsp;</span>
				<input type="radio" <?php echo $w; ?> name="sex" id="sexwoman" value="2" /><label for="sexwoman">女</label>
			</td>
		</tr>
		<tr>
			<th>现任职务：</th>
			<td><select name="job" id="job">
				<option value="<?php echo ($_SESSION['userinfo']['job']); ?>"><?php echo ($_SESSION['userinfo']['job']); ?></option>
				<option value="大力水手">大力水手</option>
				<option value="船长">船长</option>
				<option value="大副">大副</option>
			</select></td>
		</tr>
		<tr>
			<th>联系电话：</th>
			<td><input type="text" name="telephone" id="telephone" value="<?php echo ($_SESSION['userinfo']['tel']); ?>" class="telephone txt" title="你的手机或者固定电话！" /></td>
		</tr>
		<tr>
			<th>所在地：</th>
			<td class="pcabox">
				<select name="Province"></select><select name="City"></select><select name="Area"></select>
				<?php $address = explode('--',$_SESSION['userinfo']['address']); ?>
				<script language="javascript">new PCAS("Province","City","Area",'<?php echo $address[0] ?>','<?php echo $address[1] ?>','<?php echo $address[2] ?>');</script>
			</td>
		</tr>
		<tr class="buchongyuming">
			<th>补充说明：</th>
			<td>
				<textarea name="buchongyuming" id="buchongyuming" cols="30" rows="3"></textarea>
			</td>
		</tr>
		<tr>
			<th class="verifyth">验证码：</th>
			<td>
			<script type="text/javascript">function updateverifyimg(obj){obj.src="__APP__/Public/GBVerify/?"+Math.random();}</script>	
			<img onclick="updateverifyimg(this)" class="verifyimg" src="__APP__/Public/GBVerify/" alt="验证码" /><span>点击图片换一张？</span><br />
			<input type="text" name="verify" id="verify" class="verify txt" title="输入上面图片中的文字" />
			</td>
		</tr>
		<tr class="dianjibaoming">
			<th></th>
			<td><input type="submit" class="applysubbutton" value="点击报名" /></td>
		</tr>
	</table>
	<div class="clearfix"></div>
</form>
</div>
</div>
</body>
</html>