<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
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

<link href="__PUBLIC__/css/admin/skin.css" rel="stylesheet" type="text/css" />
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="__PUBLIC__/images/admin/mail_leftbg.gif"><img src="__PUBLIC__/images/admin/left-top-right.gif" width="17" height="29" /></td>
    <td width="1500" height="29" valign="top" background="__PUBLIC__/images/admin/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">添加用户</div></td>
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
            <td class="left_txt location">当前位置：注册用户管理&nbsp;&raquo;&nbsp;添加用户</td>
            <td class="left_txt curdbuttonbox">
                <a class="historygoback" href="javascript:window.history.go(-1)">返回</a>
            </td>
          </tr>
          <tr>
            <td height="20" colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
<form action="__URL__/add" method="post">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
              <tr bgcolor="#f2f2f2">
                <td width="20%" height="30" align="right" class="left_txt2">用户名：</td>
                <td width="3%">&nbsp;</td>
                <td width="32%" height="30"><input type="text" size="30" name="username"></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">用于系统登陆的用户名</td>
              </tr>
              <tr bgcolor="">
                <td width="20%" height="30" align="right" class="left_txt2">密码：</td>
                <td width="3%">&nbsp;</td>
                <td width="32%" height="30"><input type="text" size="30"  name="password"></td>
                <td width="45%" height="30" class="left_txt">用户登陆系统的密码，长度8-12位</td>
              </tr>
              <tr bgcolor="#f2f2f2">
                <td width="20%" height="30"  align="right" class="left_txt2">重复密码：</td>
                <td width="3%">&nbsp;</td>
                <td width="32%" height="30"><input type="text" size="30" name="repassword"></td>
                <td width="45%" height="30" class="left_txt">重复密码</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">昵称：</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" size="30" name="nickname"></td>
                <td height="30" class="left_txt">用户在系统中显示的昵称</td>
              </tr>
              <tr bgcolor="#f2f2f2" >
                <td height="30" align="right" class="left_txt2">邮箱地址：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" ><input type="text" size="30" name="email"></td>
                <td height="30" class="left_txt">重要的验证和密保条件</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">联系电话信息： </td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" size="30" name="telphone"></td>
                <td height="30" class="left_txt">联系电话</td>
              </tr>
              <tr bgcolor="#f2f2f2">
                <td height="30"  align="right" class="left_txt2">用户分组：</td>
                <td>&nbsp;</td>
                <td height="30" ><select name="userrole" style="width:225px;">
                <option value="2">默认权限</option>
                <?php if(is_array($listrole)): $i = 0; $__LIST__ = $listrole;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>">
                    |<?php  $con = count(split('-', $vo['path'])); for ($i=0; $i < $con; $i++) { echo '--'; } ?>
                    <?php echo ($vo['name']); ?>
                  </option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select></td>
                <td height="30" class="left_txt">用户在本系统中的角色</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">备注信息： </td>
                <td>&nbsp;</td>
                <td height="30"><textarea name="remark" id="remark" cols="30" rows="3" style="resize:none;"></textarea></td>
                <td height="30" class="left_txt">简单的备注</td>
              </tr>
              <tr bgcolor="#f2f2f2">
                <td height="30" align="right" class="left_txt2">是否停用此账号：</td>
                <td>&nbsp;</td>
                <td height="30">
                  <label for="block1">停用：</label>
                  <input id="block1" type="radio" size="30" value="1" name="block" style="margin-right:50px">
                  <label for="block0">开启：</label>
                  <input id="block0" checked type="radio" size="30" value="0" name="block">
                </td>
                <td height="30" class="left_txt">屏蔽以后，就不可以登陆</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2"></td>
                <td>&nbsp;</td>
                <td height="30">
                  <input type="submit" name="submit" value="提交信息" style="margin-right:68px;">
                  <input type="reset" name="reset" value="重新填写">
                </td>
                <td height="30" class="left_txt"></td>
              </tr>
</table>
</form>
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