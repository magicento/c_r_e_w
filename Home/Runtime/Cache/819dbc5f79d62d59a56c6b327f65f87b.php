<?php if (!defined('THINK_PATH')) exit();?><div class="trainingmiddleboxcontent item">
	<div><img class="markgobackimg" src="__PUBLIC__/images/home/markback.png" alt="" /></div>
	<div class="kaosheninfo">
		<ul>
			<li><strong>身份证号码：</strong><?php echo ($_SESSION['userinfo']['identitycard']); ?></li>
			<li><strong>姓名：</strong><?php echo ($_SESSION['userinfo']['account']); ?></li>
			<li><strong>期数：</strong>12365</li>
			<li><strong>试卷代码：</strong>568</li>
		</ul>
	</div>
	<?php echo ($topicslistmark); ?>
</div>