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
        <script src="/graduation/static/js/pintuer.js"></script>
        <style>
            .bitia{display: inline-block;line-height: 50px;color: red;width: 30px;text-align: center;}
        </style>
    </head>
    <body>
        <div class="panel admin-panel">
            <div class="panel-head"><strong><span class="icon-pencil-square-o"></span>教师信息</strong></div>
            <div class="body-content">
                <form class="form-x">

                    <div class="form-group">
                        <div class="label">
                            <label for="sitename">姓名：</label>
                        </div>
                        <div class="field"><?php echo ($tea["name"]); ?>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>常用邮箱：</label>
                        </div>
                        <div class="field">
                            <?php echo ($tea["email"]); ?>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>手机号码：</label>
                        </div>
                        <div class="field">
                            <?php echo ($tea["phone"]); ?>      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>职称：</label>
                        </div>
                        <div class="field">
                            <?php echo ($tea["title"]); ?> 
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="label">
                            <label>学历：</label>
                        </div>
                        <div class="field">
                            <?php echo ($tea["education"]); ?>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>职务：</label>
                        </div>
                        <div class="field">
                            <?php echo ($tea["post1"]); ?>     
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>学术专长：</label>
                        </div>
                        <div class="field">
                            <?php echo ($tea["acaspe"]); ?>      
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>所在单位：</label>
                        </div>
                        <div class="field">
                            <?php echo ($tea["belong"]); ?>      
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="label">
                            <label>Q Q：</label>
                        </div>
                        <div class="field">
                            <?php echo ($tea["qq"]); ?>
                        </div>
                    </div>      
                </form>
            </div>
        </div>
    </body></html>