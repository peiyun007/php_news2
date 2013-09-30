<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url() ;?>" />
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
<h3><a>添加分类</a></h3>
<form method="post" action="<?php echo site_url('admin/add_category_ok'); ?>">
<p><label for="article_title">分类名称</label><input type="text" name="category_name" id="category_name" /></p>
<p><input type="submit" name="submit_article" value="添加分类" /></p>
</form>
</div>
</body>
</html>
