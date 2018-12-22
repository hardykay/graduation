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
        <link rel="stylesheet" type="text/css" href="/graduation/static/Redactor/css/style.css" /> 	
        <script type="text/javascript" src="/graduation/static/Redactor/lib/jquery-1.7.min.js"></script>	
        <link rel="stylesheet" href="/graduation/static/Redactor/redactor/css/redactor.css" />
        <script src="/graduation/static/Redactor/redactor/redactor.js"></script>
        <script type="text/javascript">
            $(document).ready(
                    function ()
                    {
                        $('#redactor').redactor({
                            fixed: true,
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
                    }
            );
        </script>
    </head>
    <body>
        <div class="panel admin-panel">
            <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 发布公告</strong></div>
            <div class="body-content">
                <form method="post" class="form-x" action="/graduation/Dean/Gonggao/Add.html" enctype="multipart/form-data">      
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
                            <textarea name="content" id="redactor"></textarea>
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