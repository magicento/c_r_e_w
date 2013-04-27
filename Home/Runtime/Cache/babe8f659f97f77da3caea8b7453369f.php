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
								<td>19568</td>
							</tr>
							<tr>
								<th>科目</th>
								<td>轮机英语</td>
							</tr>
							<tr>
								<th>试卷代码</th>
								<td>805</td>
							</tr>
							<tr>
								<th>适用对象描述</th>
								<td>录制需要</td>
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
			<div class="footer_c">中国船员考试网客户服务热线：027-822997280（工作日 9:00-17:30） 
			<a target="_blank" href="http://e.weibo.com/yiche" class="weibo">船员考试网</a>
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
			<p>CopyRight &copy; 2000-2013 BitAuto,All Rights Reserved 版权所有 北京易车信息科技有限公司</p>
			<p>电信业务审批[2006]字第92号；经营许可证编号： <a href="http://www.bitauto.com/license/ICP.shtml" target="_blank">京ICP证060175号</a>；公安备案号码：京公网安备 110108901166号</p>
			<p><a href="http://www.bitauto.com/license/video.shtml" target="_blank">网络视听许可证0110543号</a> <a href="http://www.bitauto.com/license/audio.shtml" target="_blank">广播电视节目制作许可证1238号</a> <a href="http://www.bitauto.com/license/pub.shtml" target="_blank">新出网证(京)字182号</a> <a href="http://www.bitauto.com/license/mapping.shtml" target="_blank">乙测资字11005048</a></p>
			</div>
			<div class="icpbox"><a href="##" target="_blank" class="icp"><img src="__PUBLIC__/images/home/footerbeian.png"></a></div>
			</div>
	</div>
</div>
</body>
</html>