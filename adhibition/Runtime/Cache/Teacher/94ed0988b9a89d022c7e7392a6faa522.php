<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 

        <script src="/graduation/static/js/bootstrap.min.js"></script>
        <title>修改任务书</title>
        <link rel="stylesheet" type="text/css" href="/graduation/static/Redactor/css/style.css" /> 	
        <script type="text/javascript" src="/graduation/static/Redactor/lib/jquery-1.7.min.js"></script>	
        <link rel="stylesheet" href="/graduation/static/Redactor/redactor/css/redactor.css" />
        <script src="/graduation/static/Redactor/redactor/redactor.js"></script>
        <script type="text/javascript">
            $(document).ready(
                    function ()
                    {
                        $('#one').redactor({
                            // fixed: true,
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
                    }
            );
            $(document).ready(
                    function ()
                    {
                        $('#two').redactor({
                            // fixed: true,
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
                    }
            );
            $(document).ready(
                    function ()
                    {
                        $('#three').redactor({
                            // fixed: true,
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
                    }
            );
            $(document).ready(
                    function ()
                    {
                        $('#four').redactor({
                            // fixed: true,
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
                    }
            );
        </script>
        <style>
            textarea{
                height:400px;
            }
        </style>
    </head>
    <body>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">修改任务书</h3>
            </div>
            <form action="<?php echo U('Teacher/Assignment/Assignment2');?>" method="POST" enctype="multipart/form-data">
                <div class="panel-body">
                    <input name="stu_number" type="hidden" value="<?php echo ($stu); ?>" >
                    <h3>一、研究的主要内容</h3>
                    <textarea id="one" name="research" autofocus><?php echo (htmlspecialchars_decode($li["research"])); ?></textarea>
                    <h3>二、涉及知识和基本要求(<small>包括学生具备的基本知识、技能、文献查阅、外文翻译、论文撰写等要求</small>)</h3>
                    <textarea id="two" name="basic" autofocus><?php echo (htmlspecialchars_decode($li["basic"])); ?></textarea>
                    <h3>三、预期目标</h3>
                    <textarea id="three" name="expect" autofocus><?php echo (htmlspecialchars_decode($li["expect"])); ?></textarea>
                    <h3>四、进度安排</h3>
                    <textarea id="four" name="arrange" autofocus><?php echo (htmlspecialchars_decode($li["arrange"])); ?></textarea>

                    <h3>我的附件【可选】：<?php if(empty($li["url"])): ?>无<?php else: ?> <a href="/graduation<?php echo ($li["url"]); ?>">附件下载</a><?php endif; ?>  </h3>
                    <h3>上传附件【可选】：<input type="file" name="file"> </h3>
                    <h3 style="text-align: center">
                        <input type="submit" value="保存修改" class="btn btn-sm btn-info">
                    </h3>
                </div>

            </form>
        </div>
    </body>

</html>