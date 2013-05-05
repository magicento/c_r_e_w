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
        <td height="31"><div class="titlebt">考题列表</div></td>
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
            	<span class="deluser"><a class="delalink question" href="javascript:void(0);">删除试题</a></span>
	            <form action="__SELF__" method="get" id="newslistform">
	            	<select name="cid" id="cid">
	            		<option value="0">应用的全部分类</option>
	            		<?php if(is_array($catgory)): $i = 0; $__LIST__ = $catgory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo['id'] == $getcid): ?>selected<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["catgory"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	            	</select>
	            	
	            	<select name="courseid" id="courseid" class="applistpage">
	            		<option value="0">应用的全部科目</option>
	            		<?php if(is_array($course)): $i = 0; $__LIST__ = $course;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo['id'] == $getcourseid): ?>selected<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	            	</select>
	            	
	            	<select name="appid" id="appid" class="applistpage">
	            		<option value="0">全部应用</option>
	            		<?php if(is_array($app)): $i = 0; $__LIST__ = $app;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo['id'] == $getappid): ?>selected<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	            	</select>
	            	
	            </form>
	            
	            <div class="c"></div>
            </div>
            <table class="listtable">
              <thead>
                <tr>
                  <td style="width:20px;" class="knum">#</td>
                  <td style="width:20px;"><input type="checkbox" onclick="checkAll('cid',this)" title="全选" name="checkall-toggle"></td> 
                  <td style="width:500px;"><a href="##">题目标题</a></td>
                  <td style="width:140px;"><a href="##">所属应用</a></td>
                  <td style="width:40px;"><a href="##">类型</a></td>
                  <td style="width:60px;"><a href="##">正确答案</a></td>
                  <td style="width:40px;"><a href="##">状态</a></td>
                  <td style="width:120px;"><a href="##">发布日期</a></td>
                  <td style="width:60px;"><a href="##">ID编号</a></td>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="row<?php echo ($k%2); ?>">
                  <td><?php echo ($k); ?></td>
                  <td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="cid"></td>
                  <td align="left"><a href="__URL__/addquestions/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                  <td><?php echo ($vo["apptitle"]); ?></td>
                  <td><?php echo ($vo["type"]); ?></td>
                  <td><?php echo ($vo["answer"]); ?></td>
                  <td>
                  <?php if(($vo["isdel"] == 0)): ?><img src="__PUBLIC__/images/admin/tick.png" alt="已经发布">
                  <?php else: ?>
                  <img src="__PUBLIC__/images/admin/publish_x.png" alt="禁止发布"><?php endif; ?>
                  </td>
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