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
		<div class="nav-body site-nav">
			<div class="nav-main">
				<div class="menu">
					<div class="menu-title">
						<a ui-async="async" href="##" accesskey="1"><span
							stats="V6Hd_home" class="menu-title-text">首页</span></a>
					</div>
				</div>
				<div class="menu">
					<div class="menu-title" id="profileMenuActive">
						<a href="##" accesskey="2" id="showProfileMenu"><span
							class="menu-title-text" stats="V6Hd_Profile">个人主页</span><span
							class="nav-drop-menu-btn"></span></a>
					</div>
				</div>
				<div class="menu">
					<div id="friendMenuActive" class="menu-title">
						<a href="##" accesskey="3" id="showFriendMenu"><span
							stats="V6Hd_frd" class="menu-title-text">好友</span></a>
					</div>
				</div>
				<div class="menu">
					<div id="showAppMenu" class="menu-title">
						<a href="##"><span class="menu-title-text">应用</span><span
							class="nav-drop-menu-btn"></span> </a>
					</div>
				</div>
			</div>
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
			<td><input type="text" name="identitycard" onblur="checkidentitycard(this)" id="person_id" class="person_id txt" title="15/18位有效身份证号！" /></td>
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
				<option value="大力水手">大力水手</option>
				<option value="船长">船长</option>
				<option value="大副">大副</option>
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
				<a style="vertical-align:middle;" href="##">船员考试网服务条款</a>
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