define(function(){

  this["JST"] = this["JST"] || {};

  this["JST"]["home/home-main-composite"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<!-- <ul class="nav nav-tabs">\n\t<li><a href="#home?type=community_hot" data-trigger="false">热门社团活动</a></li>\n\t<li><a href="#home?type=entertity_hot" data-trigger="false">热门企业需求</a></li>\n</ul> -->\n<div class="table_container">\n<h3>热门社团活动</h3>\n<table id="home_main_container_hot_community" class="table table-bordered"></table>\n</div>\n<div class="table_container">\n<h3>热门企业需求</h3>\n<table id="home_main_container_hot_entertity" class="table table-bordered"></table>\n</div>\n';}return __p};

  this["JST"]["home/home-main-item"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<td>' +((__t = ( title )) == null ? '' : __t) +'</td>\n<td>' +((__t = ( publish_date)) == null ? '' : __t) +'</td>\n';}return __p};

  this["JST"]["home/home-right-sidebar-entity-composite"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<div class="table_container">\n<h3>' +((__t = ( title )) == null ? '' : __t) +'</h3>\n<table id="home_right_sidebar_entity" class="table table-border"> \n\n</table>\n\n</div>';}return __p};

  this["JST"]["home/home-right-sidebar-entity-item"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<td>' +((__t = ( name )) == null ? '' : __t) +'\n</td>';}return __p};

  this["JST"]["home/home-right-sidebar"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<div id="home_right_hot_enterprise"></div>\n<div id="home_right_hot_community"></div>';}return __p};

  this["JST"]["home/index-page"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<div class="row" style="position:relative">\n\t<div id="gla_box">\n\t\t<span class="prev">&nbsp;</span>\n\t\t<span class="next">&nbsp;</span>\n\t\t<ul class="roundabout-holder" style="padding: 0px; position: relative;">\n\t\t\t<li class="roundabout-moveable-item">\n\t\t\t\t<div class="gla_inbox">\n\t\t\t\t\t<img src="http://www.myweb.com/images/20120814204816.jpg">\n\t\t\t\t\t<a href="http://www.17sucai.com/">点击了解详情</a>\n\t\t\t\t</div>\n\t\t\t</li>\n\t\t\t<li class="roundabout-moveable-item">\n\t\t\t\t<div class="gla_inbox">\n\t\t\t\t\t<img src="http://www.myweb.com/images/20120814204750.jpg">\n\t\t\t\t\t<a href="http://www.17sucai.com/">点击了解详情</a>\n\t\t\t\t</div>\n\t\t\t</li>\n\t\t\t<li class="roundabout-moveable-item">\n\t\t\t\t<div class="gla_inbox">\n\t\t\t\t\t<img src="http://www.myweb.com/images/20120814204733.jpg">\n\t\t\t\t\t<a href="http://www.17sucai.com/">点击了解详情</a>\n\t\t\t\t</div>\n\t\t\t</li>\n\t\t\t<li class="roundabout-moveable-item">\n\t\t\t\t<div class="gla_inbox">\n\t\t\t\t\t<img src="http://www.myweb.com/images/20120814204711.jpg">\n\t\t\t\t\t<a href="http://www.17sucai.com/">点击了解详情</a>\n\t\t\t\t</div>\n\t\t\t</li>\n\t\t\t<li class="roundabout-moveable-item">\n\t\t\t\t<div class="gla_inbox">\n\t\t\t\t\t<img src="http://www.myweb.com/images/20120814204658.jpg">\n\t\t\t\t\t<a href="http://www.17sucai.com/">点击了解详情</a>\n\t\t\t\t</div>\n\t\t\t</li>\n\t\t</ul>\n\t</div>\n\t<div id="home_main" class="col-md-8"  style="min-height: 500px">\n\t</div>\n\t<div id="home_right" class="col-md-offset-1 col-md-3 "  style="min-height: 500px"></div>\n</div>';}return __p};

  this["JST"]["home/login/index-page"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<h3>Edit your view and template files.</h3>\r\n<p class="lead">\r\n\t<strong>View: </strong>\r\n\t<small>app/scripts/views/home/login/index-page-view.js</small>\r\n</p>\r\n<p class="lead">\r\n\t<strong>Template: </strong>\r\n\t<small>app/templates/home/login/index-page.html</small>\r\n</p>';}return __p};

  return this["JST"];

});