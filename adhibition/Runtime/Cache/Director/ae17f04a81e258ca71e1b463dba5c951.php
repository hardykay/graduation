<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title></title>
        <link rel="stylesheet" href="/graduation/static/css/pintuer.css">
        <link rel="stylesheet" href="/graduation/static/css/admin.css">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/public.style.css"> 
        <script src="/graduation/static/js/jquery.min.js"></script>
        <script src="/graduation/static/js/bootstrap.min.js"></script> 
        <script src="/graduation/static/js/pintuer.js"></script>
        <style>
            .bitia{display: inline-block;line-height: 50px;color: red;width: 30px;text-align: center;}
            td:first-child{
                width: 150px;
                text-align: center;
                line-height: 100%;
            }
            .xuanze{
                width:100px;height: 30px;
            }
        </style>
        <script>
            $(document).ready(function () {
                $("body").on('click', '.opti', function () {
                    var name = $(this).children(".name1").text();
                    var hao = $(this).children(".hao").text();
                    var nav1 = '<div class="yixuan"><span class=""></span><span class="na">' + name + '</span><input type="hidden" value="' + hao + '" name="hao[]"></div>';
                    $("#stb").append(nav1);
                    var sel = '<option id="' + hao + '" value="' + name + '">' + name + '</option>';
                    $("#selet").append(sel);
                    $(this).remove();
                });
                $("body").on('click', '.yixuan', function () {
                    //alert("jkfgjgjjg")
                    var name = $(this).children(".na").text();
                    var hao = $(this).children("input").val();
                    var nav1 = '<div><span  class="opti"><span class="name1">' + name + '</span><span class="hao hidden">' + hao + '</span></span></div>';
                    $("#weixuan").append(nav1);
                    $(this).remove();
                    $('#' + hao).remove();
                });

            });

        </script>
    </head>
    <body>
        <div class="panel admin-panel">
            <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加评阅小组</strong></div>
            <div class="body-content">
                <form method="post" class="form-x" action="/graduation/Director/RandomAllotReview/createGroup.html">

                    <div class="form-group">
                        <div class="label">
                            <label for="sitename">名称：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50" value="<?php echo ($tea["name"]); ?>" id="mpass" name="name" size="50" placeholder="请输入评阅小组名称"  data-validate="required:请输入评阅小组名称"/><span class="bitia"> *</span> 
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label">
                            <label for="sitename">评阅专业：</label>
                        </div>
                        <div class="field">
                            <div class="col-sm-12">
                                <div style="float: left;margin-right: 30px;">
                                    <div class="bsxys">待选的专业</div>
                                    <div class="lxuankuang" id="weixuan" >
                                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div><span  class="opti"><span class="name1"><?php echo ($vo["dep_name"]); ?></span><span class="hao hidden"><?php echo ($vo["dep_id"]); ?></span></span></div><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>
                                <div style="float: left;">
                                    <div class="bsxys">已选的专业</div>
                                    <div class="lxuankuang" >
                                        <div id="stb">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    </body>

</html>