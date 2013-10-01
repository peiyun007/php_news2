require.config({
	paths: {
		"backbone": "vendor/components/backbone/index"
		,"jquery": "vendor/components/jquery/index"
		,"json2": "vendor/components/json2/index"
		,"marionette": "vendor/components/marionette/index"
		,"underscore": "vendor/components/underscore/index"
		,"talent" : 'vendor/talent/index'
		,"jquery.cookie": "vendor/components/jquery.cookie/index"
		,"jquery.ui" : "vendor/components/jquery.ui/index"
		,"$.validate" : 'vendor/talent/views/common/plugins/jquery.validate'
		,"$.scroll" : 'vendor/talent/views/common/plugins/jquery.scroll'
		,'$.flip' : 'vendor/talent/views/common/plugins/jquery.flip'
		,'$.' : 'vendor/talent/views/common/plugins/jquery.gridster'
	},
	shim: {
		'underscore': {
			exports: '_'
		}
		,'backbone': {
			deps: ['json2', 'underscore', 'jquery'],
			exports: 'Backbone'
		}
		,'marionette': {
			deps: ['backbone'],
			exports: 'Marionette'
		}
		, '$.validate' : ['jquery']
		, '$.flip' : ['jquery']
		, '$.gridster' : ['jquery']

	}
});