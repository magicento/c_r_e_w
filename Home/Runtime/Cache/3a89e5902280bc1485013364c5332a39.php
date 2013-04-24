<?php if (!defined('THINK_PATH')) exit();?><button value="<?php echo ($pqid); ?>" class="prevquestion">上一题[PgUp]</button>
<button value="<?php echo ($nqid); ?>" class="nextquestion">下一题[PgDn]</button>
<button value="<?php echo ($mqid); ?>" class="markquestion <?php echo ($disabled); ?>">标&nbsp;记[M]</button>
<button value="<?php echo ($mqid); ?>" class="unmarkquestion <?php echo ($undisabled); ?>">取消标记[U]</button>
<button value="<?php echo ($mqid); ?>" class="selectquestion">选&nbsp;题[L]</button>
<button class="handinpaper">交&nbsp;卷[K]</button>