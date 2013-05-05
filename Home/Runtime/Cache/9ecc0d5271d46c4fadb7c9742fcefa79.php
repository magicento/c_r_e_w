<?php if (!defined('THINK_PATH')) exit();?><div class="appbuybox">
<form action="">
	<div class="buyapptitle">
		你要购买的产品如下：
	</div>
	<div class="buyappinfo">
		<div class="buyappinfoleft">
			<img src="__PUBLIC__/images/appicon/<?php echo ($appinfo["logo"]); ?>" alt="" />
		</div>
		<div class="buyappinforight">
			<div class="apptitle"><?php echo ($appinfo["title"]); ?></div>
			<div class="lxline"></div>
			价格：<span class="buyappprice">￥<?php echo ($appinfo["price"]); ?></span>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="productinfo1">
		<b>产品介绍</b>
		<?php echo ($appinfo["intro"]); ?>
	</div>
	<div class="productinfo2">
		<b>适用对象</b>
		<?php echo ($appinfo["suitableusers"]); ?>
	</div>
	<div class="buyappnote">
		重要提示：购买应用产品前，请认真阅读船员考试网使用规则，支付购买即代表您已经接受产品使用协议！
	</div>
	<div class="oktobuy">
		<button class="clicktobuy oktobuyappbtn">确认购买</button>
		<input type="checkbox" name="aplyxieyi" checked id="aplyxieyi" />
		<label for="aplyxieyi">我接受</label>
		<a target="_blank" href="<?php echo U('Public/news','id=89');?>">船员考试网使用规则</a>
	</div>
</form>
</div>