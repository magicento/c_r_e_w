<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script charset="utf-8" src="__PUBLIC__/js/editor/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__PUBLIC__/js/editor/kindeditor/lang/zh_CN.js"></script>
<script>
        var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[name="content"]', {
				allowFileManager : true
			});
		});
</script>
</head>
<body>
<form action="" method="post">
	<textarea name="content"></textarea>
	<input type="submit" value="..." />
</form>
</body>
</html>