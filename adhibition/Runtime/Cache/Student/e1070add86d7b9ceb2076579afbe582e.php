<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script src="/graduation/static/js/jquery.min.js"></script>
        <script src="/graduation/static/js/bootstrap.min.js"></script> 
        <title>学生提交开题报告和外文翻译</title>
    </head>
    <body>
        <br>
        <fieldset>
            <legend>注意事项</legend>
            <div style="width: 80%; margin: 0 auto;">
                
                <p>1、若老师有要求提交<b>外文翻译</b>，请同学们一并提交。</p> 
                <p>2、提交但未被审核的开题报告可以再次修改。</p> 
            </div>
        </fieldset>
        <!--<div class="container" >-->
        <table class="table panel-info bshadow" >
            <thead>
                <tr class="success">
                    <th>课题名称</th>
                    <th>课题类型</th>
                    <th>指导老师</th>
                    <th>开题报告状态</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="twidth"><?php echo ($li["name"]); ?></td>
                    <td><?php echo ($li["genre"]); ?></td>
                    <td><?php echo ($li["tea_name"]); ?></td>
                    <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">请填写开题报告</button></td>
                </tr>
        </table>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">请填写开题报告</h4>
                    </div>
                    <form action="<?php echo U('Report/Sub');?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            中文开题报告：<input type="file" name="file1" style="display: inline-block;"></div><div style=" float:left; ">

                        </div>
                        <div class="modal-body">
                            外文翻译开题报告：<input type="file" name="file2"  style="display: inline-block;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>