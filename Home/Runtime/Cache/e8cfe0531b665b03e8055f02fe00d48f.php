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
			<span class="readmore"><a href="<?php echo U('Public/news','id=89');?>">更多>></a></span>
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
			<h3><a href="<?php echo U('User/allapp');?>">船员题库练习与模拟考试</a></h3>
			<ul>
				<li><a href="<?php echo U('User/allapp','gid=1');?>">适任证书考试</a></li>
				<li><a href="<?php echo U('User/allapp','gid=3');?>">基本证书培训</a></li>
				<li><a href="<?php echo U('User/allapp','gid=4');?>">特殊传播证书培训</a></li>
				<li><a href="<?php echo U('User/allapp','gid=7');?>">其他证书培训</a></li>
			</ul>
		</div>
		<div class="userinfoleftbox4">
			<ul class="otherlink">
				<li class="item1"><a href="##">船员电子申报</a></li>
				<li class="item2"><a href="##">船员考试成绩查询</a></li>
				<li class="item3"><a href="##">海事局考试公告</a></li>
				<li class="item4"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo (session('website_myqq')); ?>&site=qq&menu=yes">联系客服</a></li>
				<li class="item5"><a href="<?php echo U('Public/logout');?>">退出</a></li>
			</ul>
		</div>
	</div>
</div><?php endif; ?>
		<div class="main-column usercenter allapp">
			<form action="__URL__/allapp" method="get" id="appsearchform" class="appsearchform">
				<input type="submit" value="" class="appsearchbtn" />
				<input type="text" value="" name="appsearchvalue" id="" class="appsearchvalue" />
			</form>
			<div class="hotkeywords">热门搜索：<?php echo (session('website_apphotkey')); ?></div>
			<div class="clearfix"></div>
			<div class="rightcontentbox">
				<div class="headertitle"><div class="titleinfo allapps_titleinfo">船员题库练习与模拟考试</div></div>
				<div class="secondtitle">
					<ul>
						<li class="<?php if($_GET['gid']==''){echo 'active';} ?>">
							<a href="<?php echo U('allapp');?>">全部</a></li>
						<li class="<?php if($_GET['gid']==1){echo 'active';} ?>">
							<a href="<?php echo U('allapp','gid=1');?>">适任证书-D</a></li>
						<li class="<?php if($_GET['gid']==2){echo 'active';} ?>">
							<a href="<?php echo U('allapp','gid=2');?>">适任证书-E</a></li>
						<li class="<?php if($_GET['gid']==3){echo 'active';} ?>">
							<a href="<?php echo U('allapp','gid=3');?>">基本证书</a></li>
						<li class="<?php if($_GET['gid']==4){echo 'active';} ?>">
							<a href="<?php echo U('allapp','gid=4');?>">特殊证书</a></li>
							<li class="<?php if($_GET['gid']==5){echo 'active';} ?>">
							<a href="<?php echo U('allapp','gid=5');?>">知识更新</a></li>
							<li class="<?php if($_GET['gid']==6){echo 'active';} ?>">
							<a href="<?php echo U('allapp','gid=6');?>">内河证书</a></li>
						<li class="<?php if($_GET['gid']==7){echo 'active';} ?>">
							<a href="<?php echo U('allapp','gid=7');?>">其它</a></li>
						<li class="sortlable">排序：</li>
						<li class="sortdownloadnum"><a href="<?php echo U('allapp','sort=download');?>">下载量最多</a></li>
						<li class="sortlatestonline"><a href="<?php echo U('allapp','sort=latestonline');?>">最新上线</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="realcontentbox">
					<?php if(empty($appslist)): ?><div class="noapplistforyou">
							暂无数据！
						</div><?php endif; ?>
					<?php if(is_array($appslist)): $i = 0; $__LIST__ = $appslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="itemapp <?php if($i%2 == 0): ?>even<?php endif; ?>">
							<div class="appimgiconleft">
								<img src="<?php if($vo['logo'] != ''): ?>__PUBLIC__/images/appicon/<?php echo ($vo["logo"]); else: ?>__PUBLIC__/images/home/defaultappimg.png<?php endif; ?>" alt="" class="leftappimg" /><br />
								<a href="javascript:iwantapply('<?php echo ($vo["id"]); ?>')" class="">马上报名</a>
							</div>
							<div class="appimgiconright">
							<span class="apptitle"><?php echo ($vo["title"]); ?></span><br />
							<div class="clearfix"></div>
							<div class="appintro">
								<?php if(strlen($vo['intro']) > 38){ echo mb_substr($vo['intro'],0,38,'utf-8').'<a href="javascript:clicktobuy('.$vo[id].')">...详情</a>'; }else{ echo $vo['intro']; } ?>
							</div>
							<p>已经有<?php echo ($vo["hitnum"]); ?>人下载</p>
							<button class="clicktobuy" onclick="clicktobuy(<?php echo ($vo["id"]); ?>)">点击购买</button>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<?php if(!empty($page)): ?><div class="pagelist"><?php echo ($page); ?></div><?php endif; ?>
				<div class="gototop"></div>
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