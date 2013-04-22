<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>网站后台管理中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
* { padding:0; margin:0;font-size: 12px; }
html, body { height:100%; border:none 0; }
#iframe { width:100%; height:100%; border:none 0; }
</style>
<script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/jquery_cookie.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/artDialog.js?skin=black"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript">
(function (config) {
config['lock'] = true;
config['fixed'] = true;
config['okVal'] = '确定';
config['cancelVal'] = '取消';
// [more..]
})(art.dialog.defaults);
</script>
</head>

<body>
<iframe id="iframe" src="__URL__/main"></iframe>
</body>
</html>