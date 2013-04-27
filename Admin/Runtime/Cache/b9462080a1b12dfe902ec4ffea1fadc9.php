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
<script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/admin/ajaxfileupload.js"></script><script type="text/javascript" src="/Public/js/admin/common.js"></script>	
	
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<link href="__PUBLIC__/css/admin/skin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form name="form1" method="post" action="__URL__/doaddapp" enctype="multipart/form-data" class="postappform">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="__PUBLIC__/images/admin/mail_leftbg.gif"><img src="__PUBLIC__/images/admin/left-top-right.gif" width="17" height="29" /></td>
    <td width="1100" height="29" valign="top" background="__PUBLIC__/images/admin/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">编辑应用</div></td>
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
            <td class="left_txt">当前位置：应用编辑</td>
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
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;应用编辑选项</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">应用名称：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2">
                	<input name="title" type="text" id="" size="30" value="<?php echo $app['title'] ?>" />
                	<span class="newsblock"><input type="checkbox" value="1" name="isdel" <?php if($app['isdel'] == 1): ?>checked<?php endif; ?> id="isdel" /><label for="isdel">取消发布</label></span>
                	</td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">应用所属类别：</td>
                <td>&nbsp;</td>
                <td height="30" style="display: block;width: 850px;">
                	分类：
                	<select name="cid" id="cid" class="addormodifyappcatgoryid">
                		<option value="0">==请选择应用分类==</option>
	            		<?php if(is_array($cid)): $i = 0; $__LIST__ = $cid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo['id'] == $cid_cur): ?>selected<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["catgory"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	            	</select>
	            	科目：
	            	<select name="courseid" id="courseid">
                		<option value="0">==请选择应用科目==</option>
	            		<?php if(is_array($course)): $i = 0; $__LIST__ = $course;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo['id'] == $app['courseid']): ?>selected<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	            	</select>
	            	<span class="isdownload"><input type="checkbox" value="1" name="" <?php if($app['downloadurl'] != ''): ?>checked<?php endif; ?> id="downloadurlcheckbox" /><label for="downloadurlcheckbox">下载类应用（如果是请打勾）</label></span>
                </td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr class="">
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">应用图片：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2">
					<input id="fileToUpload" type="file" size="45" name="fileToUpload" class="input">
					<button class="button" id="buttonUpload" onclick="return ajaxFileUpload();">上传应用的图像</button>
					<span class="red">（仅允许jpg,gif,png三类图片，大小控制为60*60）</span>
					<input type="hidden" name="logo" id="logo" value="<?php echo $app['logo'] ?>" />
					<img src="__PUBLIC__/images/appicon/<?php echo $app['logo'] ?>" <?php if($app['logo'] != ''): ?>style="display:block;"<?php endif; ?> alt="" class="applogo" />
				</td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr class="">
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">应用期数：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="testqishu" size="30" value="<?php echo $app['testqishu'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr class="">
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">试卷代码：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="testcode" size="30" value="<?php echo $app['testcode'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr class="">
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">适用对象描述：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="suitableusers" size="30" value="<?php echo $app['suitableusers'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr class="">
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">价格：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="price" size="30" value="<?php echo $app['price'] ?>"  />元（￥）</td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr class="">
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">浏览基数：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="hitnum" size="30" value="<?php echo $app['hitnum'] ?>"  /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr class="">
                <td height="30" align="right" class="left_txt2">应用简介： </td>
                <td>&nbsp;</td>
                <td height="30">
					<textarea name="intro" id="discription" style="width:802px;" cols="30" rows="5"><?php echo $app['intro'] ?></textarea>
				</td>
                <td height="30" class="left_txt"></td>
              </tr>
              
              <tr class="articledownlink <?php echo $showx; ?>">
                <td height="30" align="right" class="left_txt2">下载链接： </td>
                <td>&nbsp;</td>
                <td height="30">
                <input name="downloadurl" type="text" id="downloadurl" size="60" value="<?php echo $app['downloadurl'] ?>"  />
                	<span>这里推荐使用 <a href="http://pan.baidu.com" target="_blank">百度网盘</a>存储文件，以减小服务器压力！</span>
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
                <td height="30" class="left_txt"><input type="hidden" name="id" value="<?php echo $app['id'] ?>" /></td>
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