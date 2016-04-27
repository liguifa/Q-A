<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html ng-app="community">
<head>
	<meta charset="utf8">
	<title>UEP</title>
	<link type="text/css" rel="stylesheet" href="/Public/lib/bootstrap/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="/Public/css/community.css">
	<link type="text/css" rel="stylesheet" href="/Public/lib/cropper/cropper.css">
	<script type="text/javascript" src="/Public/lib/jquery/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="/Public/lib/jquery/jquery.cookie.js"></script>
	<script type="text/javascript" src="/Public/lib/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/lib/angularjs/angular.js"></script>
	<script type="text/javascript" src="/Public/lib/angularjs/angular-route.js"></script>
	<script type="text/javascript" src="/Public/lib/angularjs/angular-resource.js"></script>
	<script type="text/javascript" src="/Public/lib/angularjs/angular-cookies.js"></script>
	<script type="text/javascript" src="/Public/lib/cropper/cropper.js"></script>
    <script type="text/javascript" charset="utf8" src="/Public/lib/ueditor/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript" charset="utf8" src="/Public/lib/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf8" src="/Public/lib/ueditor/ueditor.all.js"></script>


	<script src="/Public/js/community.js"></script>
  	<script src="/Public/js/controllers.js"></script>
 	<script src="/Public/js/services.js"></script>
	<script src="/Public/js/directives.js"></script>
  	<script src="/Public/js/filters.js"></script>
</head>
<body>
	<div ng-view></div>
	<login-dialog></login-dialog>
</body>
</html>