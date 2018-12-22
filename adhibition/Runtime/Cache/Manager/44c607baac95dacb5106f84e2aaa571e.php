<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title></title>
        <script src="/graduation/static/js/jquery.min.js"></script>
        <link rel="stylesheet" href="/graduation/static/css/pintuer.css">
        <link rel="stylesheet" href="/graduation/static/css/admin.css">
        <style>
            .body-content {
                padding: 20px 0;
                overflow: hidden;
                min-height: 700px;
            }
            .form-x .form-group .label {
                width: 35%;
            }
            .form-x .form-group .field {
                float: left;
                width: 60%;
            }
            #toggle-button{ display: none; }
            .button-label{
                position: relative;
                display: inline-block;
                width: 80px;
                height: 30px;
                background-color: #ccc;
                box-shadow: #ccc 0px 0px 0px 2px;
                border-radius: 30px;
                overflow: hidden;
            }
            .circle{
                position: absolute;
                top: 0;
                left: 0;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: #fff;
            }
            .button-label .text {
                line-height: 30px;
                font-size: 18px;
                text-shadow: 0 0 2px #ddd;
            }

            .on { color: #fff; display: none; text-indent: 10px;}
            .off { color: #fff; display: inline-block; text-indent: 34px;}
            .button-label .circle{
                left: 0;
                transition: all 0.3s;
            }
            #toggle-button:checked + label.button-label .circle{
                left: 50px;
            }
            #toggle-button:checked + label.button-label .on{ display: inline-block; }
            #toggle-button:checked + label.button-label .off{ display: none; }
            #toggle-button:checked + label.button-label{
                background-color: #51ccee;
            }
        </style>
    </head>
    <body>
        <div class="panel admin-panel">
            <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 毕业设计（论文）管理系统设置</strong></div>
            <div class="body-content">
                <div  class="form-x">

                    <div class="form-group">
                        <div class="label">
                            <label for="sitename">指导老师查看学生成绩：</label>
                        </div>
                        <div class="field">
                            <label style="line-height:33px;">

                                <div class="toggle-button-wrapper" >
                                    <input type="checkbox" onclick="$.post('/graduation/Manager/SystemSetting/AlerSetting')" id="toggle-button" name="switch" value="1"<?php if(($list["InstructorTheTeacherLookGrade"]) == "ON"): ?>checked<?php endif; ?>>
                                    <label for="toggle-button" class="button-label">
                                        <span class="circle"></span>
                                        <span class="text on">ON</span>
                                        <span class="text off">OFF</span>
                                    </label>
                                </div>
                            </label>
                        </div>
                    </div> 


                </div>
            </div>
        </div>
    </body></html>