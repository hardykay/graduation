<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
<link rel="stylesheet" href="/graduation/static/css/nav.css"> 
<script src="/graduation/static/js/jquery.min.js"></script>
<script src="/graduation/static/js/bootstrap.min.js"></script> 
<title>指导教师审阅论文定稿</title>
	
</head>
<body>
<br>
<div class="maofu">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">论文审核</h3>
            </div>
            <div class="panel-body">
            	<ul class="list-group">
            		<li class="list-group-item"><b>选课学生：</b> <?php echo (base64_decode($data["sname"])); ?>(<?php echo ($data["stu"]); ?>)</li>
            		<li class="list-group-item"><b>课题名称：</b><?php echo (base64_decode($data["name"])); ?></li>
            		<li class="list-group-item"><b>专业：</b><?php echo (base64_decode($data["dep"])); ?></li>
            		<li class="list-group-item"><b>提交时间：</b><?php echo ($list["t"]); ?></li>
            		<li class="list-group-item"><b>论文：</b><a href="/graduation/Home/Index/download/url/<?php echo (base64_encode($list["paperpath"])); ?>">论文定稿下载</a></li>
                        <li class="list-group-item"><b>附件：</b><?php if(empty($list["url"])): ?>无 <?php else: ?> <a href="/graduation/Home/Index/download/url/<?php echo (base64_encode($list["url"])); ?>">附件下载</a><?php endif; ?></li>
            	</ul>
            </div>
            <div class="panel-body">
                <form role="form" action="<?php echo U('Finalize/Check');?>" method="post">
                    <input type="hidden" name="stu" value="<?php echo ($data["stu"]); ?>" >
                    <input type="hidden" name="top" value="<?php echo ($data["top"]); ?>" >
                  <div style="clear:both;width: 100%;">
                    <div class="shjg">
                      <label class="red ">
                       审核结果：
                      </label>
                       <select name="audit">
                           <option selected = "selected"  value="1">评分
                           <option value="2">退回修改</option>
                       </select>
                    </div>
                  </div>
                  <br>
                  <div style="width: 5rem;margin:0px auto;">
                  <input type="submit" id="fat-btn" class="btn btn-success" value="提交" >
                  </div>
                </form>
            </div>
        </div>
</div>
</body>
</html>