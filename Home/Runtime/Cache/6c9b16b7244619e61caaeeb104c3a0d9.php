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
			<a href="/">
			<img width="218" height="55" src="__PUBLIC__/images/home/herderlogo.png" />
			</a>
			</h1>
		</div>
		<div class="nav-body">
			<h2 class="nav-title">中国领先的实名制SNS社交网络</h2>
			<div class="nav-other">
				<div class="menu">
				<a href="##" stats="homenav_suggest" title="给我们提建议">给我们提建议</a>
				</div>
				<div class="menu more">
				<a class="show-more" id="moreWeb" stats="homenav_more" href="##">更多</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-wrapper clearfix">
	<div class="full-page">
		<div class="login-page clearfix">
		<?php if($_SESSION['user_id']== ''): ?><div class="side-column">
	<div class="login-panel">
		<form action="<?php echo U('Public/dologin');?>" class="login-form"
			id="loginForm" method="post">
			<dl class="top clearfix">
				<dt>
					<label for="email">帐号:</label>
				</dt>
				<dd style="border-color: rgb(173, 182, 201);">
					<input type="text" value="邮箱/身份证/电话号码" tabindex="1" id="email"
						class="input-text" name="uaccount" style="color: rgb(136, 136, 136);">
				</dd>
			</dl>
			<dl class="pwd clearfix">
				<dt>
					<label for="password">密码:</label>
				</dt>
				<dd>
					<input type="password" autocomplete="off" tabindex="2"
						class="input-text" error="请输入密码" name="password" id="password">
					<label for="password" id="pwdTip" class="pwdtip">请输入密码</label>
				</dd>
			</dl>
			<div class="clearfix"></div>
			<dl class="savepassword clearfix">
				<dt>
					<label class="labelCheckbox" for="autoLogin"
						title="为了确保您的信息安全，请不要在网吧或者公共机房勾选此项！"> <input
						type="checkbox" tabindex="4" value="true" id="autoLogin"
						name="autoLogin">下次自动登录
					</label>
				</dt>
				<dd>
					<span id="getpassword" class="getpassword"><a
						stats="home_findpassword"
						href="##">忘记密码？</a></span>
				</dd>
			</dl>
			
			<dl class="bottom">
				<input type="hidden" value="/"
					name="origURL">
				<input type="hidden" value="crewexam.com" name="domain">
				<input type="hidden" value="1" name="key_id">
				<input type="hidden" value="web_login" id="captcha_type"
					name="captcha_type">
				<input type="submit" tabindex="5" value="登录"
					stats="loginPage_login_button" class="input-submit login-btn"
					id="login">
			</dl>
		</form>
		<div class="regnow">
			<input type="button" stats="loginPage_signUp_button" tabindex="6"
				value="立即注册帐号" class="input-button login-btn" id="regnow"
				onclick="window.location='<?php echo U('__APP__/index.php/Public/reg') ?>'">
		</div>
		<div class="regnow noet">
			<span class="noteleft">船员考试网使用说明</span>
			根据《中华人民共和国海船船员适任考试和发证规则》（简称11规则）的颁布实施，自2012年下半年开始，省事局船员考试开始启用2012年版新考试大纲。
			船员考试网根据11规则考试大纲要求，推出最新最全面的适任证书相关和模拟考试，为广大船员服务。<br>
			<span class="readmore"><a href="##">更多>></a></span>
		</div>
		
		
	</div>
</div>
<?php else: ?>
	<div class="side-column">
	<div class="login-panel logoutpanel">
		<div class="userinfoleftbox1">
			<table>
				<tr>
					<td><img id="leftuseravar" src="<?php echo getuseravatar(); ?>" class="leftuseravar" alt="" /></td>
					<td>
						<h4><?php echo ($_SESSION['userinfo']['account']); ?></h4><span class="personcard"><?php echo ($_SESSION['userinfo']['identitycard']); ?></span><br />职务：<?php echo ($_SESSION['userinfo']['job']); ?><br /><span class="viplog">0</span><?php echo ceil((time()-$_SESSION['userinfo']['create_time'])/3600/24); ?>天
					</td>
				</tr>
			</table>
		</div>
		<div class="userinfoleftbox2">
			<h3>我的个人资料</h3>
			<ul>
				<li><a href="<?php echo U('User/profile');?>">资料修改</a></li>
				<li><a href="<?php echo U('User/changepwd');?>">密码修改</a></li>
				<li><a href="<?php echo U('User/uploadavatar');?>">上传头像</a></li>
				<li><a href="<?php echo U('User/myapp');?>">我的应用</a></li>
			</ul>
		</div>
		<div class="userinfoleftbox3">
			<h3>船员题库练习与模拟考试</h3>
			<ul>
				<li><a href="<?php echo U('User/allapp','gid=1');?>">适任证书（驾驶）</a></li>
				<li><a href="<?php echo U('User/allapp','gid=2');?>">适任证书（轮机）</a></li>
				<li><a href="<?php echo U('User/allapp','gid=3');?>">船员基本证书</a></li>
				<li><a href="<?php echo U('User/allapp','gid=4');?>">特殊船舶证书</a></li>
			</ul>
		</div>
		<div class="userinfoleftbox4">
			<ul class="otherlink">
				<li class="item1"><a href="##">船员电子申报</a></li>
				<li class="item2"><a href="##">船员考试成绩查询</a></li>
				<li class="item3"><a href="##">海事局考试公告</a></li>
				<li class="item4"><a href="##">联系客服</a></li>
				<li class="item5"><a href="<?php echo U('Public/logout');?>">退出</a></li>
			</ul>
		</div>
	</div>
</div><?php endif; ?>
		<div class="main-column usercenter news">
			<div class="rightcontentbox">
				<div class="headertitle"><div class="titleinfo">中移动：对雅安所有移动用户实施免停机服务</div></div>
				<div class="realcontentbox">
					<div class="newsbox">
						
						<p>一方有难，八方支援，国内各大机构、企业和个人纷纷捐款捐物，支援灾区。而在这之中，以互联网公司为代表的科技企业的表现尤其突出。据不完全统计，截止至4月20日23时30分，国内主要科技企业捐款总额已超过1亿元。</p>
						<p></p><p>捐款数额为5000万：富士康；</p>
						<p>捐款数额为500万元及以上：百度、腾讯、阿里巴巴、盛大网络、网易、苏宁（另加价值200万元的物资）；</p>
						<p>捐款数额为300万元以上：奇虎360、370W游戏；</p>
						<p>捐款数额为300万元：搜狐、新浪、完美世界；</p>
						<p>捐款数额为200万元：京东、国美、凡客诚品、神州数码；</p>
						<p>捐款数额为100万元：微软、小米科技、金山软件、UC优视、亚马逊中国、乐视网、分众传媒、迅雷、OPPO、人民网等。</p>
						<p>同时，当当网、一号店、宇龙酷派则通过捐赠物资的方式支援灾区。</p>
						<p>此外，此前刚刚辞任巨人网络CEO的史玉柱再次成为焦点，其共向壹基金和新浪微博微公益平台捐款700万元，成为目前捐款最多的个人。同时，在上述捐款中，壹基金及直接投放至当地民政部门成为了各大企业主要的捐款渠道。据目前透露的数据显示，由壹基金所筹集的救灾款项已超过2000万元。</p><p></p>
												
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div id="footer">
	<div class="site-footer">
		<div id="footer0904">
			<div class="footer_c">购车咨询：4000-168-168（工作日 9:00-17:30） 传真：010-68492726
			<a target="_blank" href="http://e.weibo.com/yiche" class="weibo">易车网</a></div>
			<div class="footer_about">
			<ul class="about">
			    <li class="first"><a href="http://corp.bitauto.com/" target="_blank">关于易车</a></li>
			    <li><a href="http://corp.bitauto.com/business/" target="_blank">业务介绍</a></li>
			    <li><a href="http://corp.bitauto.com/news/" target="_blank">易车动态</a></li>
			    <li><a href="http://corp.bitauto.com/job/" target="_blank">加入易车</a></li>
			    <li><a href="http://corp.bitauto.com/about/contact-us.shtml" target="_blank">联系我们</a></li>
			    <li><a href="http://corp.bitauto.com/about/legal-notices.shtml" target="_blank">法律声明</a></li>
			    <li><a href="http://i.bitauto.com/authenservice/register/Licence.aspx" target="_blank">服务协议</a></li>
			    <li><a href="http://ir.bitauto.com/" target="_blank">Investor Relations</a></li>
			    <li><a href="http://www.bitauto.com/feedback/" target="_blank">我要提意见</a></li>
			    <li><a href="http://ued.bitauto.com/" target="_blank">用户体验中心</a></li>
			   <li class="last"><a href="http://dealer.easypass.cn/" target="_blank">车易通</a></li>
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