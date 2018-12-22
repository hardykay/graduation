<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  

    <head>  
        <title>大学生毕业设计课题申请表</title>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/public.style.css"> 
        <link rel="stylesheet" href="/graduation/static/css/ApplyFor.css"> 
        <script src="/graduation/static/js/jquery.min.js"></script>
        <script src="/graduation/static/js/bootstrap.min.js"></script> 
        <meta name="viewport" content="width=device-width">
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
        <style>
            td:first-child{
                width: 150px;
                text-align: center;
                line-height: 100%;
            }
            .xuanze{
                width:100px;height: 30px;
            }
        </style>
    </head>  
    <body>
        <h2>大学生毕业设计课题申请表</h1>  
        <form action="<?php echo U('Topic/MapplyFor');?>" method="post" enctype="multipart/form-data" >
            <table   class="table table-bordered">  
                <tr>  
                    <td>课题名称</td>  
                    <td width="470" colspan="6"><input style="width: 100%;height: 35px;border:0px;outline: 0;font-size: 20px" name="name" required placeholder="请输入课题名称" value="<?php echo ($top["name"]); ?>"></td>  
                </tr> 
                <tr>  
                    <td height="40">题目类型</td>  
                    <td class="bcolor"  colspan="6"> 
                        <select name="genre" required class="xuanze">
                            <option value="" >请选择</option>
                            <option value="论文" >论文</option>
                            <option value="设计" >设计</option>
                        </select>
                    </td>
                </tr>
                <tr>  
                    <td height="40">结合科研</td>  
                    <td class="bcolor"  colspan="6"> 
                        <select name="seientific" required  class="xuanze">
                            <option value="" >请选择</option>
                            <option value="是" >是</option>
                            <option value="否" >否</option>
                        </select>
                    </td>
                </tr> 
                <tr>  
                    <td height="40">结合生产实践<br>和社会实际</td>
                    <td class="bcolor"  colspan="6"> 
                        <select name="practice" required  class="xuanze">
                            <option value="" >请选择</option>
                            <option value="是" >是</option>
                            <option value="否" >否</option>
                        </select>
                    </td>
                </tr>
                <tr>  
                    <td height="65" ><br><br><br><br><br><br>主要研究内容及要求</td>
                    <td width="470" colspan="6"><textarea name="content" style="width:100%;height: 400px;" id="redactor" required><?php echo (htmlspecialchars_decode($top["content"])); ?></textarea></td> 
                </tr>  
                <tr>  
                    <td>预选题(带)人数</td>
                    <td colspan="6"><input name="youxiao" type="number" style="width:100px;" max="100" min="1" class="input-sm" required>(请认真填写，这是最后阶段(选课结束)系统随机分配课题和学生的依据！)</td> 
                </tr> 
                <tr>  
                    <td>课题选择模式</td>
                    <td class="bcolor"  colspan="6"> 
                        盲选课题（双向选择，学生选择教师后，再由教师选择学生，需要您本人手动操作哦！）
                    </td>
                </tr>

                <tr><td style="text-align: center"><br><br><br>请选择专业</td>
                    <td colspan="6">
                        <div class="col-sm-12">
                            <div style="float: left;margin-right: 30px;">
                                <div class="bsxys">待选的专业</div>
                                <div class="lxuankuang" id="weixuan" >
                                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>
                                            <span class="glyphicon glyphicon-plus-sign opti"><span class="name1"><?php echo ($vo["dep_name"]); ?></span><span class="hao none"><?php echo ($vo["dep_id"]); ?></span></span>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
                    </td>
                </tr>
                <tr>  
                    <td height="60">附件</td>  
                    <td colspan="6" >
                        <div style="width: 200px;margin: 0 auto;">
                            <input type="file" name="file" >(rar,zip,doc,docx.pdf,ppt)
                        </div>
                    </td> 
                </tr>  
            </table>
            <br>
            <div style="width: 300px;margin: 0 auto;">
                <button type="submit" class="btn btn-success" >提交</button>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary" name="submit" value="1">保存</button>
            </div>
            <br><br><br>
        </form>
        <div style="width:610px;margin:0 auto;">  
            <p style="float: left;">注：1、以上内容要求申请人填写完整</p>  
            <p style="text-indent:2em;float: left;">2、本表解释权归学校所有</p>  
        </div>  

        <script>
                    $(document).ready(function () {
                $("body").on('click', '.opti', function () {
                    var name = $(this).children(".name1").text();
                    var hao = $(this).children(".hao").text();
                    var nav1 = '<div class="yixuan"><span class="glyphicon glyphicon-remove-circle red"></span><span class="na">' + name + '</span><input type="hidden" value="' + hao + '" name="hao[]"></div>';
                    $("#stb").append(nav1);
                    var sel = '<option id="' + hao + '" value="' + name + '">' + name + '</option>';
                    $("#selet").append(sel);
                    $(this).remove();
                });
                $("body").on('click', '.yixuan', function () {
                    //alert("jkfgjgjjg")
                    var name = $(this).children(".na").text();
                    var hao = $(this).children("input").val();
                    var nav1 = '<div><span  class="glyphicon glyphicon-plus-sign opti"><span class="name1">' + name + '</span><span class="hao none">' + hao + '</span></span></div>';
                    $("#weixuan").append(nav1);
                    $(this).remove();
                    $('#' + hao).remove();
                });

            });

        </script>
</body>  
</html>