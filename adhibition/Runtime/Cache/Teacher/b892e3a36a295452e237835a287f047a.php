<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 

        <script src="/graduation/static/js/bootstrap.min.js"></script>
        <title>发布任务书</title>
        <link rel="stylesheet" type="text/css" href="/graduation/static/Redactor/css/style.css" /> 	
        <script type="text/javascript" src="/graduation/static/Redactor/lib/jquery-1.7.min.js"></script>	
        <link rel="stylesheet" href="/graduation/static/Redactor/redactor/css/redactor.css" />
        <script src="/graduation/static/Redactor/redactor/redactor.js"></script>
        <script type="text/javascript">
            $(document).ready(
                    function ()
                    {
                        $('#one').redactor({
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
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
                    }
            );
        </script>
        <style>
            textarea{
                height:400px
            }
        </style>
    </head>
    <body>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">下达任务书<i class="i"></i><?php echo ($vo["name"]); ?></h3>
            </div>
            <form action="<?php echo U('Teacher/Assignment/Assignment1');?>" method="POST" enctype="multipart/form-data">
                <div class="panel-body">
                    <h3>一、研究的主要内容</h3>
                    <textarea id="one" name="research" autofocus required ></textarea>
                    <h3>二、涉及知识和基本要求(<small>包括学生具备的基本知识、技能、文献查阅、外文翻译、论文撰写等要求</small>)</h3>
                    <textarea id="two" name="basic" autofocus required ></textarea>
                    <h3>三、预期目标</h3>
                    <textarea id="three" name="expect" autofocus required ></textarea>
                    <h3>四、进度安排</h3>
                    <textarea id="four" name="arrange" autofocus required ></textarea>
                    <input type="hidden" name="stu_number" value="<?php echo ($top["stu_number"]); ?>"/>
                    <input type="hidden" name="dep_id" value="<?php echo ($top["dep"]); ?>"/>
                    <input name="top_id" type="hidden" value="<?php echo ($top["top_id"]); ?>" >
                    <h3>附件【可选】：<input type="file" name="file"> </h3>
                    <h3 style="text-align: center">
                        <input type="submit" value="提交" class="btn btn-sm btn-info">
                    </h3>
                </div>

            </form>
        </div>
    </body>
</html>