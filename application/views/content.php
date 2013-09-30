<div id="body">
<!--left panel start -->
<!--left panel end -->
<!--right panel start -->
<div id="right">
<p class="rightTop"></p>
<?php foreach ($get_article_content as $art_row): ?>
<h2><?php echo $art_row->title; ?></h2>
<p><em>作者：<?php echo $art_row->author; ?></em><i><?php echo $art_row->last_date; ?></i></p>
<p class="rightTxt1"><?php echo $art_row->content; ?></p>
<?php endforeach; ?>
<?php foreach ($get_comments as $row): ?>
<p class="rightTxt2"><span><?php echo $row->content; ?></span><b><?php echo $row->author; ?></b>&nbsp;于<i>&nbsp;<?php echo $row->last_date; ?></i>&nbsp;评论</p>
<?php endforeach;?>
</div>
<br class="spacer" />
</div>
<div id="bodyBottom">
<form method="POST" action="<?php echo site_url('home/comment_ok'); ?>">
<p><textarea style="background:#fff; border:1px solid #333;" name="comment_content" rows="5" cols="55"></textarea></p><br />
<p><label>评论人：</label><input style="background:#fff; border:1px solid #333; width:150px; height:20px;" type="text" name="comment_author" /></p><br />
<input type="hidden" name="article_id" value="<?php echo $art_row->id; ?>" />
<p><input style="background:#ddd; border:1px solid #333; width:55px; height:20px;" type="submit" name="submit" value="提交" /></p><br />
</form>
</div>

