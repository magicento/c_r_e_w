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
        <td height="31"><div class="titlebt">修改用户</div></td>
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
            <td class="left_txt location">当前位置：用户管理</td>
            <td class="left_txt curdbuttonbox">
                <a class="historygoback" href="javascript:window.history.go(-1)">返回</a>
            </td>
          </tr>
          <tr>
            <td height="20" colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
            <img class="useradavtar" src="<?php echo (getuseravatar($vo["id"])); ?>" alt="" />
<form action="__URL__/save" method="post">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
              <tr>
                <td width="20%" height="30" align="right" class="left_txt2">用户名：</td>
                <td width="3%">&nbsp;</td>
                <td width="32%" height="30">
                	<?php echo ($vo['account']); ?>
                </td>
                <td width="45%" height="30" class="left_txt"></td>
              </tr>
              <tr bgcolor="#f2f2f2" >
                <td height="30" align="right" class="left_txt2">邮箱地址：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" ><?php echo ($vo['email']); ?></td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">身份证号码：</td>
                <td>&nbsp;</td>
                <td height="30" ><?php echo ($vo['identitycard']); ?></td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr bgcolor="#f2f2f2" >
                <td height="30" align="right" class="left_txt2">生日：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" ><?php echo ($vo['birthday']); ?></td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">性别：</td>
                <td>&nbsp;</td>
                <td height="30" >
				<?php if($vo['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?>
				</td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr bgcolor="#f2f2f2" >
                <td height="30" align="right" class="left_txt2">职务：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" ><?php echo ($vo['job']); ?></td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">电话：</td>
                <td>&nbsp;</td>
                <td height="30" ><?php echo ($vo['tel']); ?></td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr bgcolor="#f2f2f2" >
                <td height="30" align="right" class="left_txt2">所在地：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" ><?php echo ($vo['address']); ?></td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr >
                <td height="30" align="right" class="left_txt2">账户余额：</td>
                <td>&nbsp;</td>
                <td height="30" ><input type="text" name="money" id="money" value="<?php echo ($money); ?>" />元</td>
                <td height="30" class="left_txt"></td>
              </tr>
              
              
              <?php if(1==2){ ?>
              <tr bgcolor="#f2f2f2">
                <td height="30"  align="right" class="left_txt2">用户分组：</td>
                <td>&nbsp;</td>
                <td height="30" ><select name="userrole" style="width:225px;">
                <option value="<?php echo ($vo['roleid']); ?>"><?php echo ($vo['rolename']); ?></option>
                <?php if(is_array($listrole)): $i = 0; $__LIST__ = $listrole;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>">
                    |<?php  $con = count(split('-', $vo['path'])); for ($i=0; $i < $con; $i++) { echo '--'; } ?>
                    <?php echo ($vo['name']); ?>
                  </option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select></td>
                <td height="30" class="left_txt">用户在本系统中的角色</td>
              </tr>
              <?php } ?>
              
              <tr>
                <td height="30" align="right" class="left_txt2"></td>
                <td>&nbsp;</td>
                <td height="30">
                  <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
                  <input type="submit" name="submit" class="addformbuttons" value="修改信息" style="margin-right:68px;">
                  <input type="reset" name="reset" value="重新填写" class="addformbuttons">
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