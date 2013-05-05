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
				<a href="##" stats="homenav_suggest" title="给我们提建议">在线客户服务</a>
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
					<form action="__URL__/doexamlogin" method="post">
					<div id="input_area">
						<div id="button_area" class="examloginbtn">
						<img src="__PUBLIC__/images/home/selecttypeh2.png" alt="" />
							<div class="leftuserimgbox"><img src="<?php echo getuseravatar(); ?>" alt="" /></div>
							<div class="righuserinfotbox">
								<table class="truserinfo">
									<tbody>
									<tr>
										<th>身份证号</th>
										<td><?php echo ($_SESSION['userinfo']['identitycard']); ?></td>
									</tr>
									<tr>
										<th>准考证号</th>
										<td>B12431234565</td>
									</tr>
									<tr>
										<th>姓名</th>
										<td class="usernametd"><?php echo ($_SESSION['userinfo']['account']); ?></td>
									</tr>
									<tr>
										<th>期数</th>
										<td><?php echo ($rs["testqishu"]); ?></td>
									</tr>
									<tr>
										<th>科目</th>
										<td><?php echo ($rs["coursetitle"]); ?></td>
									</tr>
									<tr>
										<th>试卷代码</th>
										<td><?php echo ($rs["testcode"]); ?></td>
									</tr>
									<tr>
										<th>适用对象描述</th>
										<td><?php echo ($rs["suitableusers"]); ?></td>
									</tr>
								</tbody>
							</table>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="cbuttonbox">
						<button title="<?php echo (session('sutudyappid')); ?>" class="examselectbtn sutudyapp">题库练习</button>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<button title="<?php echo (session('sutudyappid')); ?>" class="examselectbtn gototest">开始考试</button>
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
			<a target="_blank" href="http://e.weibo.com/yiche" class="weibo"><?php echo (session('website_sitename2')); ?></a>
			</div>
			<div class="footer_about">
			<ul class="about">
			    <li class="first"><a href="http://corp.bitauto.com/" target="_blank">关于船员考试网</a></li>
			    <li><a href="http://corp.bitauto.com/business/" target="_blank">最新资讯</a></li>
			    <li><a href="http://corp.bitauto.com/news/" target="_blank">常见问题</a></li>
			    <li><a href="http://corp.bitauto.com/job/" target="_blank">联系我们</a></li>
			    <li><a href="http://corp.bitauto.com/about/contact-us.shtml" target="_blank">海事规则</a></li>
			    <li><a href="http://corp.bitauto.com/about/legal-notices.shtml" target="_blank">法律声明</a></li>
			    <li><a href="http://i.bitauto.com/authenservice/register/Licence.aspx" target="_blank">会员服务</a></li>
			    <li><a href="http://www.bitauto.com/feedback/" target="_blank">在线客服</a></li>
			   <li class="last"><a href="http://dealer.easypass.cn/" target="_blank">船员导航网</a></li>
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