<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>指导老师</title>  
     <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="/graduation/static/css/pintuer.css">
    <link rel="stylesheet" href="/graduation/static/css/admin.css">
    <script src="/graduation/static/js/jquery.js"></script>   
    <link rel="shortcut icon" href="/graduation/static/images/icon.ico" />
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img style="height: 50px;" src="/graduation/static/images/sy.jpg" alt=""></h1>
  </div>
  <div class="head-l dropdown">
      <a class="button button-little bg-blue btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"><span class="caret"></span>指导老师</a>
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
        <?php if(($sf["specialty"]) == "1"): ?><li role="presentation">
            <a role="menuitem" tabindex="-1" href="<?php echo U('/Home/Switchover/Director');?>">系主任</a>
        </li><?php endif; ?>
    </ul>
  </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong>菜单列表</strong></div>
  <h2>基本流程</h2>
  <ul style="display:block">
    <li><a href="<?php echo U('Topic/ApplyFor');?>" target="right" title="申报课题">申报课题</a></li>
    <li><a href="<?php echo U('Choose/Index');?>" target="right" title="确认选题">选择学生<?php if($data["Choose"] != 0): ?><span style="color: red">(<?php echo ($data["Choose"]); ?>)</span><?php endif; ?></a></li>
    <li><a href="<?php echo U('Assignment/Index');?>" target="right" title="下达任务书">下达任务书<?php if($data["Assignment"] != 0): ?><span style="color: red">(<?php echo ($data["Assignment"]); ?>)</span><?php endif; ?></a></li>
    
    <li><a href="<?php echo U('Report/Index');?>" target="right" title="审阅开题报告">审阅开题报告<?php if($data["Report"] != 0): ?><span style="color: red">(<?php echo ($data["Report"]); ?>)</span><?php endif; ?></a></li>
    <li><a href="<?php echo U('Week/Index');?>" target="right" title="审核周进展报告">审核周进展报告<?php if($data["Week"] != 0): ?><span style="color: red">(<?php echo ($data["Week"]); ?>)</span><?php endif; ?></a></li>
    <li><a href="<?php echo U('Inspect/Index');?>" target="right" title="审核中期检查">审核中期检查<?php if($data["Inspect"] != 0): ?><span style="color: red">(<?php echo ($data["Inspect"]); ?>)</span><?php endif; ?></a></li>
    <li><a href="<?php echo U('Draft/Index');?>" target="right" title="审阅论文定稿">审阅(设计)论文草稿<?php if($data["Draft"] != 0): ?><span style="color: red">(<?php echo ($data["Draft"]); ?>)</span><?php endif; ?></a></li>
    <li><a href="<?php echo U('Finalize/Index');?>" target="right" title="审阅论文定稿">审阅(设计)论文定稿<?php if($data["Finalize"] != 0): ?><span style="color: red">(<?php echo ($data["Finalize"]); ?>)</span><?php endif; ?></a></li>
    <li><a href="<?php echo U('Review/Index');?>" target="right" title="评阅老师成绩评定">评阅老师成绩评定<?php if($data["Review"] != 0): ?><span style="color: red">(<?php echo ($data["Review"]); ?>)</span><?php endif; ?></a></li>
   
    <li><a href="<?php echo U('Index/Time');?>" target="right" title="学生材料打印">各个专业时间安排表</a></li>
  </ul>  
  <h2>其他操作</h2>
  <ul>
    <li><a href="<?php echo U('MagerTop/Index');?>" target="right">我的课题</a></li>   
    <li><a href="<?php echo U('Assignment/Student');?>" target="right">我的学生</a></li>  
    <li><a href="<?php echo U('Squad/Index');?>" target="right">查看答辩信息</a></li>  
    <li><a href="<?php echo U('Score/Index');?>" target="right">答辩成绩录入</a></li> 
    <?php if(($data["InstructorTheTeacherLookGrade"]) == "ON"): ?><li><a href="<?php echo U('Score/ScoreAllView');?>" target="right">查看学生的成绩</a></li><?php endif; ?>
    <li><a href="<?php echo U('Waichu/Index');?>" target="right" title="审核外出毕设申请">审核外出毕设申请<?php if($data["Waichu"] != 0): ?><span style="color: red">(<?php echo ($data["Waichu"]); ?>)</span><?php endif; ?></a></li>
     <li><a href="<?php echo U('Alteration/Index');?>" target="right" title="学生材料打印">审核题目更改<?php if($data["Alteration"] != 0): ?><span style="color: red">(<?php echo ($data["Alteration"]); ?>)</span><?php endif; ?></a></li>
    <!-- <li><a href="" target="right" title="优秀指导教师申请">优秀指导教师申请</a></li>
    <li><a href="" target="right" title="校级优秀论文推荐表">校级优秀论文推荐表</a></li>
    <li><a href="" target="right" title="学生材料打印">学生材料打印</a></li>    -->   
  </ul>   
  <h2>个人信息维护</h2>
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
function loadFrame(obj){  
    var url = obj.contentWindow.location.href;  
    $("#url").attr("href",url);
}  
</script>
<ul class="bread">
  <li><a href="<?php echo U('Home/Index/info');?>" target="right" class="icon-home"> 公告通知</a></li>
  <li>当前位置：<a href="##" id="a_leader_txt">公告通知</a></li>
  <li><b>欢迎：</b><span style="color:red;"><?php echo (session('name')); ?></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您的身份：指导老师</li>
  <li><a href="cate.html" target="right" id="url" class="btn btn-sm btn-success" style="margin-top: -7px;">刷新</a></li>
  <li><a href="#" class="btn btn-sm btn-success" style="margin-top: -7px;" onclick="history.go(-1)">返回</a></li>
</ul>
<div class="admin">
  <iframe scrolling="auto" id="iframe"  rameborder="0" src="<?php echo U('Home/Index/info');?>" name="right" width="100%" height="100%" onload="loadFrame(this)"></iframe>
</div>

</body>
</html>