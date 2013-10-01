<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8" />
	<title><?php echo $title; ?></title>
	<!--RepoVersion:1018-->
	<style type="text/css" link="public/app/styles/css/all.css"></style>
	<!--hotfix css start-->
	<!--hotfix css end-->
	<script>
		var BSGlobal = {
			root: "/"
			, start: new Date
			, prefillingData: {}
			, container: "#bs_layout_container"
		};
	</script>
  </head>
  <body>
	<div id="bs_layout_container" class="container">

	</div>


	<script>

		BSGlobal.staticPath='public/app';
		BSGlobal.entryPageId = '<?php echo $pageId; ?>';
	
		BSGlobal.loginUserInfo = {};

		BSGlobal.env = 'Development';
		BSGlobal.apiPath = 'http://webapi.bs-ux.com';
		BSGlobal.webPath = 'bs-ux.com';
	</script>
	<script src="public/app/scripts/vendor/components/requirejs/index.js" data-main="main"></script>

	<script type="text/javascript">			
		// BSGlobal.staticPath = '';
		requirejs.config({
			baseUrl: BSGlobal.staticPath+'/scripts',
			map: {
				'*': {
				//top channels start
				"views/home/index-page-view":"views/home/index-page-view",
				//top channels end
				}
			}
		});
		requirejs.config({
			map: {
				'*': {
				//hotfix js start
				//hotfix js end
				}
			}
		});
	</script>
  </body>
</html>