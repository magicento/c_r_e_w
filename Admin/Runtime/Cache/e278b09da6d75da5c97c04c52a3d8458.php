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
<script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/admin/common.js"></script>

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
        <td colspan="2" valign="top"><span class="left_bt">感谢您使用  <?php echo (session('website_sitename')); ?> 网站管理系统程序</span><br>
              <br>
            <span class="left_txt">&nbsp;<img src="__PUBLIC__/images/admin/ts.gif" width="16" height="16">快捷操作</span>
           <div class="kuaijiecaozuo">
           <table>
           	<tr>
           		<td><a class="usermanage" href="__APP__/Config"><img src="__PUBLIC__/images/admin/applescript_utility.png" alt="" /></a></td>
           		<td><a class="appmanage" href="__APP__/App/listapp"><img src="__PUBLIC__/images/admin/keyboard.png" alt="" /></a></td>
           		<td><a class="coursemanage" href="__APP__/App/listcourse"><img src="__PUBLIC__/images/admin/kemu.png" alt="" /></a></td>
           		<!-- <td><a href="##"><img src="__PUBLIC__/images/admin/folder_yellow_software_1.png" alt="" /></a></td> -->
           		<td><a class="questionmanage" href="__APP__/App/listquestions"><img src="__PUBLIC__/images/admin/news_unsubscribe.png" alt="" /></a></td>
           		<td><a class="articlemanage" href="__APP__/Articles/index"><img src="__PUBLIC__/images/admin/news.png" alt="" /></a></td>
           		<td><a class="topupmanage" href="__APP__/User/index"><img src="__PUBLIC__/images/admin/money.png" alt="" /></a></td>
           		<td><a class="applymanage" href="__APP__/User/onlineapplylist"><img src="__PUBLIC__/images/admin/on_line.png" alt="" /></a></td>
           	</tr>
           	<tr>
           		<td>常规配置</td>
           		<td>应用管理</td>
           		<td>科目管理</td>
           		<!-- <td>软件管理</td> -->
           		<td>考题管理</td>
           		<td>文章管理</td>
           		<td>会员充值</td>
           		<td>在线报名</td>
           	</tr>
           </table>
           
           </div>
            </td>
        <td width="7%">&nbsp;</td>
        <td width="40%" valign="top"><table width="100%" height="144" border="0" cellpadding="0" cellspacing="0" class="line_table">
          <tr>
            <td width="7%" height="27" background="__PUBLIC__/images/admin/news-title-bg.gif"><img src="__PUBLIC__/images/admin/news-title-bg.gif" width="2" height="27"></td>
            <td width="93%" background="__PUBLIC__/images/admin/news-title-bg.gif" class="left_bt2">最新统计</td>
          </tr>
          <tr>
            <td height="102" valign="top">&nbsp;</td>
            <td class="websitetongjitd" height="102" valign="top">会员：<?php echo ($usernum); ?>位 <br />
            <a href="<?php echo U('Config/order');?>">未受理的订单：<?php echo ($ordernum); ?>个 <br />
            成功交易总金额：<?php echo ($allmoney); ?>元</a></td>
          </tr>
          <tr>
            <td height="5" colspan="2"></td>
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
              <TABLE width=100% border=0 cellPadding=0 cellSpacing=0 id=secTable>
                <TBODY>
                  <TR align=middle height=20>
                    <TD align="center" class=sec2 onclick=secBoard(0)>系统参数</TD>
                    <TD align="center" class=sec1 onclick=secBoard(1)>版权说明</TD>
                  </TR>
                </TBODY>
              </TABLE>
          <TABLE class=main_tab id=mainTable cellSpacing=0 cellPadding=0 width=100% border=0>
                <!--关于tBodies集合-->
                <TBODY style="DISPLAY: block">
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
                            <TD bgcolor="#FAFBFC" class="left_txt"><span class="left_ts">4、</span>程序使用，技术支持，二次开发，请联系www.lamp99.com(zhangjiachao.cn)</TD>
                            <TD bgcolor="#FAFBFC" class="left_txt">&nbsp;</TD>
                          </TR>
                          <TR>
                            <TD bgcolor="#FAFBFC">&nbsp;</TD>
                            <TD bgcolor="#FAFBFC" class="left_txt"><span class="left_ts">5、</span>联系电话：13407131728</TD>
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
              <textarea name="textarea" cols="72" rows="6" class="left_txt">一、专业的PHP网站系统，在线ERP系统，门户网建设方案！
二、管理员首次登陆后台，请修改后台密码和后台登陆密钥！
三、请妥善保管好网站的后台信息，网站的FTP信息和数据库信息。
四、若是因为以上保密工作失误造成的网站一系列问题，或者引发不良后果，由运营团队自行全权负责。
五、如果网站出现异常，请及时和开发人员联系。
六、如果管理员忘记了密码，或者登陆址，也请联系开发人员处理。
七、网站即交付之日起后续仅提供操作和简单技术上的指导，不接受无条件再次开发和修改。
八、本系统程序仅<?php echo (session('website_sitename')); ?>独家授权使用，在未经开发团队许可的情况下不可以对任何第三方个人或公司复制、兜售本程序。</textarea>
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
        <td width="51%" class="left_txt"><img src="__PUBLIC__/images/admin/icon-mail2.gif" width="16" height="11"> 客户服务邮箱：info@lamp99.com&nbsp;&nbsp;&nbsp;&nbsp;<img src="__PUBLIC__/images/admin/icon-phone.gif" width="17" height="14"> 官方网站：http://www.lamp99.com</td>
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