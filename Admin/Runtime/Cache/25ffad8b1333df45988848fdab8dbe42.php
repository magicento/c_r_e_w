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
    <td width="1100" height="29" valign="top" background="__PUBLIC__/images/admin/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">基本设置</div></td>
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
            <td class="left_txt">当前位置：基本设置</td>
          </tr>
          <tr>
            <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" height="55" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="10%" height="55" valign="middle"><img src="__PUBLIC__/images/admin/title.gif" width="54" height="55"></td>
                <td width="90%" valign="top"><span class="left_txt2">在这里，您可以根据您的网站要求，修改设置网站的</span><span class="left_txt3">基本参数</span><span class="left_txt2">！</span><br>
                          <span class="left_txt2">包括</span><span class="left_txt3">网站名称，网址，备案号，联系方式，船员职业，关键词，描述信息，支付宝信息，统计信息</span><span class="left_txt2">等以及网站</span><span class="left_txt3">其它相关设置</span><span class="left_txt2">。 </span></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;系统参数设置</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<form name="form1" method="POST" action="__URL__/dosaveconfig">
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">设定网站名称：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="sitename" type="text" id="sitename" size="30" value="<?php echo $config[0]['value'] ?>" /></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">网站名称</td>
              </tr>
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">网站第二名称：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="sitename2" type="text" id="sitename2" size="30" value="<?php echo $config[10]['value'] ?>" /></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">网站第二名称</td>
              </tr>
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">设定网站网址：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="siteurl" type="text" id="siteurl" size="30" value="<?php echo $config[9]['value'] ?>" /></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">网站URL:如www.abc.com</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">网站后台密匙：</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="adminjiami" size="30" value="<?php echo $config[1]['value'] ?>"  /></td>
                <td height="30" class="left_txt">默认密匙为：h8k30i2</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">网站备案证号：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="beianhao" size="30" value="<?php echo $config[2]['value'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt">信息产业部备案号</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">联系电话信息： </td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="tel" size="30"  value="<?php echo $config[3]['value'] ?>" /></td>
                <td height="30" class="left_txt">设置网站联系电话</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">网站客服QQ：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="myqq" size="30" value="<?php echo $config[4]['value'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt">设置网站客服QQ号</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">网站微博地址：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="weibo" size="30" value="<?php echo $config[13]['value'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt">设置网站微博地址(全路径)</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">管理员邮箱：</td>
                <td>&nbsp;</td>
                <td height="30"><input name="mymail" type="text" id="mymail" size="30" value="<?php echo $config[5]['value'] ?>"  /></td>
                <td height="30"><span class="left_txt">设置网站客服Email</span></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">随机考试题目：</td>
                <td>&nbsp;</td>
                <td height="30"><input name="examquestionnum" type="text" id="examquestionnum" size="30" value="<?php echo $config[11]['value'] ?>"  /></td>
                <td height="30"><span class="left_txt">数量</span></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">船员职务：</td>
                <td>&nbsp;</td>
                <td height="30"><input name="jobs" type="text" id="jobs" size="55" value="<?php echo $config[14]['value'] ?>"  /></td>
                <td height="30"><span class="left_txt">请用竖线“|”隔开！</span></td>
              </tr>
              <tr>
              <tr>
                <td height="30" align="right" class="left_txt2">热门应用搜索关键词：</td>
                <td>&nbsp;</td>
                <td height="30"><input name="apphotkey" type="text" id="apphotkey" size="55" value="<?php echo $config[12]['value'] ?>"  /></td>
                <td height="30"><span class="left_txt">请用逗号隔开！</span></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">关键词设置为： </td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="keywords" size="55" value="<?php echo $config[6]['value'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2"><span class="left_txt">设置网站的关键词，更容易被搜索引挚找到。</span></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">签约支付宝账号： </td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="alipayemail" size="55" value="<?php echo $config[17]['value'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2"><span class="left_txt">仅支持即时到账签约账号。</span></td>
              </tr>
               <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">签约支付宝合作ID： </td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="alipaypartner" size="55" value="<?php echo $config[15]['value'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2"><span class="left_txt">支付宝商户中心获取。</span></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">签约支付宝合作密钥： </td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="password" name="alipaykey" size="55" value="<?php echo $config[16]['value'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2"><span class="left_txt red">与上面相关的支付宝KEY。注意保密！</span></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">网站的描述信息： </td>
                <td>&nbsp;</td>
                <td height="30"><textarea name="sitediscription" cols="70" rows="2" class="left_txt"><?php echo $config[7]['value'] ?></textarea></td>
                <td height="30"><span class="left_txt">设置网站的描述信息，更容易被搜索引挚找到。</span></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">网站统计代码：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><textarea name="sitetonji" cols="70" rows="2" class="left_txt"><?php echo $config[8]['value'] ?></textarea></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt">您可以申请51统计，百度统计，谷歌统计 （<a href="http://www.51.la/reg.asp" target="_blank">免费注册51la统计</a>）</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2"></td>
                <td>&nbsp;</td>
                <td height="30">
                	<input type="submit" class="addformbuttons" value="提交数据" />
                	<input type="reset" value="重新填写" class="addformbuttons" />
                </td>
                <td height="30" class="left_txt"></td>
              </tr>
              </form>
            </table></td>
          </tr>
        </table>
        </td>
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