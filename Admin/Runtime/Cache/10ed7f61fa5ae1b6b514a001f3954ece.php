<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>航运考试网---管理员登陆</title>
  <link href="__PUBLIC__/css/admin/skin.css" rel="stylesheet" type="text/css">
  <script language="JavaScript">
  function correctPNG()
  {
      var arVersion = navigator.appVersion.split("MSIE")
      var version = parseFloat(arVersion[1])
      if ((version >= 5.5) && (document.body.filters)) 
      {
         for(var j=0; j<document.images.length; j++)
         {
            var img = document.images[j]
            var imgName = img.src.toUpperCase()
            if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
            {
               var imgID = (img.id) ? "id='" + img.id + "' " : ""
               var imgClass = (img.className) ? "class='" + img.className + "' " : ""
               var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
               var imgStyle = "display:inline-block;" + img.style.cssText 
               if (img.align == "left") imgStyle = "float:left;" + imgStyle
               if (img.align == "right") imgStyle = "float:right;" + imgStyle
               if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
               var strNewHTML = "<span " + imgID + imgClass + imgTitle
               + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
               + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
               + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
               img.outerHTML = strNewHTML
               j = j-1
            }
         }
      }    
  }
  function updateverifyimg(obj){
      obj.src="__APP__/Public/verify/?"+Math.random();
  }
  window.attachEvent("onload", correctPNG);
  </script>
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
        <td width="49%" align="right"><table width="91%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg2">
            <tr>
              <td height="138" valign="top"><table width="89%" height="427" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="149">&nbsp;</td>
                </tr>
                <tr>
                  <td height="80" align="right" valign="top">
                  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr>
                		<td width="35%">&nbsp;</td>
                		<td class="left_txt"><img src="__PUBLIC__/images/admin/logo.png" width="279" height="68"></td>
                	</tr>
               		</table>
                  </td>
                </tr>
                <tr>
                  <td height="198" align="right" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="35%">&nbsp;</td>
                      <td height="25" colspan="2" class="left_txt"><p>1.系统将自动锁定登陆用户的IP地址，非管理人员请离开！</p></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2" class="left_txt"><p>2.如果管理员忘记密码，请联系客服，或者网站开发人员！</p></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2" class="left_txt"><p>3.其它问题，请及时与客服联系完成系统更新服务。</p></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="30%" height="40" class="left_txt"><img src="__PUBLIC__/images/admin/icon-demo.gif" width="16" height="16"><a href="javascript:void(0);"  class="left_txt3"> 使用说明</a> </td>
                      <td width="35%" class="left_txt"><img src="__PUBLIC__/images/admin/icon-login-seaver.gif" width="16" height="16"><a href="javascript:void(0);" class="left_txt3"> 在线客服</a></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
            
        </table></td>
        <td width="1%" >&nbsp;</td>
        <td width="50%" valign="bottom"><table width="100%" height="59" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="4%">&nbsp;</td>
              <td width="96%" height="38"><span class="login_txt_bt">登陆网站后台管理</span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="21"><table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table211" height="328">
                  <tr>
                    <td height="164" colspan="2" align="middle">
                      <form name="loginform" action="__URL__/checkLogin" method="post">
                        <table cellSpacing="0" cellPadding="0" width="100%" border="0" height="143" id="table212">
                          <tr>
                            <td width="13%" height="38" class="top_hui_text"><span class="login_txt">管理员：&nbsp;&nbsp; </span></td>
                            <td height="38" colspan="2" class="top_hui_text"><input name="account" class="editbox4" value="" size="20" autocomplete="off" /></td>
                          </tr>
                          <tr>
                            <td width="13%" height="35" class="top_hui_text"><span class="login_txt"> 密 码： &nbsp;&nbsp; </span></td>
                            <td height="35" colspan="2" class="top_hui_text"><input class="editbox4" type="password" size="20" name="password" autocomplete="off" />
                              <img style="vertical-align: middle;" src="__PUBLIC__/images/admin/luck.gif" width="19" height="18"> </td>
                          </tr>
                          <tr>
                            <td width="13%" height="35" class="top_hui_text" ><span class="login_txt">验证码：</span></td>
                            <td height="35" colspan="2" class="top_hui_text"><input class="wenbenkuang" name="verify" type="text" value="" maxLength=4 size=10 autocomplete="off" />
                              <img onclick="updateverifyimg(this)" class="verify" alt="点击图片可以刷新验证码" src='__APP__/Public/verify/' />
                              </td>
                          </tr>
                          <tr>
                            <td height="35" >&nbsp;</td>
                            <td width="50%" height="35"  class="top_hui_text"><input name="Submit" type="submit" class="button" id="Submit" value="登 陆"> 

                            <input name="cs" type="reset" class="button cancelbutton" id="cs" value="重 置" onClick="showConfirmMsg1()">
                            </td>
                            <td width="65%" class="top_hui_text"></td>
                          </tr>
                        </table>
                        <br>
                    </form>
                  </td>
                  </tr>
                  <tr>
                    <td width="433" height="164" align="right" valign="bottom"><img src="__PUBLIC__/images/admin/login-wel.gif" width="242" height="138"></td>
                    <td width="57" align="right" valign="bottom">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
          </table>
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="login-buttom-bg">
      <tr>
        <td align="center"><span class="login-buttom-txt">Copyright &copy; 2011-<?php echo date('Y',time()) ?> www.crewexam.com</span></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>