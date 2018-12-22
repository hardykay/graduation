<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>系主任管理毕业设计系统</title>  
     <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="/graduation/static/css/pintuer.css">
    <link rel="stylesheet" href="/graduation/static/css/admin.css">
    <script src="/graduation/static/js/jquery.min.js"></script>   
    <link rel="shortcut icon" href="/graduation/static/images/icon.ico" />
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img style="height: 50px;" src="/graduation/static/images/sy.jpg" alt=""></h1>
  </div>
  <div class="head-l dropdown">
      <a class="button button-little bg-blue btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"><span class="caret"></span>系主任</a>
      &nbsp;&nbsp;
      <a class="button button-little bg-green" href="<?php echo U('/Home/Index/index');?>" target="_blank"><span class="icon-home"></span> 前台首页</a>
      &nbsp;&nbsp;
      <a class="button button-little bg-red" href="<?php echo U('/Home/Login/DropOut');?>"><span class="icon-power-off"></span> 注销</a> 
    
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="position: fixed;top:55px;left:260px">
        <?php if(($sf["admin"]) == "1"): ?><li role="presentation">
            <a role="menuitem" tabindex="-1" href="<?php echo U('/Home/Switchover/Manager');?>">管理员</a>
        </li><?php endif; ?>
        <?php if(($sf["dean"]) == "1"): ?><li role="presentation">
            <a role="menuitem" tabindex="-1" href="<?php echo U('/Home/Switchover/Dean');?>">教学院长</a>
        </li><?php endif; ?>
        <?php if(($sf["adviser"]) == "1"): ?><li role="presentation">
            <a role="menuitem" tabindex="-1" href="<?php echo U('/Home/Switchover/Teacher');?>">指导老师</a>
        </li><?php endif; ?>
    </ul>
  </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本功能</h2>
  <ul style="display:block">
    <li><a href="<?php echo U('Index/SettingList');?>" target="right"><span class="icon-caret-right"></span>各个专业时间设置</a></li>
    <li><a href="<?php echo U('Topic/ReviewProcess');?>" target="right"><span class="icon-caret-right"></span>审核课题</a></li>
    <li><a href="<?php echo U('NotYet/Index');?>" target="right"><span class="icon-caret-right"></span>分配未选题的学生</a></li> 
    <li><a href="<?php echo U('Teacher/Index');?>" target="right"><span class="icon-caret-right"></span>删除选题的学生</a></li>  
    <li><a href="<?php echo U('Allocation/Index');?>" target="right"><span class="icon-caret-right"></span>调剂学生选题</a></li>   
    <li><a href="<?php echo U('Alteration/Index');?>" target="right"><span class="icon-caret-right"></span>审核题目变更</a></li>  
    <!--<li><a href="<?php echo U('Assignment/Index');?>" target="right"><span class="icon-caret-right"></span>审核任务书</a></li>-->  
    <li><a href="<?php echo U('Waichu/Index');?>" target="right"><span class="icon-caret-right"></span>审核外出毕设申请</a></li>  
    <li><a href="<?php echo U('Review/Index');?>" target="right"><span class="icon-caret-right"></span>分配评阅老师</a></li>     
    <li><a href="<?php echo U('Squad/Index');?>" target="right"><span class="icon-caret-right"></span>答辩小组</a></li> 
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>个人信息维护</h2>
  <ul>
    <li><a href="<?php echo U('/Home/Teacher/Index');?>" target="right">修改个人信息</a></li>
    <li><a href="<?php echo U('/Home/Teacher/Pass');?>" target="right">修改密码</a></li>      
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
    $("#url").attr("href",url);
}  
</script>
<ul class="bread">
  <li><a href="<?php echo U('Home/Index/info');?>" target="right" class="icon-home"> 公告通知</a></li>
  <li>当前位置：<a href="##" id="a_leader_txt"> 公告通知</a></li>
  <li><b>欢迎：</b><span style="color:red;"><?php echo (session('name')); ?></span></li>
  <li>您的身份：系主任</li>
  <li><a href="cate.html" target="right" id="url" class="btn btn-sm btn-success" style="margin-top: -7px;">刷新</a></li>
  <li><a href="#" class="btn btn-sm btn-success" style="margin-top: -7px;" onclick="history.go(-1)">返回</a></li>
</ul>
<div class="admin">
    <iframe scrolling="auto" rameborder="0" src="<?php echo U('Home/Index/info');?>" id="iframe" name="right" width="100%" height="100%" onload="loadFrame(this)"></iframe>
</div>

</body>
</html>