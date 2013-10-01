define(function(){

  this["JST"] = this["JST"] || {};

  this["JST"]["common/layouts/empty-layout"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<div id="main-region"></div>';}return __p};

  this["JST"]["common/layouts/master-layout"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<div id="header-region"></div>\r\n\r\n<div class="row bs-content">\r\n\t<div id="sidebar-region" class="col-md-4"></div>\r\n\t<div id="main-region" class="col-md-6"></div>\r\n</div>\r\n<div id="footer-region" class="row"></div>';}return __p};

  this["JST"]["common/page-regions/footer"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<hr>\r\n<center>2000-2013 Forward Talent</center>';}return __p};

  this["JST"]["common/page-regions/header"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<h1>This is header</h1>';}return __p};

  this["JST"]["common/page-regions/sidebar"] = function(obj) {obj || (obj = {});var __t, __p = '', __e = _.escape;with (obj) {__p += '<h1>This is sidebar</h1>';}return __p};

  return this["JST"];

});