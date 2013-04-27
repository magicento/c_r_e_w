<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
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

<script type="text/javascript" src="__PUBLIC__/js/artDialog/artDialog.js?skin=black"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/admin/common.js"></script>	
	
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
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<link href="__PUBLIC__/css/admin/skin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form name="form1" method="post" action="__URL__/doadd">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="__PUBLIC__/images/admin/mail_leftbg.gif"><img src="__PUBLIC__/images/admin/left-top-right.gif" width="17" height="29" /></td>
    <td width="1100" height="29" valign="top" background="__PUBLIC__/images/admin/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">编辑文章</div></td>
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
            <td class="left_txt">当前位置：文章编辑</td>
          </tr>
          <tr>
            <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;文章编辑选项</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">文章标题：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2">
                	<input name="title" type="text" id="" size="30" value="<?php echo $article['title'] ?>" />
                	<span class="newsblock"><input type="checkbox" value="1" name="isdel" <?php if($article['isdel'] == 1): ?>checked<?php endif; ?> id="isdel" /><label for="isdel">取消发布</label></span>
                	</td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">文章所属分类：</td>
                <td>&nbsp;</td>
                <td height="30">
                	<select name="cid" id="cid">
	            		<?php if(is_array($cid)): $i = 0; $__LIST__ = $cid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo['id'] == $article['cid']): ?>selected<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["ctitle"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	            	</select>
                </td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">文章正文：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2">
					<textarea id="content" name="content" style="width:806px;height:300px;"><?php echo $article['content'] ?></textarea>
					
                </td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">文章简介： </td>
                <td>&nbsp;</td>
                <td height="30">
					<textarea name="discription" id="discription" style="width:802px;" cols="30" rows="5"><?php echo $article['discription'] ?></textarea>
				</td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">文章关键字：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="keywords" size="30" value="<?php echo $article['keywords'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">下载链接： </td>
                <td>&nbsp;</td>
                <td height="30">
                <input name="dowloadurl" type="text" id="dowloadurl" size="60" value="<?php echo $article['dowloadurl'] ?>"  />
                	这里推荐使用 <a href="http://pan.baidu.com" target="_blank">百度网盘</a>存储文件，以减小服务器压力！</span>
                </td>
                <td height="30"><span class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2"></td>
                <td>&nbsp;</td>
                <td height="30">
                	<input class="submitnews" type="submit" value="提交数据" />
                	<input type="reset" value="重新填写" />
                </td>
                <td height="30" class="left_txt"><input type="hidden" name="id" value="<?php echo $article['id'] ?>" /></td>
              </tr>
                  
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
</form> 
</body>
</html>