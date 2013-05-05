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
        <td height="31"><div class="titlebt">在线报名列表</div></td>
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
            	<span class="deluser"><a class="delalink onlineapply" href="javascript:void(0);">删除信息</a></span>	            
	            <div class="c"></div>
            </div>
            <table class="listtable">
              <thead>
                <tr>
                  <td style="width:20px;" class="knum">#</td>
                  <td style="width:20px;"><input type="checkbox" onclick="checkAll('cid',this)" title="全选" name="checkall-toggle"></td> 
                  <td><a href="##">姓名</a></td>
                  <td style="width:40px;"><a href="##">职务</a></td>
                  <td style="width:100px;"><a href="##">电话</a></td>
                  <td style="width:100px;"><a href="##">邮箱</a></td>
                  <td style="width:200px;"><a href="##">来自于应用</a></td>
                  <td style="width:200px;"><a href="##">地址</a></td>
                  <td style="width:auto"><a href="##">补充说明</a></td>
                  <td style="width:120px;"><a href="##">报名日期</a></td>
                  <td style="width:60px;"><a href="##">ID编号</a></td>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="row<?php echo ($k%2); ?>">
                  <td><?php echo ($k); ?></td>
                  <td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="cid"></td>
                  <td align="left"><?php echo ($vo["name"]); ?></td>
                  <td><?php echo ($vo["job"]); ?></td>
                  <td><?php echo ($vo["tel"]); ?></td>
                  <td><?php echo ($vo["email"]); ?></td>
                  <td><?php echo ($vo["appname"]); ?></td>
                  <td><?php echo ($vo["address"]); ?></td>
                  <td><?php echo ($vo["note"]); ?></td>
                  <td><?php echo (date("Y-m-d H:m:s",$vo["ctime"])); ?></td>
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