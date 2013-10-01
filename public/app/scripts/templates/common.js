define(function(){

  this["JST"] = this["JST"] || {};

  this["JST"]["common/layouts/empty-layout"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<div id="main-region"></div>';}return __p};

  this["JST"]["common/layouts/master-layout"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<div id="header-region"></div>\r\n\r\n<div class="row bs-content">\r\n\t<div id="sidebar-region" class="col-md-4"></div>\r\n\t<div id="main-region" class="col-md-6"></div>\r\n</div>\r\n<div id="footer-region" class="row"></div>';}return __p};

  this["JST"]["common/page-regions/footer"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<hr>\r\n<center>2000-2013 Forward Talent</center>';}return __p};

  this["JST"]["common/page-regions/header"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<ul class="pull-right inline login">\r\n\t<li>me@talent.com</li>\r\n\t<li>\r\n\t\t<a href="/logout">\r\n\t\t\t<span class="txt">Logout</span>\r\n\t\t</a>\r\n\t</li>\r\n</ul>\r\n<h2>\r\n\t<a href="/">TalentJS</a>\r\n</h2>\r\n\r\n<nav class="navbar navbar-default navbar-static-top" role="navigation">\r\n\t<div class="navbar-header">\r\n\t\t<a class="navbar-brand" href="#home"></a>\r\n\t</div>\r\n\t<div class="collapse navbar-collapse navbar-ex7-collapse">\r\n\t    <ul class="nav navbar-nav">\r\n\t    \t<li >\r\n\t    \t\t<a href="#home">Home</a>\r\n\t    \t</li>\r\n\t\t\t<li>\r\n\t\t\t\t<a href="#plugins">More</a>\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n</nav>';}return __p};

  this["JST"]["common/page-regions/sidebar"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<li>\r\n\t<h4>Sidebar Menu Header</h4>\r\n</li>\r\n<li class="divider"></li>\r\n<li>\r\n\t<a href="/">Lorem ipsum dolor sit amet.</a>\r\n</li>\r\n<li>\r\n\t<a href="/">Lorem ipsum dolor sit amet.</a>\r\n</li>\r\n<li>\r\n\t<a href="/">Lorem ipsum dolor sit amet.</a>\r\n</li>\r\n<li>\r\n\t<a href="/">Lorem ipsum dolor sit amet.</a>\r\n</li>\r\n<li>\r\n\t<a href="/">Lorem ipsum dolor sit amet.</a>\r\n</li>\r\n<li>\r\n\t<a href="/">Lorem ipsum dolor sit amet.</a>\r\n</li>';}return __p};

  return this["JST"];

});