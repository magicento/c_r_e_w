<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<style type="text/css">
	<!--
	body {
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
		background-color: #F8F9FA;
	}
	-->
	</style>
	<script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/admin/common.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/artDialog/artDialog.js?skin=black"></script>
	<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>
	<link href="__PUBLIC__/css/admin/skin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="__PUBLIC__/images/admin/mail_leftbg.gif"><img src="__PUBLIC__/images/admin/left-top-right.gif" width="17" height="29" /></td>
    <td width="1500" height="29" valign="top" background="__PUBLIC__/images/admin/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">会员列表</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="__PUBLIC__/images/admin/mail_rightbg.gif"><img src="__PUBLIC__/images/admin/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td height="71" valign="middle" background="__PUBLIC__/images/admin/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9"><table width="100%" height="138" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="13" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2">
            <div class="searchform">
            	<span class="deluser"><a class="delalink user" href="##">(解)锁定用户</a></span>
	            <form action="__SELF__" method="post">
	            	<input type="text" name="searchtext" class="searchtext"/>
	            	<input type="submit" value="搜索" class="searchbutton" />
	            </form>
	            
	            <div class="c"></div>
            </div>
            <table class="listtable">
              <thead>
                <tr>
                  <td class="knum">#</td>
                  <td><input type="checkbox" onclick="checkAll('cid',this)" title="全选" name="checkall-toggle"></td> 
                  <!-- <td class="nickname"><a class="<?php echo ($order["nickname"]["p"]); ?>" href="__URL__/index/sortby/nickname/order/<?php echo ($order["nickname"]["s"]); ?>">昵称</a></td> -->
                  <td><a class="<?php echo ($order["account"]["p"]); ?>" href="__URL__/index/sortby/account/order/<?php echo ($order["account"]["s"]); ?>">用户名</a></td>
                  <td><a class="<?php echo ($order["status"]["p"]); ?>" href="__URL__/index/sortby/status/order/<?php echo ($order["status"]["s"]); ?>">状态</a></td>
                  <td><a class="<?php echo ($order["email"]["p"]); ?>" href="__URL__/index/sortby/email/order/<?php echo ($order["email"]["s"]); ?>">邮箱</a></td>
                  <!-- <td><a class="<?php echo ($order["rolename"]["p"]); ?>" href="__URL__/index/sortby/rolename/order/<?php echo ($order["rolename"]["s"]); ?>">用户角色</a></td> -->
                  <td><a class="<?php echo ($order["last_login_time"]["p"]); ?>" href="__URL__/index/sortby/last_login_time/order/<?php echo ($order["last_login_time"]["s"]); ?>">最后访问日期</a></td>
                  <td><a class="<?php echo ($order["create_time"]["p"]); ?>" href="__URL__/index/sortby/create_time/order/<?php echo ($order["create_time"]["s"]); ?>">注册日期</a></td>
                  <td><a class="<?php echo ($order["id"]["p"]); ?>" href="__URL__/index/sortby/id/order/<?php echo ($order["id"]["s"]); ?>">ID编号</a></td>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="row<?php echo ($k%2); ?>">
                  <td><?php echo ($k); ?></td>
                  <td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="cid"></td>
                  <!-- <td class="nickname">
                    <a href="__URL__/edit/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["nickname"]); ?></a>
                  </td> -->
                  <td><a href="__URL__/edit/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["account"]); ?></a></td>
                  <td>
                  <?php if(($vo["block"] == 0)): ?><img src="__PUBLIC__/images/admin/tick.png" alt="正常使用">
                  <?php else: ?>
                  <img src="__PUBLIC__/images/admin/publish_x.png" alt="禁止使用"><?php endif; ?>
                  </td>
                  <td><?php echo ($vo["email"]); ?></td>
                  <!-- <td><?php echo ($vo["rolename"]); ?></td> -->
                  <td><?php echo (date("Y-m-d H:m:s",$vo["last_login_time"])); ?></td>
                  <td><?php echo (date("Y-m-d H:m:s",$vo["create_time"])); ?></td>
                  <td><?php echo ($vo["id"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="15"><div class="result page"><?php echo ($page); ?></div></td>
                </tr>
              </tfoot>
            </table>
            </td>
          </tr>
          </table></td>
      </tr>
    </table></td>
    <td background="__PUBLIC__/images/admin/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle" background="__PUBLIC__/images/admin/mail_leftbg.gif"><img src="__PUBLIC__/images/admin/buttom_left2.gif" width="17" height="17" /></td>
      <td height="17" valign="top" background="__PUBLIC__/images/admin/buttom_bgs.gif"><img src="__PUBLIC__/images/admin/buttom_bgs.gif" width="17" height="17" /></td>
    <td background="__PUBLIC__/images/admin/mail_rightbg.gif"><img src="__PUBLIC__/images/admin/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>

</body>
</html>