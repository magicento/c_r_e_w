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
<script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/admin/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/artDialog.js?skin=black"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>
<script charset="utf-8" src="__PUBLIC__/js/editor/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__PUBLIC__/js/editor/kindeditor/lang/zh_CN.js"></script>
<script>
        var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[name="intro"]', {
				allowFileManager : true
			});
		});
</script>	
	
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<link href="__PUBLIC__/css/admin/skin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form name="form1" method="post" action="__URL__/doaddquestion" enctype="multipart/form-data" class="postquestionform">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="__PUBLIC__/images/admin/mail_leftbg.gif"><img src="__PUBLIC__/images/admin/left-top-right.gif" width="17" height="29" /></td>
    <td width="1100" height="29" valign="top" background="__PUBLIC__/images/admin/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">编辑题目</div></td>
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
            <td class="left_txt">当前位置：题目编辑</td>
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
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;题目选项</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">题目标题：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2">
                	<input name="title" type="text" id="title" size="60" value="<?php echo $question['title'] ?>" />
                	<span class="newsblock"><input type="checkbox" value="1" name="isdel" <?php if($question['isdel'] == 1): ?>checked<?php endif; ?> id="isdel" /><label for="isdel">取消发布</label></span>
                	</td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">所属应用：</td>
                <td>&nbsp;</td>
                <td height="30" style="">
                	
                	<select name="appid" id="appid" class="addormodifyappid">
                		<option value="0">==请选择应用名称==</option>
	            		<?php if(is_array($appid)): $i = 0; $__LIST__ = $appid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo['id'] == $question['appid']): ?>selected<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?>
	            				<?php if($vo['testqishu'] != ''): ?>-<?php echo ($vo["testqishu"]); endif; ?>
	            			</option><?php endforeach; endif; else: echo "" ;endif; ?>
	            	</select>
	            	
                </td>
                <td height="30" class="left_txt"></td>
              </tr>

              <tr class="">
                <td height="30" align="right" class="left_txt2">题目描述： </td>
                <td>&nbsp;</td>
                <td height="30">
					<textarea name="intro" id="discription" style="width:670px;" cols="30" rows="5"><?php echo $question['intro'] ?></textarea>
				</td>
                <td height="30" class="left_txt">根据情况填写，如果没有，可以不填写！</td>
              </tr>                
            </table></td>
          </tr>
          <tr>
            <td><table style="margin-top: 5px;" width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;答案与选项
                	<span class="addnewanswer">添加一个新选项！</span>
                </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="answertable">
			<?php ?>
			<?php if(is_array($answers)): $i = 0; $__LIST__ = $answers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="answertritembox <?php if($i%2 == 0): ?>oushu<?php endif; ?>">
                <td width="14%" height="30" align="right" class="left_txt2">
                	<input type="text" name="answeridentify[]" value="<?php echo ($vo["answeridentify"]); ?>" class="answeridentifyid"/>
                </td>
                <td width="3%">&nbsp;</td>
                <td width="32%" height="30">
                	<input type="text" name="answercontent[]" value="<?php echo ($vo["answercontent"]); ?>" class="answercontentid" /></td>
                <td width="45%" height="30" class="left_txt rightansweridtd">
                	正解:<input type="checkbox" name="rightanswer[]" class="rightanswerid" <?php if(strpos($question['answer'],$vo['answeridentify']) !== false){echo "checked";} ?> value="<?php echo ($vo["answeridentify"]); ?>" />
                	<img class="delansweritemimg" src="__PUBLIC__/images/admin/publish_x.png" alt="删除" />
                </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                       
              <tr class="submitquestitemtrbox">
                <td width="14%" height="30" align="right" class="left_txt2"></td>
                <td width="3%">&nbsp;</td>
                <td width="32%" height="30">
                	<input class="submitnews addformbuttons" type="submit" value="提交数据" />
                	<input class="addformbuttons" type="reset" value="重新填写" />
                </td>
                <td width="45%" height="30" class="left_txt"><input type="hidden" name="id" value="<?php echo $question['id'] ?>" /></td>
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