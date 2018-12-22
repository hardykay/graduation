<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
<link rel="stylesheet" href="/graduation/static/css/nav.css"> 
<script src="/graduation/static/js/jquery.min.js"></script>
<script src="/graduation/static/js/bootstrap.min.js"></script> 
</head>

<body>
    
    <div class="container">
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">查看开题报告</h3>
    </div>
    <div class="panel-body">
        
        <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="col-sm-4 control-label">学生</label>
              <div class="col-sm-8">
                <p class="form-control-static"><?php echo (base64_decode($li["sname"])); ?>[<?php echo ($li["stu_number"]); ?>]</p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">专业</label>
              <div class="col-sm-8">
                <p class="form-control-static"><?php echo (base64_decode($li["dep"])); ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">开题报告</label>
              <div class="col-sm-8">
                <p class="form-control-static"><a href="/graduation<?php echo ($li["wordpath"]); ?>"><?php echo (base64_decode($li["sname"])); ?>同学的中文开题报告</a></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">外文翻译原文开题报告</label>
              <div class="col-sm-8">
                <p class="form-control-static"><?php if(empty($li["w_wordpath"])): ?>无<?php else: ?><a href="/graduation<?php echo ($li["w_wordpath"]); ?>"><?php echo (base64_decode($li["sname"])); ?>同学的外文翻译原文开题报告</a><?php endif; ?></p>
              </div>
            </div>
        </form>
    </div>
</div>
<div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">立即评阅</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="<?php echo U('/Teacher/Report/Opinion/');?>" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data">

                    <input type="hidden" value="<?php echo ($li["stu_number"]); ?>" name='stu_number'>
                  <div style="clear:both;width: 100%;">
                    <div class="shjg">
                      <label class="red ">
                       审核结果：
                      </label>
                       <select name="audit">
                           <option selected = "selected"  value="1">通过</option>
                           <option value="2">未通过</option>
                       </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">评语【<span class="red">可以为空</span>】</label>
                    <textarea class="form-control" rows="10" id="editor" name='opinion'></textarea>
                  </div>
                    <div class="form-group">
                    <label  for="lastname" class="col-sm-2 control-label ">附件【可选】</label>
                    <div class="col-sm-4"><input type="file" name="file"></div>
                  </div>
                  <div style="width: 5rem;margin:0px auto;">
                  <input type="submit" id="fat-btn" class="btn btn-success" value="提交" >
                  </div>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>