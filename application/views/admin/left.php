<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url(); ?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.dimensions.js"></script>
<script type="text/javascript" src="js/jquery.accordion.js"></script>
<script language="javascript">
jQuery().ready(function()
{
	jQuery('#navigation').accordion(
	{
		header: '.head',
		navigation1: true,
		event: 'click',
		fillSpace: true,
		animated: 'bounceslide'
	});
});
</script>
<style type="text/css">
<!--
body {
margin:0px;
padding:0px;
font-size: 12px;
}
#navigation {
margin:0px;
padding:0px;
width:147px;
}
#navigation a.head {
cursor:pointer;
background:url(images/admin/main_34.gif) no-repeat scroll;
display:block;
font-weight:bold;
margin:0px;
padding:5px 0 5px;
text-align:center;
font-size:12px;
text-decoration:none;
}
#navigation ul {
border-width:0px;
margin:0px;
padding:0px;
text-indent:0px;
}
#navigation li {
list-style:none; display:inline;
}
#navigation li li a {
display:block;
font-size:12px;
text-decoration: none;
text-align:center;
padding:3px;
}
#navigation li li a:hover {
background:url(images/admin/tab_bg.gif) repeat-x;
border:solid 1px #adb9c2;
}
-->
</style>
</head>
<body>
<div style="height:100%;">
	<ul id="navigation">
		<li> <a class="head">文章管理</a>
			<ul>
				<li><?php echo anchor('admin/add_article/', '添加文章', 'target="rightFrame"'); ?></li>
				<li><?php echo anchor('admin/article_list/', '文章列表', 'target="rightFrame"'); ?></li>
			</ul>
		</li>
		<li> <a class="head">分类管理</a>
			<ul>
				<li><?php echo anchor('admin/category_list/', '分类列表', 'target="rightFrame"'); ?></li>
			</ul>
		</li>
		<li> <a class="head">评论管理</a>
			<ul>
				<li><?php echo anchor('admin/comments_list/', '查看/删除评论', 'target="rightFrame"'); ?></li>
			</ul>
		</li>
		<li> <a class="head">用户管理</a>
			<ul>
				<li><?php echo anchor('admin/add_user/', '添加用户', 'target="rightFrame"'); ?></li>
				<li><?php echo anchor('admin/user_list/', '查看/修改用户', 'target="rightFrame"'); ?></li>
			</ul>
		</li>
	</ul>
</div>
</body>
</html>
