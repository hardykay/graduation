<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
<link rel="stylesheet" href="/graduation/static/css/nav.css"> 
<script src="/graduation/static/js/jquery.min.js"></script>
<script src="/graduation/static/js/bootstrap.min.js"></script> 
<title><?php echo ($gao["title"]); ?></title>
</head> 
<body>

   <nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
            <div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="/graduation/Home/Index/index.html">返回首页</a>
	</div>
</div>
    </div>
</nav>
<div class="container">
    <h1 style="text-align: center"><?php echo ($gao["title"]); ?></h1>
    <h6 style="text-align: center">时间：<?php echo ($gao["publish"]); ?></h6>
    <h3 style="text-align: center"><b>附件：<?php if(empty($gao["url"])): ?>无<?php else: ?><a target="_blank" href="/graduation/Home/Index/DowGovern/id/<?php echo ($gao["id"]); ?>">附件下载</a><?php endif; ?></b></h3>
    <?php echo (htmlspecialchars_decode($gao["content"])); ?>
</div>  

</body>

</html>