<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<title><?php if(!empty($pagetitle)): echo ($pagetitle); ?>_<?php endif; echo (session('website_sitename')); ?>_<?php echo str_replace('www.','',session('website_siteurl')); ?></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="expires" content="0" />
<meta name="resource-type" content="document" />
<meta name="distribution" content="global" />
<meta name="author" content="CrewExam" />
<meta name="generator" content="lamp99.com,zhangjichao.cn" />
<meta name="copyright" content="Copyright (c) 2013 CrewExam. All Rights Reserved." />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="robots" content="index, follow" />
<meta name="revisit-after" content="1 days" />
<meta name="rating" content="general" />
<meta name="keywords" content="<?php echo (session('website_keywords')); ?>" />
<meta name="description" content="<?php echo ($pagediscription); echo (session('website_sitediscription')); ?>" />
<link rel="stylesheet" type="text/css" href="/Public/css/home/template.css" />
<script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/json2.js"></script><script type="text/javascript" src="/Public/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/artDialog.js?skin=chrome"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>
</head>
<body class="<?php echo ($browser); ?>">
<div class="bshade"></div>
<div class="navigation">
	<div class="navigation-wrapper">
		<div id="logo2">
			<h1>
			<a href="/">
			<img width="218" height="55" src="__PUBLIC__/images/home/herderlogo.png" />
			</a>
			</h1>
		</div>
		<div class="nav-body">
			<h2 class="nav-title">中国船员在线题库练习与模拟考试网</h2>
			<div class="nav-other">
				<div class="menu">
				<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo (session('website_myqq')); ?>&site=qq&menu=yes" stats="homenav_suggest" title="给我们提建议">在线客户服务</a>
				</div>
				<div class="menu more hidden">
				<a class="show-more" id="moreWeb" stats="homenav_more" href="##">更多</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-wrapper clearfix">
	<div class="full-page">
		<div class="login-page clearfix">
			<div class="regboxcontent">
<link rel="stylesheet" type="text/css" href="/Public/images/home/tip-yellowsimple/tip-yellowsimple.css" /><link rel="stylesheet" type="text/css" href="/Public/images/home/datepicker/css/jquery-ui.css" />
<script type="text/javascript" src="/Public/js/jquery_poshytip.js"></script><script type="text/javascript" src="/Public/js/city.js"></script><script type="text/javascript" src="/Public/images/home/datepicker/js/jquery-ui-datepicker.js"></script>
<style type="text/css">.tip-yellowsimple {z-index:1000;}</style>
<form action="__URL__/doreg" method="post" class="reg-form">
	<table class="regtableleft">
		<tr>
			<th></th>
			<td><h2 class="reg_page_title">注册新账号</h2></td>
		</tr>
		<tr>
			<th>身份证号码：</th>
			<td><input type="text" name="identitycard" onchange="checkidentitycard(this)" id="person_id" class="person_id txt" title="15/18位有效身份证号！" /></td>
		</tr>
		<tr>
			<th>真实姓名：</th>
			<td><input type="text" name="account" id="account" class="account txt" title="请输入真实姓名！" /></td>
		</tr>
		<tr>
			<th>邮箱：</th>
			<td>
				<input type="text" name="email" id="usereamil" class="txt" title="可以通过邮箱找回密码！" />
			</td>
		</tr>
		<tr>
			<th>生日：</th>
			<td><input type="text" name="birthday" id="birthday" class="birthday txt" title="请输入有效的出生日期！" /></td>
		</tr>
		<tr>
			<th>性别：</th>
			<td>
				<input type="radio" name="sex" id="sexman" value="1" /><label for="sexman">男</label>
				<span style="width: 20px;">&nbsp;</span>
				<input type="radio" name="sex" id="sexwoman" value="2" /><label for="sexwoman">女</label>
			</td>
		</tr>
		<tr>
			<th>密码：</th>
			<td><input type="password" name="password" id="password" class="txt" title="6-12个字符组成！" /></td>
		</tr>
		<tr>
			<th>确认密码：</th>
			<td><input type="password" name="password2" id="password2" class="txt" title="重复上面的密码！" /></td>
		</tr>
		<tr>
			<th>现任职务：</th>
			<td><select name="job" id="job">
				<?php echo (session('website_jobs')); ?>
			</select></td>
		</tr>
		<tr>
			<th>联系电话：</th>
			<td><input type="text" name="tel" id="telephone" class="telephone txt" title="你的手机或者固定电话！" /></td>
		</tr>
		<tr>
			<th>所在地：</th>
			<td class="pcabox">
				<select name="Province"></select><select name="City"></select><select name="Area"></select>
				<script language="javascript">new PCAS("Province","City","Area");</script>
				<span class="defaultarea"></span>
			</td>
		</tr>
		<tr>
			<th class="verifyth">验证码：</th>
			<td>
			<script type="text/javascript">function updateverifyimg(obj){obj.src="__APP__/Public/GBVerify/?"+Math.random();}</script>	
			<img onclick="updateverifyimg(this)" class="verifyimg" src="__APP__/Public/GBVerify/" alt="验证码" /><span>看不清楚点击图片换一张？</span><br />
			<input type="text" name="verify" id="verify" class="verify txt" title="输入上面图片中的文字" />
			</td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="regsubbutton" value="注册" /></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="checkbox" checked name="xieyi" id="xieyi" style="vertical-align:middle;" /><label style="vertical-align:middle;" for="xieyi">我接受</label>
				<a style="vertical-align:middle;" target="_blank" href="<?php echo U('Public/news','id=89');?>">船员考试网服务条款</a>
			</td>
		</tr>
	</table>
	<table class="regtableright">
		<tr><td>已经是船员考试网会员？<a href="/">直接登陆</a><br />还可以下载APP下载到手机<br />
			<img src="__PUBLIC__/images/home/regerweima.png" alt="" />
		</td></tr>
	</table>
	<div class="clearfix"></div>
</form>
</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div id="footer">
	<div class="site-footer">
		<div id="footer0904">
			<div class="footer_c"><?php echo (session('website_sitename')); ?>客户服务热线：<?php echo (session('website_tel')); ?>（工作日 9:00-17:30） 
			<a target="_blank" href="<?php echo (session('website_weibo')); ?>" class="weibo"><?php echo (session('website_sitename2')); ?></a>
			</div>
			<div class="footer_about">
			<ul class="about">
			    <li class="first"><a href="<?php echo U('Public/news','id=86');?>" >关于船员考试网</a></li>
			    <li><a href="<?php echo U('Public/newslist','cid=1');?>" target="_blank">最新资讯</a></li>
			    <li><a href="<?php echo U('Public/newslist','cid=2');?>" target="_blank">常见问题</a></li>
			    <li><a href="<?php echo U('Public/news','id=87');?>" target="_blank">联系我们</a></li>
			    <li><a href="<?php echo U('Public/newslist','cid=3');?>" target="_blank">海事规则</a></li>
			    <li><a href="<?php echo U('Public/news','id=88');?>" target="_blank">法律声明</a></li>
			    <li><a href="<?php echo U('Public/news','id=89');?>" target="_blank">会员服务</a></li>
			    <li><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo (session('website_myqq')); ?>&site=qq&menu=yes" >在线客服</a></li>
			   <li class="last"><a href="http://www.ship123.com" target="_blank">船员导航网</a></li>
			</ul>
			</div>
			
			<div class="footer_text">
			<p>客户服务热线：<?php echo (session('website_tel')); ?>&nbsp;&nbsp;<?php echo (session('website_sitename2')); ?>邮箱：<?php echo (session('website_mymail')); ?>&nbsp;&nbsp;网站ICP备案：<?php echo (session('website_beianhao')); ?></p>
			<p>通用网址 网络关键词：<?php echo (session('website_keywords')); ?></p>
			<p>CopyRight &copy; 2010-<?php echo date('Y',time()); ?>&nbsp;&nbsp;<?php echo (session('website_sitename2')); ?>&nbsp;&nbsp;<?php echo (session('website_siteurl')); ?>,All Rights Reserved&nbsp;&nbsp;<?php echo (session('website_sitename')); ?>&nbsp;&nbsp;版权所有</p>
			</div>
			<div class="icpbox">
				<a href="http://t.knet.cn/" target="_blank" class="icp"><img src="__PUBLIC__/images/home/footerbeian.png"></a></div>
				<div class="tongji"><?php echo (session('website_sitetonji')); ?></div>
			</div>
	</div>
</div>
</body>
</html>