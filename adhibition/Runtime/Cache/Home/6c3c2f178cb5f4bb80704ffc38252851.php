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
            .bitia{display: inline-block;line-height: 50px;color: red;width: 30px;text-align: center;}.field{line-height: 35px;}
        </style>
    </head>
    <body>
        <div class="panel admin-panel">
            <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 学生个人信息</strong></div>
            <div class="body-content">
                <div class="form-x">
                    <div class="form-group">
                        <div class="label">
                            <label for="sitename">姓名：</label>
                        </div>
                        <div class="field"><?php echo ($s["name"]); ?></div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label for="sitename">学号：</label>
                        </div>
                        <div class="field"><?php echo ($s["stu_number"]); ?></div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>常用邮箱：</label>
                        </div>
                        <div class="field"><?php echo ($s["email"]); ?></div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>手机号码：</label>
                        </div>
                        <div class="field"><?php echo ($s["phone"]); ?></div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>所属学院：</label>
                        </div>
                        <div class="field"><?php echo ($s["c"]); ?></div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>所属专业：</label>
                        </div>
                        <div class="field"><?php echo ($s["z"]); ?></div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>所属班级：</b>
                        </div>
                        <div class="field"><?php echo ($s["b"]); ?></div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>籍贯：</label>
                        </div>
                        <div class="field"><?php echo ($s["native_place"]); ?></div>
                    </div> 

                    <div class="form-group">
                        <div class="label">
                            <label>政治面貌：</label>
                        </div>
                        <div class="field"><?php echo ($s["politics_status"]); ?></div>
                    </div> 

                    <div class="form-group">
                        <div class="label">
                            <label>社会职务：</label>
                        </div>
                        <div class="field"><?php echo ($s["duty"]); ?></div>
                    </div> 

                    <div class="form-group">
                        <div class="label">
                            <label>年龄：</label>
                        </div>
                        <div class="field"><?php echo ($s["age"]); ?></div>
                    </div> 

                    <div class="form-group">
                        <div class="label">
                            <label>Q Q：</label>
                        </div>
                        <div class="field"><?php echo ($s["qq"]); ?></div>
                    </div> 


                    <div class="form-group">
                        <div class="label">
                            <label></label>
                        </div>
                        <div class="field">
                            <button class="button bg-main" type="button" onclick="history.go(-1)"> 返回</button>   
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </body></html>