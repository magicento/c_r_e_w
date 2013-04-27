<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>页面提示</title>
  <link href="__PUBLIC__/css/admin/skin.css" rel="stylesheet" type="text/css">
  <script language="JavaScript">
  function refresh(){
    location.href = "<?php echo ($jumpUrl); ?>";
  }
  setTimeout("refresh()",<?php echo ($waitSecond); ?>000);
  </script>
  <style type="text/css">
   *{margin:0px;padding:0px;font-size:12px;font-family:微软雅黑,Arial,Verdana;}
   #wrapper{width:450px;height:200px;background:#F5F5F5;border:1px solid #D2D2D2;position:absolute;top:40%;left:50%;margin-top:-100px;margin-left:-225px;}
   p.msg-title{width:100%;height:30px;line-height:30px;text-align:center;color:#EE7A38;margin-top:40px;font:14px Arial,Verdana;font-weight:bold;}
   p.message{width:100%;height:40px;line-height:40px;text-align:center;color:blue;margin-top:5px;margin-bottom:5px;}
   p.error{width:100%;height:40px;line-height:40px;text-align:center;color:red;margin-top:5px;margin-bottom:5px;letter-spacing:8px;font-size: 14px;}
   p.notice{width:100%;height:25px;line-height:25px;text-align:center;}
  </style>
</head>
<body class="loginpage">
<table width="100%" height="166" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="42" valign="top"><table width="100%" height="42" border="0" cellpadding="0" cellspacing="0" class="login_top_bg">
      <tr>
        <td width="1%" height="21">&nbsp;</td>
        <td height="42">&nbsp;</td>
        <td width="17%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg">
      <tr>
        <td width="100%" align="center">
          <div id="wrapper">
           <p class="msg-title"><?php echo ($msgTitle); ?></p>
           <?php if(isset($message)): ?><p class="message"><?php echo ($message); ?></p><?php endif; ?>
           <?php if(isset($error)): ?><p class="error"><?php echo ($error); ?></p><?php endif; ?>
           <?php if(isset($closeWin)): ?><p class="notice">系统将在 <span style="color:blue;font-weight:bold"><?php echo ($waitSecond); ?>秒</span> 后自动关闭，如果不想等待,直接点击 <a class="aclickhrer" href="<?php echo ($jumpUrl); ?>">这里</a> 关闭</p><?php endif; ?>
           <?php if(!isset($closeWin)): ?><p class="notice">系统将在 <span style="color:blue;font-weight:bold"><?php echo ($waitSecond); ?>秒</span> 后自动跳转，如果不想等待,直接点击 <a class="aclickhrer" href="<?php echo ($jumpUrl); ?>">这里</a> 关闭</p><?php endif; ?>
          </div>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="login-buttom-bg">
      <tr>
        <td align="center"><span class="login-buttom-txt" onclick="window.open('http://www.lamp99.com')">Copyright &copy; 2011-2012 www.lamp99.com</span></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>