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
			<div class="main-columns">
				<div class="trainingtopbox">
					<div class="row1"><img src="<?php echo getuseravatar(); ?>" alt="" /></div>
					<div class="row2">
						您剩下的考试时间为：<span class="trlefttime">1:39:25</span><br />
						您当前所答的是第 <span class="trlefttime">3</span>题，上次的回答是 <br />
						您还有<span class="trlefttime red">2</span>题没有答
						<div class="sizebigger">
							<button>增大字体[Z]</button>
							<button>默认字体[Y]</button>
						</div>
					</div>
					<div class="row3">
						<table class="truserinfo">
							<tr>
								<th>姓名</th>
								<td class="usernametd">李哈哈</td>
							</tr>
							<tr>
								<th>身份证号</th>
								<td>42062419861221721</td>
							</tr>
							<tr>
								<th>准考证号</th>
								<td>B2315645642345</td>
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
							<span class="upanddown1"><a href="##">上一页</a></span>
							<span class="upanddown2"><a href="##">下一页</a></span>
						</div>
						<table class="topicslist">
							<tr>
								<td>1
								</td>
								<td>2
								</td>
								<td>3
								</td>
								<td class="r">4
								</td>
								<td>5
								</td>
								<td>6
								</td>
							</tr>
							<tr>
								<td>1
								</td>
								<td class="w">2
								</td>
								<td>3
								</td>
								<td>4
								</td>
								<td class="w">5
								</td>
								<td>6
								</td>
							</tr>
							<tr>
								<td>1
								</td>
								<td>2
								</td>
								<td class="r">3
								</td>
								<td>4
								</td>
								<td>5
								</td>
								<td>6
								</td>
							</tr>
							<tr>
								<td>1
								</td>
								<td>2
								</td>
								<td>3
								</td>
								<td>4
								</td>
								<td>5
								</td>
								<td>6
								</td>
							</tr>
							<tr>
								<td>1
								</td>
								<td>2
								</td>
								<td>3
								</td>
								<td>4
								</td>
								<td>5
								</td>
								<td>6
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="trainingmiddlebox">
					<div class="trainingmiddleboxtitle">试题题目</div>
					<div class="trainingmiddleboxcontent item">
						<div class="trtitle">【多选】在新研究可使任何植物变成食物来源</div>
						<table class="answerbox">
							<tr>
								<td class="abcheck"><input type="checkbox" name="answer1564" id="answer1564a" /></td>
								<td class="abc">A.</td>
								<td class="lableanswer">在世界上很多欠发达地区，能不能吃饱饭都成为一大问题。</td>
							</tr>
							<tr>
								<td class="abcheck"><input type="checkbox" name="answer1564" id="answer1564b" /></td>
								<td class="abc">B.</td>
								<td class="lableanswer">很多地区因为干旱或是土地等原因无法种植粮食作物，但仍然有不少其他植物存在。</td>
							</tr>
							<tr>
								<td class="abcheck"><input type="checkbox" name="answer1564" id="answer1564c" /></td>
								<td class="abc">C.</td>
								<td class="lableanswer">如果能把这些植物作为食物来源，那无疑能够解决很多饥饿问题。</td>
							</tr>
							<tr>
								<td class="abcheck"><input type="checkbox" name="answer1564" id="answer1564d" /></td>
								<td class="abc">D.</td>
								<td class="lableanswer">这要归功于美国弗吉尼亚理工学院的一项关于使纤维素转化为淀粉的研究。</td>
							</tr>
						</table>
					</div>
					
					<div class="trainingmiddleboxcontent item">
						<div class="trtitle">【多选】在新研究可使任何植物变成食物来源</div>
						<table class="answerbox">
							<tr>
								<td class="abcheck"><input type="checkbox" name="answer1564" id="answer1564a" /></td>
								<td class="abc">A.</td>
								<td class="lableanswer">在世界上很多欠发达地区，能不能吃饱饭都成为一大问题。</td>
							</tr>
							<tr>
								<td class="abcheck"><input type="checkbox" name="answer1564" id="answer1564b" /></td>
								<td class="abc">B.</td>
								<td class="lableanswer">很多地区因为干旱或是土地等原因无法种植粮食作物，但仍然有不少其他植物存在。</td>
							</tr>
							<tr>
								<td class="abcheck"><input type="checkbox" name="answer1564" id="answer1564c" /></td>
								<td class="abc">C.</td>
								<td class="lableanswer">如果能把这些植物作为食物来源，那无疑能够解决很多饥饿问题。</td>
							</tr>
							<tr>
								<td class="abcheck"><input type="checkbox" name="answer1564" id="answer1564d" /></td>
								<td class="abc">D.</td>
								<td class="lableanswer">这要归功于美国弗吉尼亚理工学院的一项关于使纤维素转化为淀粉的研究。</td>
							</tr>
						</table>
					</div>
					
				</div>
				<div class="trainingbottombox">
					<button>上一题[PgUp]</button>
					<button>下一题[PgDn]</button>
					<button>标&nbsp;题[M]</button>
					<button>取消标题[U]</button>
					<button>选&nbsp;题[L]</button>
					<button>交&nbsp;卷[K]</button>
				</div>
				<div class="clearfix"></div>
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