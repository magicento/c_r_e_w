<?php if (!defined('THINK_PATH')) exit();?><div class="trainingmiddleboxcontent item">
	<div class="questionintro"><?php echo ($question["intro"]); ?></div>
	<div class="trtitle"><?php echo ($questionid); ?>.【<?php echo ($question["type"]); ?>】<?php echo ($question["title"]); ?></div>
	<table class="answerbox">
	<?php if(is_array($answer)): $i = 0; $__LIST__ = $answer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr <?php if(strpos($studentanswerforid,$vo['answeridentify']) !== false){echo 'class="checked"';} ?>>
			<td class="abcheck"><input type="<?php echo ($inputtype); ?>" 
				<?php if(strpos($studentanswerforid,$vo['answeridentify']) !== false){echo "checked";} ?>
			 name="answer_<?php echo ($question["id"]); ?>" value="<?php echo ($vo["answeridentify"]); ?>" questionid="<?php echo ($questionid); ?>" /></td>
			<td class="abc"><?php echo ($vo["answeridentify"]); ?>.</td>
			<td class="lableanswer"><?php echo ($vo["answercontent"]); ?></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
</div>