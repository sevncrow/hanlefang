<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>韩乐坊</title>
		
		{{ HTML::style('common/css/bootstrap.min.css'); }}
		{{ HTML::style('admin/css/font-awesome.min.css'); }}
		{{ HTML::style('admin/css/smartadmin-production.css'); }}
		{{ HTML::style('admin/css/smartadmin-skins.css'); }}
		{{ HTML::style('admin/css/help-admin-main.css'); }}
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">  -->
	</head>
	<body>
		<header id="header">
			@include('admin.layout.header')
		</header>
		<aside id="left-panel">
			@include('admin.layout.aside')
		</aside>
		<div id="main" role="main">
				<div id="ribbon">
					<ol class="breadcrumb">
					</ol>
				</div>
				<div id="content">
					@yield("content")
				</div>
		</div>	
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>

	 	{{ HTML::script('common/js/jquery.min.js'); }}
	 	{{ HTML::script('common/js/bootstrap.min.js'); }}
	 	{{ HTML::script('admin/js/app.js'); }}
	 	{{ HTML::script('admin/js/notification/SmartNotification.min.js'); }}
		@yield("jslib")
	</body>
</html>