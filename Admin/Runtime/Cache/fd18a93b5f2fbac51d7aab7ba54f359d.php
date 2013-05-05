<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>管理页面 头部</title>
<meta http-equiv=Content-Type content=text/html;charset=utf-8>
<meta http-equiv="refresh" content="1800">
<script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/jquery_cookie.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/artDialog.js?skin=black"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>

<script language=JavaScript>

function logout(){
	var jumpurl = "__APP__/Public/logout";
	var throughBox = art.dialog.through;
	throughBox({
		title:'警告',
	    content: '您确定真的要退出本系统么？',
	    icon:'warning',
	    ok: function () {
	    	top.location=jumpurl;
	        return false;
	    },
	    cancelVal: '关闭',
	    cancel: true //为true等价于function(){}
	});
	return false;
}
</script>
<script language=JavaScript1.2>
function showsubmenu(sid) {
	var whichEl = eval("submenu" + sid);
	var menuTitle = eval("menuTitle" + sid);
	if (whichEl.style.display == "none"){
		eval("submenu" + sid + ".style.display=\"\";");
	}else{
		eval("submenu" + sid + ".style.display=\"none\";");
	}
}

</script>

<base target="main">
<link href="__PUBLIC__/css/admin/skin.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0">
<table width="100%" height="64" border="0" cellpadding="0" cellspacing="0" class="admin_topbg">
  <tr>
    <td width="40%" height="64"><a class="adminlogobox" href="/admin.php/Index/welcome">
    	<?php echo ($sitename); ?><span>网站后台</span>
    </a></td>
    <td width="60%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="74%" height="38" class="admin_txt">您好：<b><?php echo ($_SESSION['admininfo']['username']); ?></b>，欢迎登陆使用本系统！您的IP地址为：<?php echo ($_SESSION['admininfo']['lastloginip']); ?>，来自：<?php echo ($area["country"]); echo ($area["area"]); ?></td>
        <td width="22%"><a href="#" target="_self" onClick="logout();"><img src="__PUBLIC__/images/admin/out.gif" alt="安全退出" width="46" height="20" border="0"></a></td>
        <td width="4%">&nbsp;</td>
      </tr>
      <tr>
        <td height="19" colspan="3">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>