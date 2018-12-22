<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>首页-胜院毕设</title>
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  

        <link rel="stylesheet" type="text/css" href="/graduation/static/css/login.css" />
        <script type="text/javascript" src="/graduation/static/js/jquery.min.js"></script>
        <script src="/graduation/static/js/bootstrap.min.js"></script> 
    </head>

    <body style="background: rgba(52, 54, 66, 0.9);">
        <div class="cd-user-modal is-visible"> 
            <div class="cd-user-modal-container">
                <ul class="cd-switcher">
                    <li><a href="#0"  style="color:#333;font-size: 20px;">教师登陆</a></li>
                    <li><a href="/graduation/Home/Index/Student">学生登陆</a></li>
                </ul>
                <div id="cd-signup" class="is-selected"> <!-- 教师登陆 -->
                    <form class="cd-form" action="/graduation/Home/Login/Teacher" method="post">
                        <p class="fieldset">
                            <label class="image-replace cd-username" for="signup-username">教师工号</label>
                            <input  class="full-width has-padding has-border" id="signup-username" name="hao" value="<?php echo (cookie('name')); ?>" required type="text" placeholder="输入教师工号">
                        </p>
                        <p class="fieldset">
                            <label class="image-replace cd-password" for="signup-password">密码</label>
                            <input class="full-width has-padding has-border" required id="signup-password" value="<?php echo (cookie('pwd')); ?>"  type="password" name="pwd" placeholder="输入密码">
                        </p>

                        <p class="fieldset">
                            <label class="image-replace " for="signin-password">验证码</label>
                            <input class="full-width  has-border"  required  type="text" name="code" placeholder="  验证码" style="width: 100px;height: 50px;padding-left: 8px;">
                            <img src="/graduation/Home/Verify" title="验证码" onclick="yan(this)"/> 
                        </p>
                        <p class="fieldset"><a  data-toggle="modal" data-target="#myModal" style="text-decoration: none">忘记密码？找回密码</a></p>
                        <!-- <p class="fieldset">
                                <input type="checkbox" id="accept-terms">
                                <label for="accept-terms">我已阅读并同意 <a href="#0">用户协议</a></label>
                        </p> -->

                        <p class="fieldset">
                            <input class="full-width2" type="submit" value="教 师 登 录">
                        </p>
                    </form>
                </div>
            </div>
        </div> 

        <!-- 教师（Modal） -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">教师找回密码</h4>
                    </div>
                    <form class="form-horizontal" role="form" action="<?php echo U('/Home/Login/AlterTeaWd');?>" method="post">
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
                                    <input type="text" class="form-control" id="tea_email" name="email" placeholder="请输入预留的邮箱">
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
                                <label for="firstname" class="col-sm-3 control-label"><input type="button"  class="btn btn-primary btn-sm" id="tea" value="获取验证码" /></label>
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
        document.getElementById("tea").onclick = function () {
           teather();
            if (code == 1 || code == 2)
                return;
            time(this);
        };
        
        var code = 0;
        function teather() {
            var zhao = jQuery("#hao").val();
            var email = jQuery("#tea_email").val();
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
                    email: jQuery("#tea_email").val(),
                    i:1
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