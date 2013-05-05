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
				<div class="trainingtopbox">
					<div class="row1"><img src="<?php echo getuseravatar(); ?>" alt="" /></div>
					<div class="row2">
						您本次练习已经用时：<span class="trlefttime hasgo">00:00:00</span><br />
						您当前所答的是第 <span class="trlefttime currenttm">1</span>题，上次的回答是 <br />
						您还有<span class="trlefttime leftquestion red"><?php echo (session('currentapp_question_num')); ?></span>题没有答
						<div class="sizebigger">
							<button class="biggerfont">增大字体[Z]</button>
							<button class="defaultfont">默认字体[Y]</button>
						</div>
					</div>
					<div class="row3">
						<table class="truserinfo">
							<tr>
								<th>姓名</th>
								<td class="usernametd"><?php echo ($_SESSION['userinfo']['account']); ?></td>
							</tr>
							<tr>
								<th>身份证号</th>
								<td><?php echo ($_SESSION['userinfo']['identitycard']); ?></td>
							</tr>
							<tr>
								<th>准考证号</th>
								<td><?php echo (session('seatNo')); ?></td>
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
								<td class="shiyongduixiang"><?php echo ($rs["suitableusers"]); ?></td>
							</tr>
						</table>
					</div>
					<div class="row4">
						<div class="chosetopicbox">
							<span class="ctopic">选择题目</span>
							<span class="upanddown1"><a href="javascript:void(0)">上一页</a></span>
							<span class="upanddown2"><a href="javascript:void(0)">下一页</a></span>
						</div>
						<?php echo ($alltables); ?>
					</div>
				</div>
				<div class="trainingmiddlebox">
					<div class="trainingmiddleboxtitle">试题题目</div>
					<div class="questionbox"></div>					
				</div>
				<div class="trainingbottombox">
					<button value="0" class="prevquestion">上一题[PgUp]</button>
					<button value="2" class="nextquestion">下一题[PgDn]</button>
					<button value="1" class="markquestion">标&nbsp;记[M]</button>
					<button value="1" class="unmarkquestion">取消标记[U]</button>
					<button value="0" class="selectquestion">选&nbsp;题[L]</button>
					<button class="handinpaper">交&nbsp;卷[K]</button>
				</div>
				<div class="testoverbox">
					<div class="firsttip">您是否要结束考试？
						<button value="0" class="areyousureovertest1n">否</button>
						<button value="1" class="areyousureovertest1y">是</button>
					</div>
					<div class="secondtip">您确定真的要结束考试？
						<button value="0" class="areyousureovertest2n">否</button>
						<button value="1" class="areyousureovertest2y">是</button>
					</div>
					<div class="thirdtip">如果你都已经检查完毕，可以结束考试，结束吗？
						<button value="0" class="areyousureovertest3n">否</button>
						<button value="1" class="areyousureovertest3y">是</button>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<script>
window.onbeforeunload = function(event) {
	//return confirm("确定离开当前这个页面吗？请谨慎操作！");
}
</script>
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