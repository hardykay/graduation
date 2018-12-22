<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>学生</title>  
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/graduation/static/css/pintuer.css">
    <link rel="stylesheet" href="/graduation/static/css/admin.css">
    <script src="/graduation/static/js/jquery.min.js"></script>       
    <link rel="shortcut icon" href="/graduation/static/images/icon.ico" />
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img style="height: 50px;" src="/graduation/static/images/sy.jpg" alt="">学生</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="<?php echo U('/Home/Index/index');?>" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp; &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo U('Home/Login/DropOut');?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本功能</h2>
  <ul style="display:block">
    <li><a href="<?php echo U('Topic/Index');?>" target="right">我的课题</a></li>
    <li><a href="<?php echo U('Assignment/Index');?>" target="right">查看任务书</a></li>  
    <li><a href="<?php echo U('Report/Index');?>" target="right">开题报告</a></li>   
    <li><a href="<?php echo U('Inspect/Index');?>" target="right">中期检查</a></li>     
    <li><a href="<?php echo U('Week/Index');?>" target="right">周进展情况</a></li>    
    <li><a href="<?php echo U('Draft/Index');?>" target="right">论文草稿</a></li>    
    <li><a href="<?php echo U('Finalize/Index');?>" target="right">论文定稿</a></li>      
    <li><a href="<?php echo U('Squad/Index');?>" target="right">查看答辩信息</a></li>   
    <li><a href="<?php echo U('Index/Time');?>" target="right">时间安排表</a></li>    
    
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>其他功能</h2>
  <ul>
    <li><a href="<?php echo U('Alteration/Index');?>" target="right">题目变更申请</a></li> 
    <li><a href="<?php echo U('Waichu/Index');?>" target="right">校外毕设申请</a></li>  
    <li><a href="<?php echo U('Teacher/Index');?>" target="right">查看老师带学生数</a></li>  
  </ul>  
    
<h2>个人信息维护</h2>
  <ul>
    <li><a href="<?php echo U('Student/Index');?>" target="right">修改个人信息</a></li>
    <li><a href="<?php echo U('Student/Pass');?>" target="right">修改密码</a></li>      
  </ul>  
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
          $("h2").next().hide(100);
	  $(this).next().toggle();
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
}); 
$(document).ready(function(){
    $('#iframe').change(function(){
        
        alert($("#iframe").load())
    });
});
function loadFrame(obj){  
    
    var url = obj.contentWindow.location.href;  
//    alert(url)
//    var p = url;
//    alert(p)
//    $('#url').href = url;
    $("#url").attr("href",url);
}  
</script>
<ul class="bread">
  <li><a href="<?php echo U('Home/Index/info');?>" target="right" class="icon-home"> 公告通知</a></li>
  <li>当前位置：<a href="##" id="a_leader_txt"> 公告通知</a></li>
  <li><b>欢迎：</b><span style="color:red;"><?php echo (session('name')); ?></span>同学</li>
  <li><a href="cate.html" target="right" id="url" class="btn btn-sm btn-success" style="margin-top: -7px;">刷新</a></li>
  <li><a href="#" class="btn btn-sm btn-success" style="margin-top: -7px;" onclick="history.go(-1)">返回</a></li>
</ul>
<div class="admin">
    <iframe scrolling="auto" rameborder="0" src="<?php echo U('Home/Index/info');?>" id="iframe" name="right" width="100%" height="100%" onload="loadFrame(this)"></iframe>
</div>

</body>
</html>