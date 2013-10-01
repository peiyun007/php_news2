define(['talent'
	,'templates/home'
	,'collections/bug-daily-log-collection'
],function(talent
	,jst
	,BugDailyLogCollection
) {
	/**
	 * Inner main view class
	 * @class HomeView~MainView
	 * @extends {Backbone.View}
	 */	
	var MainView = talent.Layout.extend(
		/** @lends HomeView~MainView.prototype */
	{
		template: jst['home/index-page']
		,className: 'home-page-container'
		,initialize: function() {
			talent.Context.setPageTitle('Page Title: Home');
			window.col = this.collection = new BugDailyLogCollection;
		}
		,regions: {
			pubblog: '.pubblog_home'
		}
		,ui:{
			start: '.btn-start'
		}
		,events:function(){
			var events = {};
			events['click ' + this.ui.start] = 'start';
			return events;
		}
		,start: function(e) {
			this.ui.start.html('button clicked!');
		}
		,onRender: function() {
			this.collection.fetch().done(function(resp) {
				console.log(resp);
			})
		}
		,onShow: function() {

		}
		,onClose:function(){
		}
	});


	return talent.BasePageView.extend({
		mainViewClass : MainView
	});
});
