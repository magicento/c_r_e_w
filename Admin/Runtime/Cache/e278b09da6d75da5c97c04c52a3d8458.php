<?php if (!defined('THINK_PATH')) exit();?><link href="__PUBLIC__/css/admin/skin.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EEF2FB;
}
-->
</style>
<body class="welcomebody">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="__PUBLIC__/images/admin/mail_leftbg.gif"><img src="__PUBLIC__/images/admin/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" <img src="__PUBLIC__/images/admin/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">欢迎界面</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="__PUBLIC__/images/admin/mail_rightbg.gif"><img src="__PUBLIC__/images/admin/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="__PUBLIC__/images/admin/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" valign="top">&nbsp;</td>
        <td>&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><span class="left_bt">感谢您使用 商家信息网 网站管理系统程序</span><br>
              <br>
            <span class="left_txt">&nbsp;<img src="__PUBLIC__/images/admin/ts.gif" width="16" height="16"> 提示：<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您现在使用的是www.865171.cn开发的一套用于构建商务信息类门户型网站的专业系统！如果您有任何疑问请点左下解的</span><span class="left_ts">在线客服</span><span class="left_txt">进行咨询！<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;七大栏目完美整合，一站通使用方式，功能强大，操作简单，后台操作易如反掌，只需会打字，会上网，就会管理网站！<br>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;此程序是您建立地区级商家信息门户的首选方案！　 <br>
</span></td>
        <td width="7%">&nbsp;</td>
        <td width="40%" valign="top"><table width="100%" height="144" border="0" cellpadding="0" cellspacing="0" class="line_table">
          <tr>
            <td width="7%" height="27" background="__PUBLIC__/images/admin/news-title-bg.gif"><img src="__PUBLIC__/images/admin/news-title-bg.gif" width="2" height="27"></td>
            <td width="93%" background="__PUBLIC__/images/admin/news-title-bg.gif" class="left_bt2">最新动态</td>
          </tr>
          <tr>
            <td height="102" valign="top">&nbsp;</td>
            <td height="102" valign="top"></td>
          </tr>
          <tr>
            <td height="5" colspan="2">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><!--JavaScript部分-->
              <SCRIPT language=javascript>
function secBoard(n){
for(i=0;i<secTable.rows[0].cells.length;i++)
secTable.rows[0].cells[i].className="sec1";
secTable.rows[0].cells[n].className="sec2";
for(i=0;i<mainTable.tBodies.length;i++)
mainTable.tBodies[i].style.display="none";
mainTable.tBodies[n].style.display="block";
}
          </SCRIPT>
              <!--HTML部分-->
              <TABLE width=72% border=0 cellPadding=0 cellSpacing=0 id=secTable>
                <TBODY>
                  <TR align=middle height=20>
                    <TD align="center" class=sec2 onclick=secBoard(0)>验证信息</TD>
                    <TD align="center" class=sec1 onclick=secBoard(1)>统计信息</TD>
                    <TD align="center" class=sec1 onclick=secBoard(2)>系统参数</TD>
                    <TD align="center" class=sec1 onclick=secBoard(3)>版权说明</TD>
                  </TR>
                </TBODY>
              </TABLE>
          <TABLE class=main_tab id=mainTable cellSpacing=0 cellPadding=0 width=100% border=0>
                <!--关于TBODY标记-->
                <TBODY style="DISPLAY: block">
                  <TR>
                    <TD vAlign=top align=middle width="579">
                      <TABLE width=98% height="133" border=0 align="center" cellPadding=0 cellSpacing=0>
                        <TBODY>
                          <TR>
                            <TD height="5" colspan="3"></TD>
                          </TR>
                          <TR>
                            <TD width="4%" height="28" background="__PUBLIC__/images/admin/news-title-bg.gif"></TD>
                            <TD height="25" colspan="2" background="__PUBLIC__/images/admin/news-title-bg.gif" class="left_txt">亲爱的管理员： <font color="#FFFFFF" class="left_ts"><b></b></TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD width="42%" height="25" bgcolor="#FAFBFC"><span class="left_txt">您有未验证分类信息： </span>
                               
                                <span class="left_ts"> </span></TD>
                            <TD width="54%" height="25" bgcolor="#FAFBFC"><span class="left_txt">您有未验证广告张贴： </span>
                               
                                <span class="left_ts"> </span></TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">您有未验证商家展示： </span>
                               
                                <span class="left_ts"> </span></TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">您有未验证网上商城： </span>
                               
                                <span class="left_ts"> </span></TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">您有未验证网上名片： </span>
                                <span class="left_ts"> </span></TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">您有未验证市场联盟： </span>
                               
                                <span class="left_ts"> </span></TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">您有未验证市场资讯： </span>
                               
                                <span class="left_ts"> </span></TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">您有未验证商家商品： </span>
                                <span class="left_ts"> </span></TD>
                          </TR>
                          <TR>
                            <TD height="5" colspan="3"></TD>
                          </TR>
                        </TBODY>
                    </TABLE></TD>
                  </TR>
                </TBODY>
                <!--关于cells集合-->
                <TBODY style="DISPLAY: none">
                  <TR>
                    <TD vAlign=top align=middle width="579">
                      <TABLE width=98% height="133" border=0 align="center" cellPadding=0 cellSpacing=0>
                        <TBODY>
                          <TR>
                            <TD height="5" colspan="3"></TD>
                          </TR>
                          <TR>
                            <TD width="4%" height="28" background="__PUBLIC__/images/admin/news-title-bg.gif"></TD>
                            <TD colspan="2" background="__PUBLIC__/images/admin/news-title-bg.gif" class="left_txt">现有会员：名&nbsp;&nbsp; 其中：                                名&nbsp;&nbsp;&nbsp;&nbsp;名&nbsp;&nbsp;&nbsp;&nbsp;名</TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD width="42%" height="25" bgcolor="#FAFBFC"><span class="left_txt">本站现有分类信息： </span><span class="left_txt">条</span></TD>
                            <TD width="54%" bgcolor="#FAFBFC"><span class="left_txt">本站现有广告张贴： </span><span class="left_txt">条</span></TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">本站现有商家展示： </span><span class="left_txt">个</span></TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">本站现有网上商城： </span><span class="left_txt">个</span></TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">本站现有网上名片： </span><span class="left_txt">个</span></TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">本站现有市场联盟： </span><span class="left_txt">个</span></TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">本站现有市场资讯： </span><span class="left_txt">条</span></TD>
                            <TD height="25" bgcolor="#FAFBFC"><span class="left_txt">本站现有商家商品： </span><span class="left_txt">个</span></TD>
                          </TR>
                          <TR>
                            <TD height="5" colspan="3"></TD>
                          </TR>
                        </TBODY>
                    </TABLE></TD>
                  </TR>
                </TBODY>
                <!--关于tBodies集合-->
                <TBODY style="DISPLAY: none">
                  <TR>
                    <TD vAlign=top align=middle width="579">
                      <TABLE width=98% border=0 align="center" cellPadding=0 cellSpacing=0>
                        <TBODY>
                          <TR>
                            <TD colspan="3"></TD>
                          </TR>
                          <TR>
                            <TD height="5" colspan="3"></TD>
                          </TR>
                          <TR>
                            <TD width="4%" height="25" background="__PUBLIC__/images/admin/news-title-bg.gif"></TD>
                            <TD height="25" colspan="2" background="__PUBLIC__/images/admin/news-title-bg.gif" class="left_txt">
                              <span class="TableRow2">运行环境：<?php echo ($info['运行环境']); ?></span>
                            </TD>
                          </TR>
                          <TR>
                            <TD height="25" bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD width="42%" height="25" bgcolor="#FAFBFC"><span class="left_txt">
                              操作系统：<?php echo ($info['操作系统']); ?>
                            </span></TD>
                            <TD width="54%" height="25" bgcolor="#FAFBFC"><span class="left_txt">ThinkPHP版本：<?php echo ($info['ThinkPHP版本']); ?></span></TD>
                          </TR>
                          <TR>
                            <TD height="25" bgcolor="#FAFBFC"></TD>
                            <TD height="25" colspan="0" bgcolor="#FAFBFC"><span class="left_txt">上传附件限制：<?php echo ($info['上传附件限制']); ?></span></TD>
                            <TD height="25" colspan="0" bgcolor="#FAFBFC"><span class="left_txt">执行时间限制：<?php echo ($info['执行时间限制']); ?></span></TD>
                          </TR>
                          <TR>
                            <TD height="25" bgcolor="#FAFBFC"></TD>
                            <TD height="25" colspan="0" bgcolor="#FAFBFC"><span class="left_txt">服务器时间： <?php echo ($info['服务器时间']); ?></span></TD>
                            <TD height="25" colspan="0" bgcolor="#FAFBFC"><span class="left_txt">北京时间：<?php echo ($info['北京时间']); ?></span></TD>
                          </TR>
                          <TR>
                            <TD height="25" bgcolor="#FAFBFC"></TD>
                            <TD height="25" colspan="0" bgcolor="#FAFBFC"><span class="left_txt">服务器IP：<?php echo ($info['服务器域名/IP']); ?></span></TD>
                            <TD height="25" colspan="0" bgcolor="#FAFBFC"><span class="left_txt">剩余空间： <?php echo ($info['剩余空间']); ?></span></TD>
                          </TR>
                          <TR>
                            <TD height="25" bgcolor="#FAFBFC"></TD>
                            <TD height="25" colspan="0" bgcolor="#FAFBFC"><span class="left_txt">Magic Quotes Runtime：<?php if($info['magic_quotes_runtime'] == 'YES' ): ?><img src="__PUBLIC__/images/admin/g.gif" width="12" height="12"><?php else: ?><img src="__PUBLIC__/images/admin/X.gif" width="12" height="13"><?php endif; ?>
                            </span>
                            
                            </TD>
                            <TD height="25" colspan="0" bgcolor="#FAFBFC"><span class="left_txt">Magic Quotes GPC： <?php if($info['magic_quotes_gpc'] == 'YES' ): ?><img src="__PUBLIC__/images/admin/g.gif" width="12" height="12"><?php else: ?><img src="__PUBLIC__/images/admin/X.gif" width="12" height="13"><?php endif; ?></span>
                            
                            </TD>
                          </TR>                       
                          <TR>
                            <TD height="5" colspan="3"></TD>
                          </TR>
                        </TBODY>
                    </TABLE></TD>
                  </TR>
                </TBODY>
                <!--关于display属性-->
                <TBODY style="DISPLAY: none">
                  <TR>
                    <TD vAlign=top align=middle width="579">
                      <TABLE width=98% border=0 align="center" cellPadding=0 cellSpacing=0>
                        <TBODY>
                          <TR>
                            <TD colspan="3"></TD>
                          </TR>
                          <TR>
                            <TD height="5" colspan="3"></TD>
                          </TR>
                          <TR>
                            <TD width="4%" background="__PUBLIC__/images/admin/news-title-bg.gif"></TD>
                            <TD width="91%" background="__PUBLIC__/images/admin/news-title-bg.gif" class="left_ts">本程序的相关说明：</TD>
                            <TD width="5%" background="__PUBLIC__/images/admin/news-title-bg.gif" class="left_txt">&nbsp;</TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD bgcolor="#FAFBFC" class="left_txt"><span class="left_ts">1、</span>本程序是基于开源框架ThinkPHP开发完成(QQ:136553507) </TD>
                            <TD bgcolor="#FAFBFC" class="left_txt">&nbsp;</TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD bgcolor="#FAFBFC" class="left_txt"><span class="left_ts">2、</span>本程序仅提供使用，任何违反互联网规定的行为，自行负责！</TD>
                            <TD bgcolor="#FAFBFC" class="left_txt">&nbsp;</TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD bgcolor="#FAFBFC" class="left_txt"><span class="left_ts">3、</span> 支持作者的劳动，请保留版权。</TD>
                            <TD bgcolor="#FAFBFC" class="left_txt">&nbsp;</TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD bgcolor="#FAFBFC" class="left_txt"><span class="left_ts">4、</span>程序使用，技术支持，二次开发，请联系www.lamp99.com，或者电话：13407131728</TD>
                            <TD bgcolor="#FAFBFC" class="left_txt">&nbsp;</TD>
                          </TR>
                          <TR>
                            <TD height="5" colspan="3"></TD>
                          </TR>
                        </TBODY>
                    </TABLE></TD>
                  </TR>
                </TBODY>
            </TABLE></td>
        <td>&nbsp;</td>
        <td valign="top"><table width="100%" height="144" border="0" cellpadding="0" cellspacing="0" class="line_table">
          <tr>
            <td width="7%" height="27" background="__PUBLIC__/images/admin/news-title-bg.gif"><img src="__PUBLIC__/images/admin/news-title-bg.gif" width="2" height="27"></td>
            <td width="93%" background="__PUBLIC__/images/admin/news-title-bg.gif" class="left_bt2">程序说明</td>
          </tr>
          <tr>
            <td height="102" valign="top">&nbsp;</td>
            <td height="102" valign="top"><label></label>
              <label>
              <textarea name="textarea" cols="48" rows="8" class="left_txt">一、专业的地区级商家门户建站首选方案！
二、全站一号通，一次注册，终身使用，一个帐号，全站通用！
三、分类信息、商家展示（百业联盟）、网上商城、网上名片（网上黄页）、广告张贴、市场联盟、市场资讯七大栏目完美整合。
四、界面设计精美，后台功能强大。傻瓜式后台操作，无需专业的网站制作知识，只要会打字，就会管理维护网站。</textarea>
              </label></td>
          </tr>
          <tr>
            <td height="5" colspan="2">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="40" colspan="4"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
          <tr>
            <td></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="2%">&nbsp;</td>
        <td width="51%" class="left_txt"><img src="__PUBLIC__/images/admin/icon-mail2.gif" width="16" height="11"> 客户服务邮箱：1725440647@qq.com<br>
              <img src="__PUBLIC__/images/admin/icon-phone.gif" width="17" height="14"> 官方网站：http://www.17tian.com</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td background="__PUBLIC__/images/admin/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" background="__PUBLIC__/images/admin/mail_leftbg.gif"><img src="__PUBLIC__/images/admin/buttom_left2.gif" width="17" height="17" /></td>
    <td background="__PUBLIC__/images/admin/buttom_bgs.gif"><img src="__PUBLIC__/images/admin/buttom_bgs.gif" width="17" height="17"></td>
    <td valign="bottom" background="__PUBLIC__/images/admin/mail_rightbg.gif"><img src="__PUBLIC__/images/admin/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>
</body>