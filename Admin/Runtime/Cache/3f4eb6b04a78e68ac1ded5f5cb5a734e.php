<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>网站后台管理中心</title>
<meta http-equiv=Content-Type content=text/html;charset=utf-8>
</head>
<frameset rows="64,*"  frameborder="NO" border="0" framespacing="0">
	<frame src="__URL__/admin_top" noresize="noresize" frameborder="NO" name="topFrame" scrolling="no" marginwidth="0" marginheight="0" target="main" />
  <frameset cols="185,*"  rows="3560,*" id="frame">
	<frame src="__URL__/admin_menu" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" target="main" />
	<frame src="__URL__/welcome" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" target="_self" />
  </frameset>
<noframes>
  <body></body>
    </noframes>
</html>