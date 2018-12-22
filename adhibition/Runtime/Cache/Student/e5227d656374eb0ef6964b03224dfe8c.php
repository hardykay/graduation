<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <title>学生查看自己的任务书</title>
</head>
<body>
<br>
<div class="container">
	<div class="panel-group" id="accordion">
	    
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">
	                <a data-toggle="collapse" data-parent="#accordion" 
	                href="#collapseOne">
	                一、研究的主要内容
	                </a>
	            </h3>
	        </div>
	        <div id="collapseOne" class="panel-collapse collapse in">
	            <div class="panel-body">
	               <?php echo (htmlspecialchars_decode($li["research"])); ?>
	            </div>
	        </div>
	    </div>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">
	                <a data-toggle="collapse" data-parent="#accordion" 
	                href="#collapseTwo">
	                二、涉及知识和基本要求(包括学生具备或需要掌握的基本知识、基础技能、文献查询、外文翻译、论文撰写等要求)
	            </a>
	            </h3>
	        </div>
	        <div id="collapseTwo" class="panel-collapse collapse">
	        <div class="panel-body">
	            <?php echo (htmlspecialchars_decode($li["basic"])); ?>
	        </div>
	        </div>
	    </div>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">
	                <a data-toggle="collapse" data-parent="#accordion" 
	                href="#collapseThree">
	                三、预期目标
	                </a>
	            </h3>
	        </div>
	        <div id="collapseThree" class="panel-collapse collapse">
	            <div class="panel-body">
	               <?php echo (htmlspecialchars_decode($li["expect"])); ?>
	            </div>
	        </div>
	    </div>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">
	                <a data-toggle="collapse" data-parent="#accordion" 
	                href="#collapsefour">
	                四、进度安排
	                </a>
	            </h3>
	        </div>
	        <div id="collapsefour" class="panel-collapse collapse">
	            <div class="panel-body">
	                <?php echo (htmlspecialchars_decode($li["arrange"])); ?>
	            </div>
	        </div>
	    </div>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">
                       附件：
                        <?php if(empty($li["url"])): ?>无<?php else: ?> <a href="/graduation<?php echo ($li["url"]); ?>">附件下载</a><?php endif; ?> 
	            </h3>
	        </div>
	    </div>
	</div>
</div>
</body>

</html>