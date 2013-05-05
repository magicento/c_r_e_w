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
				<a href="/"> <img width="218" height="55"
					src="__PUBLIC__/images/home/herderlogo2.png" />
				</a>
			</h1>
		</div>
		<div class="nav-body site-nav exampage">
			<div class="nav-main">
				<div class="menu">
					<div class="menu-title">
						<a ui-async="async" href="<?php echo U('User/profile');?>" accesskey="1"><span
							stats="V6Hd_home" class="menu-title-text">会员首页</span></a>
					</div>
				</div>
				<div class="menu">
					<div class="menu-title" id="profileMenuActive">
						<a href="<?php echo U('User/myapp');?>" accesskey="2" id="showProfileMenu"><span
							class="menu-title-text" stats="V6Hd_Profile">我的应用</span></a>
					</div>
				</div>
				<div class="menu">
					<div id="friendMenuActive" class="menu-title">
						<a href="<?php echo U('User/allapp');?>" accesskey="3" id="showFriendMenu"><span
							stats="V6Hd_frd" class="menu-title-text">船员题库</span></a>
					</div>
				</div>
			</div>
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
			<div class="main-columns">
				<div id="login_area">
					<div id="logo_student"></div>
					<div id="loginCopyRight">
						该系统由 中国船员考试网 提供技术支持
						<br>
						COPYRIGHT 2001-<?php echo date('Y',time()); ?> 中国船员考试网
					</div>
					<form action="__URL__/doexamlogin" method="post">
					<div id="input_area">
						<img class="handinpaperh2" src="__PUBLIC__/images/home/handinpaperh2.png" alt="" />
						<div class="yourtestcj">
<script type="text/javascript">
var time = 20;
function changeTimes(){
	if(time == 1){
		window.location.href="/index.php/User/myapp";
	}
	jq('span.sss').text(time--);
}
setInterval(changeTimes,1000);

</script>
							考试结束，您的成绩为：<?php echo ($score); ?> <br />
							<span class="sss">20</span>秒后，将自动跳转到会员会员管理页面！
						</div>
					</div>
					</form>
				</div>
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