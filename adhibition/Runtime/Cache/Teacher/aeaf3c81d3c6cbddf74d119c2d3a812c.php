<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  

    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/public.style.css"> 
        <link rel="stylesheet" href="/graduation/static/css/ApplyFor.css"> 
        <script src="/graduation/static/js/jquery.min.js"></script>
        <script src="/graduation/static/js/bootstrap.min.js"></script> 
        <title>大学生毕业设计课题申请表</title>  
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
        <form action="<?php echo U('Topic/Team');?>" method="post" enctype="multipart/form-data" >
            <table border="1" class="table table-bordered">  
                <tr>  
                    <td width="140" height="50" align="center">课题名称</td>  
                    <td width="470" colspan="6"><input style="width: 100%;height: 35px;border:0px;outline: 0;font-size: 20px" name="name" required placeholder="请输入课题名称" value="<?php echo ($top["name"]); ?>"></td>  
                </tr> 
                <!--            <tr>  
                                <td colspan="7" class="red">老师们请注意，团队课题很霸道，一旦提交成功，将会清除学生所选的课题或被选的课题，就是将学生重置为初始化状态。<br>
                                    为了避免不必要的麻烦，恳请老师，在申请课题前，跟学生商量好。</td>  
                            </tr> -->
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
                    <td height="40">结合生产实践和社会实际</td>  
                    <td class="bcolor"  colspan="6"> 
                        <select name="practice" required  class="xuanze">
                            <option value="" >请选择</option>
                            <option value="是" >是</option>
                            <option value="否" >否</option>
                        </select>
                    </td>
                </tr>
                <tr>  
                    <td height="65" >主要研究内容及要求(分工)</td>
                    <td width="470" colspan="6"><textarea name="content" style="width:100%;height: 400px;" id="redactor" required><?php echo (htmlspecialchars_decode($top["content"])); ?></textarea></td> 
                </tr>  
                <tr>  
                    <td height="70">课题模式</td>
                    <td class="bcolor"  colspan="6"  height="40"> 
                        团队课题<span class="red">(请注意：已进行团队课题、外出毕设、指定选的学生不在选择之内)</span>
                    </td>
                </tr>
                <tr>  
                    <td height="65" >请选择</td>
                    <td width="470" colspan="6">
                        <select id="col" name="col" onchange="cha('col', 'spe')" >
                            <option>请选择学院</option>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["dep_id"]); ?>"><?php echo ($vo["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <select id="spe" onchange="xuesheng('spe', 'cla')"><option>请选择专业</option></select>
                        <select id="cla" onchange="stu('cla')"><option>请选择班级</option></select>
                    </td> 
                </tr> 

                <tr>
                    <td><br><br><br><div id="gongduoshao" class="red"></div></td>
                    <td colspan="6">
                        <div class="col-sm-12">
                            <div style="float: left;margin-right: 30px;">
                                <div class="bsxys">待选的学生</div>
                                <div class="lxuankuang" id="weixuan" >

                                </div>
                            </div>
                            <div style="float: left;">
                                <div class="bsxys">已选的学生</div>
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
                <button type="submit" class="btn btn-success">提交</button>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary" name="submit" value="1">保存</button>
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
                    //      var sel = '<option id="'+hao+'" value="'+name+'">'+name+'</option>';
                    //      $("#selet").append(sel);
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
            function cha(obj, bian) {
                var val = jQuery("#" + obj).val();
                $.ajax({
                    url: '/graduation/Teacher/Ajax/spe2', //这里指向的就不再是页面了，而是一个方法。
                    data: {'dep': val},
                    type: "POST",
                    dataType: "JSON",
                    success: function (data) {
                        //alert(data[0].code);//这里要用索引，使用eq读取不出来数据。
                        var str = '<option value="">请选择</option>';
                        //alert(data);//alert(data[1].dep_id)
                        $(data).each(function (i) {
                            //alert(data[i].dep_name);
                            str += "<option value='" + data[i].d + "'>" + data[i].n + "</option>";
                        });
                        $('#' + bian).empty();
                        $('#' + bian).append(str);
                    }
                });
            }
            function xuesheng(obj, bian) {
                var val = jQuery("#" + obj).val();
                $.ajax({
                    url: '/graduation/Teacher/Ajax/cla', //这里指向的就不再是页面了，而是一个方法。
                    data: {'dep': val},
                    type: "POST",
                    dataType: "JSON",
                    success: function (data) {
                        //alert(data[0].code);//这里要用索引，使用eq读取不出来数据。
                        var str = '<option value="">请选择</option>';
                        //alert(data);//alert(data[1].dep_id)
                        $(data).each(function (i) {
                            //alert(data[i].dep_name);
                            str += "<option value='" + data[i].d + "'>" + data[i].n + "</option>";
                        });
                        $('#' + bian).empty();
                        $('#' + bian).append(str);
                    }
                });
            }
            function stu(obj) {
                var yy = 0;
                var val = jQuery("#" + obj).val();
                $.ajax({
                    url: '/graduation/Teacher/Ajax/mStu', //这里指向的就不再是页面了，而是一个方法。
                    data: {'dep': val},
                    type: "POST",
                    dataType: "JSON",
                    success: function (data) {
                        var str = '';
                        $(data).each(function (i) {
                            //alert(data[i].dep_name);
                            str += '  <div><span  class="glyphicon glyphicon-plus-sign opti"><span class="name1">' + data[i].n + '[' + data[i].d + ']' + '</span><span class="hao none">' + data[i].d+','+data[i].m + '</span></span></div>';
                            yy++;
                        });

                        $('#weixuan').empty();
                        $('#weixuan').append(str);
                        tt = '共' + yy + '名学生'
                        $('#gongduoshao').empty();
                        $('#gongduoshao').append(tt);
                    }
                });
            }

        </script>
</body>  
</html>