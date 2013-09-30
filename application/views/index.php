<div id="bodyBottom">
<!--news start -->
<div id="service">
<h2>推荐文章</h2>
<h3>热门话题、业界动态</h3>
<ul>
<?php foreach ($get_article_recommend as $row): ?>
<li><?php echo anchor('home/content/'.$row->id,$row->title); ?></li>
<?php endforeach; ?>
</ul>
</div>
<!--news end -->
<!--services start -->
<div id="service">
<h2>最新文章</h2>
<h3>最新发布的文章</h3>
<ul>
<?php foreach ($get_article_new as $row): ?>
<li><?php echo anchor('home/content/'.$row->id,$row->title); ?></li>
<?php endforeach; ?>
</ul>
</div>
<div id="member">
<h2>管理登陆<?php echo $this->session->userdata('manager'); ?></h2>
<form action="<?php echo site_url('admin/check_login'); ?>" method="post" name="member_log_in" id="member_log_in">
<label>Name:</label>
<input type="text" name="user" class="txtBox" />
<label>Password:</label>
<input type="password" name="password" class="txtBox" />
<input type="submit" name="go" value="" class="go" />
<br class="spacer" />
</form>
<br class="spacer" />
</div>
<br class="spacer" />
</div>
