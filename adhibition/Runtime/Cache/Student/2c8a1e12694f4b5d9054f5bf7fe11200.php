<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
	<title>毕业设计（论文）定稿提交</title>
</head>
<body>
<br>
<div class="container" >
	<fieldset>
        <legend>相关提示</legend>
        <div style="margin: 0 auto;width: 80%">
            <h3>对于论文的最后一版就是定稿。</h3>
            <br>
            
        </div>
      
    </fieldset>
	<div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">论文定稿提交</h3>
        </div>
        <div class="panel-body">
            <form role="form" action="<?php echo U('Finalize/Preserve');?>" method="post" enctype="multipart/form-data" >
            	<div ><b>设计(论文)文件：</b><input type="file" name="file" style="display: inline-block;"></div>
              	<div style="line-height: 50px;">
              	设计(论文)文件：指毕业设计(论文)说明书或毕业论文，包括封面、中外文摘要和关键字、目录、正文、及参考文献等内容。格式为：word或PDF。
              	</div>
              	<div><b>附件：</b><input name="fujian" type="file" style="display: inline-block;"></div>
              	<div style="line-height: 50px;">
              	附件：指设计(论文)过程中产生的结果，包括图纸、视频、源码等材料，格式建议：zip或ran格式<span class="red">(统一使用压缩包文件为附件)</span><br>
              	
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