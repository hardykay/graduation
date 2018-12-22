<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
<link rel="stylesheet" href="/graduation/static/css/public.style.css"> 
<link rel="stylesheet" href="/graduation/static/css/ApplyFor.css"> 
<script src="/graduation/static/js/jquery.min.js"></script>
<script src="/graduation/static/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="/graduation/static/css/nav.css">
    <title>大学生毕业设计课题申请表</title>  
</head>  
<body>
    <div style="width: 550px;margin: 10px auto 0px auto;">
      <fieldset>
        <legend>相关提示</legend>
        <p>1、申请课题必须在专业允许申请课题时间段申请</p>
        <p>2、盲选课题，用于学生和老师进行<b class="red">双选</b></p>
        <p>3、团队课题，用于多人合作的毕业设计。</p>
        <p>4、指定选，老师选择学生，指定某某学生（一个人）跟着您做毕业设计。</p>
        </fieldset> 
        <div  style="float: left; margin: 10px;">
            <a href="<?php echo U('Topic/MapplyFor');?>"><button type="button" class="btn btn-success btn-lg">申请盲选课题</button></a>
        </div>
        <div  style="float: left ;  margin: 10px;">
            <a href="<?php echo U('Topic/Team');?>"><button type="button" class="btn btn-success btn-lg">申请团队课题</button></a>
        </div>
        <div  style="float: left;  margin: 10px; ">
            <a href="<?php echo U('Topic/DapplyFor');?>"><button type="button" class="btn btn-success btn-lg">申请指定选课题</button></a>
        </div>
    </div>
</body>  
</html>