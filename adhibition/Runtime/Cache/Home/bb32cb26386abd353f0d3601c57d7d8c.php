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
            <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 完善个人信息</strong></div>
            <div class="body-content">
                <form method="post" class="form-x" action="/graduation/Home/Teacher/Check">

                    <div class="form-group">
                        <div class="label">
                            <label for="sitename">姓名：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50" value="<?php echo ($tea["name"]); ?>" id="mpass" name="name" size="50" placeholder="请输入姓名"  data-validate="required:请输入姓名"/><span class="bitia"> *</span> 
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label">
                            <label for="sitename">帐号：</label>
                        </div>
                        <div class="field">
                            <label style="line-height:33px;">
                                <?php echo (session('tea_number')); ?>
                            </label>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>常用邮箱：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50" name="email"  value="<?php echo ($tea["email"]); ?>" size="50" placeholder="请输入常用邮箱" data-validate="required:请输入常用邮箱" /><span class="bitia"> *</span>   
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>手机号码：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50" name="phone" pattern="1\d{10}"  value="<?php echo ($tea["phone"]); ?>"  placeholder="请输入常用手机号" data-validate="required:请输入常用手机号" /><span class="bitia"> *</span>       
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label">
                            <label>Q Q/微信：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50" name="qq"  value="<?php echo ($tea["qq"]); ?>" />       
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>职称：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50" name="title" size="50"  value="<?php echo ($tea["title"]); ?>" />       
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="label">
                            <label>学历：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50" name="education"  value="<?php echo ($tea["education"]); ?>" size="50" />       
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>职务：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50" name="post1"  value="<?php echo ($tea["post1"]); ?>" size="50" />       
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>学术专长：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50" name="acaspe"  value="<?php echo ($tea["acaspe"]); ?>" size="50" />       
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="label">
                            <label>所在单位：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50" name="belong"  value="<?php echo ($tea["belong"]); ?>" size="50" />       
                        </div>
                    </div>  


                    <div class="form-group">
                        <div class="label">
                            <label></label>
                        </div>
                        <div class="field">
                            <button class="button bg-main icon-check-square-o" type="submit"> 保存</button>   
                        </div>
                    </div>      
                </form>
            </div>
        </div>
    </body></html>