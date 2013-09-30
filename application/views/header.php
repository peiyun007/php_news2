<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $page_title; ?></title>
<base href="<?php echo base_url(); ?>" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<!--header start -->
<div id="header">
<ul>
<li><?php echo anchor("#", "首页", ($this->uri->segment(3) == '') ? array('class' => 'hover') : array()); ?></li>
<?php foreach ($category as $row): ?>
<li><?php
$bb = explode("|", $row->category_name);
echo anchor('home/category/' . $row->id, $bb[count($bb)-2], ($this->uri->segment(3) == $row->id) ? array('class' => 'hover') : array()); ?></li>
<?php endforeach; ?>
</ul>
</div>
<!--header end -->
<body>
<!--body start -->