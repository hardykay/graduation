<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title></title>
<link rel="stylesheet" href="/graduation/static/css/pintuer.css">
    <link rel="stylesheet" href="/graduation/static/css/admin.css">
<script src="/graduation/static/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/graduation/static/css/pintuer.css">
    	<link media="all" rel="stylesheet" type="text/css" href="/graduation/static/simditor-2.0.1/styles/font-awesome.css" />
	<link media="all" rel="stylesheet" type="text/css" href="/graduation/static/simditor-2.0.1/styles/simditor.css" />
	<link media="all" rel="stylesheet" type="text/css" href="bootstrap/styles/bootstrap.css" />
        <link media="all" rel="stylesheet" type="text/css" href="/graduation/static/css/bootstrap.css" />
	<script type="text/javascript" src="/graduation/static/simditor-2.0.1/scripts/jquery.min.js"></script>
	<script type="text/javascript" src="/graduation/static/simditor-2.0.1/scripts/module.js"></script>
	<script type="text/javascript" src="/graduation/static/simditor-2.0.1/scripts/uploader.js"></script>
	<script type="text/javascript" src="/graduation/static/simditor-2.0.1/scripts/simditor.js"></script>
        
<script type="text/javascript">
  	$(function(){
  		toolbar = [ 'title', 'bold', 'italic', 'underline', 'strikethrough',
					'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|',
					'link', 'image', 'hr', '|', 'indent', 'outdent' ];
		var editor = new Simditor( {
			textarea : $('#editor'),
			placeholder : '这里输入内容...',
			toolbar : toolbar,  //工具栏
			defaultImage : '/graduation/static/simditor-2.0.1/images/image.png', //编辑器插入图片时使用的默认图片
			upload : {
				url : '/graduation/Manager/Gonggao/uplo', //文件上传的接口地址
			    params: null, //键值对,指定文件上传接口的额外参数,上传的时候随文件一起提交
			    fileKey: 'file', //服务器端获取文件数据的参数名
			    connectionCount: 3,
			    leaveConfirm: '正在上传文件'
			} 
		});
  	})
  </script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 发布公告</strong></div>
  <div class="body-content">
      <form method="post" class="form-x" action="/graduation/Manager/Gonggao/Add.html" enctype="multipart/form-data">      
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="title" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>附件：</label>
        </div>
        <div class="field">
          <input type="file" name="file"  />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
            <textarea name="content" id="editor"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>