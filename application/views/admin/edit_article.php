<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url(); ?>" />
<script type="text/javascript" src=<?php echo base_url() . "js/xhedit1.1.0/jquery/jquery-1.4.2.min.js"; ?>></script>
<script type="text/javascript" src=<?php echo base_url() . "js/xhedit1.1.0/xheditor-zh-cn.min.js?v=1.1.1"; ?>></script>
<script type="text/javascript">
$(pageInit);
function pageInit()
{
	$('#article_content').xheditor({
		skin:'nostyle',
		tools:'Cut, Copy, Paste, Pastetext, |, Blocktag, Fontface, FontSize, Bold, Italic, Underline, Strikethrough, FontColor, BackColor, SelectAll, Removeformat, |, Align, List, Outdent, Indent, |, Link, Unlink, |, Img, Flash, Media, Table, |, Source, Fullscreen, About',
		upLinkUrl:<?php echo "\"" . site_url("welcome/upload") . "\""; ?>,
		upLinkExt:"zip, rar, txt",
		upImgUrl:<?php echo "\"" . site_url("welcome/upload") . "\""; ?>,
		upImgExt:"jpg, jpeg, gif, png",
		upFlashUrl:<?php echo "\"" . site_url("welcome/upload") . "\""; ?>,
		upFlashExt:"swf",
		upMediaUrl:<?php echo "\"" . site_url("welcome/upload") . "\""; ?>,
		upMediaExt:"wmv, avi, wma, mp3, mid",
		shortcuts:{'ctrl+enter': submitForm}
	});
}
function insertUpload(arrMsg)
{
	var i,msg;

	for (i = 0; i < arrMsg.length; i++)
	{
		msg = arrMsg[i];
		$("#uploadList").append('<option value="' + msg.id + '">' + msg.localname + '</option>');
	}
}
function submitForm(){$('#frmDemo').submit(); }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
*{
margin:0;
padding:0;
}
body {
margin-left: 3px;
background:#fff;
}
a{
text-decoration:none;
color: #344b50;
}
#add_article{
width:600px;
margin-top:5px;
font-size:12px;
margin-left:25px;
margin-bottom:5px;
}
#add_article h3{
font-size:14px;
padding-bottom:10px;
}
#add_article p{
margin-top:5px;
}
#add_article p label{
padding-right:5px;
}
#add_article p label span a{
color:red;
margin-top:5px;
}
#article_source,#article_author{
background:#fff;
border:1px solid #abc6dd;
width:100px;
height:20px;
}
input[type=submit]{
width:90px;
height:25px;
background:#efefef;
border:1px solid #abc6dd;
}
#article_title{
background:#fff;
border:1px solid #abc6dd;
width:400px;
height:20px;
}
</style>
</head>
<body>
<div id="add_article">
<h3><a>修改文章</a></h3>
<form method="post" action="<?php echo site_url('admin/edit_article_ok'); ?>">
<?php foreach ($get_article_content as $row): ?>
<input type="hidden" name="id" value="<?php echo $row->id; ?>"/>
<p><label for="article_title">标题</label><input type="text" name="article_title" id="article_title" value="<?php echo $row->title; ?>" /></p>
<p><label for="article_source">分类</label><select name="category_id">
<?php foreach ($get_category as $row1): ?>
<option value="<?php echo $row1->id; ?>"<?php if ($row->category_id==$row1->id){echo " selected";} ?>><?php echo $row1->category_name; ?></option>
<?php endforeach; ?>
</select>
</p>
<p><label for="article_source">来源</label><input type="text" name="article_source" id="article_source" value="<?php echo $row->source; ?>"></p>
<p><label for="article_author">作者</label><input type="text" name="article_author" id="article_author" value="<?php echo $row->author; ?>"></p>
<p><label for="article_recommend">推荐</label><input type="checkbox" name="article_recommend" id="article_recommend"
<?php
if ($row->recommend==1)
{
	echo 'checked';
}
?> />
</p>
<p><textarea style="width:700px;height:400px;" name="article_content" id="article_content"><?php echo $row->content; ?></textarea></p>
<p><label for="article_last_date">添加日期</label><input type="text" name="article_last_date" id="article_last_date" value="<?php echo $row->last_date; ?>" /></p>
<?php endforeach; ?>
<p><input type="submit" name="submit_article" value="修改内容" /></p>
</form>
</div>
</body>
</html>
