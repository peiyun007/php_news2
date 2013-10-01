define(['talent','templates/common'], function(talent, jst) {
	/**
	* Header view class
	* @author nobody
	* @extends {talent.View}
	* @class HeaderView
	*/
	return talent.CompositeView.extend(
		/** @lends HeaderView.prototype */
	{
		template: jst['common/page-regions/header'],
		onShow : function() {
		
			// var bsTab = new BSTab({
			// 	el : this.$el.find('.navbar-nav')
			// })
			// talent.app.request('history:getFragments').done(function(fragments){
			// 	var topChannel = fragments[0];
			// 	bsTab.setDefault(fragments[0]);
			// });

		}
	});

});