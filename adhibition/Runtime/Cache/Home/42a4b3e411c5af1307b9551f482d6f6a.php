<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>首页-胜院毕设</title>
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script src="/graduation/static/js/jquery.min.js"></script>
        <link rel="shortcut icon" href="/graduation/static/images/logon.ico" />
        <link rel="stylesheet" type="text/css" href="/graduation/static/css/login.css" />
        <script type="text/javascript" src="/graduation/static/js/jquery.min.js"></script>
        <script src="/graduation/static/js/bootstrap.min.js"></script> 


    </head>

    <body style="">


        <div class="cd-user-modal is-visible"> 
            <div class="cd-user-modal-container">
                <ul class="cd-switcher">
                    <li><a href="#0" style="color:#333;font-size: 20px;">学生登陆</a></li>
                    <li><a href="/graduation/Home/Index/Login" >教师登陆</a></li>
                </ul>

                <div id="cd-login"  class="is-selected"> <!-- 学生登陆 -->
                    <form class="cd-form" action="/graduation/Home/Login/Student" method="post">
                        <p class="fieldset">
                            <label class="image-replace cd-username" for="signup-username">学生学号</label>
                            <input class="full-width has-padding has-border" id="signup-username" value="<?php echo (cookie('name')); ?>" required type="text" placeholder="输入学生学号" name="hao">
                        </p>

                        <p class="fieldset">
                            <label class="image-replace cd-password" for="signin-password" name="pwd">密码</label>
                            <input class="full-width has-padding has-border" id="signin-code" required type="password"  placeholder="输入密码" value="<?php echo (cookie('pwd')); ?>" name="pwd"><br />
                        </p>

                        <p class="fieldset">
                            <label class="image-replace " for="signin-password">验证码</label>
                            <input   class="full-width  has-border"  required  type="text" name="code" placeholder="  验证码" style="width: 100px;height: 50px;padding-left: 8px;">
                            <img style=" " src="/graduation/Home/Verify" title="验证码" onclick="yan(this)"/> 
                        </p>
                        <p class="fieldset"><a  data-toggle="modal" data-target="#myStu" style="text-decoration: none">忘记密码？找回密码</a></p>


                        <p class="fieldset">
                            <input class="full-width2" type="submit" value="学 生 登 录">
                        </p>
                    </form>
                </div>
            </div>
        </div> 
        <!-- 学生（Modal） -->
        <div class="modal fade" id="myStu" tabindex="-1" role="dialog" aria-labelledby="myStuLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">学生找回密码</h4>
                    </div>
                    <form class="form-horizontal" role="form" action="<?php echo U('/Home/Login/AlterStuWd');?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="firstname" class="col-sm-3 control-label">账号：</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="hao" name="hao" placeholder="请输入账号">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-sm-3 control-label">预留的邮箱：</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="stu_email" name="email" placeholder="请输入预留的邮箱">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-sm-3 control-label">新密码：</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pwd1" class="form-control" id="firstname" placeholder="请输入新密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-sm-3 control-label">收到的验证码：</label>
                                <div class="col-sm-3">
                                    <input type="text" name="code" class="form-control" id="firstname" placeholder="验证码">
                                </div>
                                <label for="firstname" class="col-sm-3 control-label"><input type="button"  class="btn btn-primary btn-sm" id="stuh" value="获取验证码" /></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
    </body>
    <script type="text/javascript">
        ///刷新验证码
        var i = 0;
        function yan(t) {
            t.src = ' /graduation/Home/Verify/Index/' + i++;
        }
        var wait = 60;
        function time(o) {
            if (wait == 0) {
                o.removeAttribute("disabled");
                o.value = "获取验证码";
                wait = 60;
            } else {

                o.setAttribute("disabled", true);
                o.value = "重新发送(" + wait + ")";
                wait--;
                setTimeout(function () {
                    time(o)
                },
                        1000)
            }
        }
        document.getElementById("stuh").onclick = function () {

            student();
            if (code == 1 || code == 2)
                return;
            time(this);
        };
        var code = 0;
        function student() {
            var zhao = jQuery("#hao").val();
            var email = jQuery("#stu_email").val();
            if ( zhao == '') {
                alert('请输入账号');
                retrun;
            }
            if (email == '') {
                alert('请输入邮箱');
                retrun;
            }
            if(!isEmail(email)){
                alert('邮箱格式不正确');
                retrun;
            }
            $.ajax({
                type: "post",
                url: "<?php echo U('/Home/Login/Retrieve');?>",
                data: {
                    hao: jQuery("#hao").val(),
                    email: jQuery("#stu_email").val(),
                    i:2
                },
                async: false,
                success: function (data) {
                    switch (data) {
                        case 1:
                            alert('邮箱格式不真确！');
                            break;
                        case 2:
                            alert('邮箱或者账号错误！');
                            break;
                        case 3:
                            alert('邮件发送成功，请查收！');
                            break;
                        case 4:
                            alert('您的操作太频繁，请稍后再试！');
                            break;
                        default:
                            alert('系统繁忙，请稍后再试！');

                    }
                    code = data;
                }
            });
        }
        function isEmail(str) {
            var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
            return reg.test(str);
        }
    </script>
</html>