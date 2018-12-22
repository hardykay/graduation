<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/nav.css">
        <link rel="stylesheet" type="text/css" href="/graduation/static/Redactor/css/style.css" /> 	
        <script type="text/javascript" src="/graduation/static/Redactor/lib/jquery-1.7.min.js"></script>	
        <link rel="stylesheet" href="/graduation/static/Redactor/redactor/css/redactor.css" />
        <script src="/graduation/static/Redactor/redactor/redactor.js"></script>
        <script type="text/javascript">
            $(document).ready(
                    function ()
                    {
                        $('#redactor').redactor({
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
                    }
            );
            $(document).ready(
                    function ()
                    {
                        $('#redactor1').redactor({
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
                    }
            );
        </script>


        <style type="text/css">
            .wrapper {
                width: 950px;
                margin: 0 auto;
            }
            input{
                outline: 0;border:2px solid #e5e5e5;
            }
            .redactor_toolbar{
                z-index: 1;
            }
        </style> 
        <title>外出毕业设计学生申请</title>
    </head>
    <body>
        <div style="width: 500px;margin: 10px auto">
            <fieldset>
                <legend>相关提示</legend>
                <p>1、填写申请表前，请确认联系好校内外指导老师；</p>
                <p>2、请认真填写相关信息，确保准确无误，否则无法审核；</p>
                <p>3、提交申请后，请携带外出毕业设计协议，主动联系校内指导老师审核；</p>
                <p>4、审核通过后，请联系校内指导老师进行课题审核和任务书下达；</p>
            </fieldset>
        </div>
        <div class="maofu" >

            <div class="col-md-1 col-lg-1 col-xs-12"></div>
            <div class="col-md-10 col-lg-10 col-xs-12" >
                <form action="<?php echo U('Waichu/Wai');?>" method="post" enctype="multipart/form-data">
                    <table  class="table panel-info bshadow" border=""  align="center" cellpadding="5" class="table" cellspacing="0">
                        <thead align="center" >
                            <tr  align="left">
                                <th colspan="5" >中国石油大学本科生毕业设计（论文）申请表</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <tr >
                                <td><b>学生姓名</b></td>
                                <td><?php echo ($s["name"]); ?></td>
                                <td><b>学生学号</b></td>
                                <td><?php echo ($s["stu_number"]); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>学院</b></td>
                                <td><?php echo ($s["college"]); ?></td>
                                <td><b>专业</b></td>
                                <td><?php echo ($s["specialty"]); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>拟定题目名称</b></td>
                                <td colspan="4"><input style="width: 90%;" type="text" name="name"></td>
                            </tr>
                            <tr>
                                <td colspan="5"><b>校外指导老师信息</b></td>
                            </tr>
                            <tr>
                                <td><b>联系电话</b></td>
                                <td><input type="text" name="phone"></td>
                                <td><b>电子邮箱</b></td>
                                <td><input type="text" name="email"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>校外指导单位</b></td>
                                <td><input type="text" name="external"></td>
                                <td><b>单位地址</b></td>
                                <td><input type="text" name="address"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>姓名</b></td>
                                <td><b>性别</b></td>
                                <td><b>学历、学位</b></td>
                                <td><b>技术职称</b></td>
                                <td><b>研究方向</b></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="w_name"></td>
                                <td><input type="radio" value="男" name="w_sex" checked>男 <input type="radio" value="女" name="w_sex">女</td>
                                <td><input type="text" name="w_degree"></td>
                                <td><input type="text" name="w_zhicheng"></td>
                                <td><input type="text" name="w_direction"></td>
                            </tr>
                            <tr>
                                <td><b>校内指导老师</b></td>
                                <td colspan="4">
                                    <input type="button" class="btn btn-primary btn-sm" onclick='$("#myModal").addClass("in");$("#myModal")[0].style.display ="block"' id="teacher" value="请选择指导老师">
                                    <input type="hidden" id="tea_number" name="tea_number">
                                    <input type="hidden" id="tea_name" name="tea_name">
                                </td>
                            </tr>
                            <tr>
                                <td><br><br><br><br><br><br><b>申请理由</b></td>
                                <td colspan="4"><textarea id="redactor" style="width: 100%;height:300px" name="content"></textarea></td>
                            </tr>
                            <tr>
                                <td><b><br><br><br><br><br><br><b>校外指导单位的意见</b></td>
                                <td colspan="4"><textarea id="redactor1" style="width: 100%;height: 300px" name="content2"></textarea></td>
                            </tr>

                            <tr>
                                <td><b>附件</b></td>
                                <td colspan="4"><input type="file" name="file"></td>
                            </tr>
                        </tbody>
                        <tfoot >
                            <tr>
                                <td colspan="5" align="center">
                                    <input type="submit" class="btn btn-success" value="提交">
                                    <input type="submit" class="btn btn-success" value="返回">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" onclick='$("#myModal").remove("in");$("#myModal")[0].style.display ="none"' class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">选择校内指导老师</h4>
                    </div>
                    <div class="modal-body">
                        <select id="col" onchange="Teacher('col')">
                            <option value="" id="col">请选择学院</option>
                            <?php if(is_array($col)): $i = 0; $__LIST__ = $col;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><option value="<?php echo ($l["dep_id"]); ?>" ><?php echo ($l["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <select id="tea" onchange="stu('tea')"><option value="">请选择指导老师</option></select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onclick='$("#myModal").remove("in");$("#myModal")[0].style.display ="none"'>关闭</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
    </body>
    <script type="text/javascript">
        /**
         * 
         * @param {type} obj
         * @returns {undefined}获得班级
         */
        function Teacher(obj) {
            var val = jQuery("#" + obj).val();
            //alert(val)
            if (val == '') {
                return;
            }
            $.ajax({
                url: "<?php echo U('/Student/Ajax/Teacher');?>", //这里指向的就不再是页面了，而是一个方法。
                data: {'dep': val},
                type: "POST",
                dataType: "JSON",
                success: function (data) {
                    //alert(data[0].code);//这里要用索引，使用eq读取不出来数据。
                    var str = '<option value="">请选择指导老师</option>';
                    //alert(data);//alert(data[1].dep_id)
                    $(data).each(function (i) {
                        //alert(data[i].dep_name);
                        str += "<option value='" + data[i].d + "'>" + data[i].n + ' [' + data[i].d + ']' + "</option>";
                    });
                    $('#tea').empty();
                    $('#tea').append(str);
                }
            });
        }
        /**
         * 获得学生
         */
        function stu(obj) {
            var val = $("#" + obj).val();
            var text = $("#" + obj).find('option:selected').text();
            $("#teacher").val(text);
            $("#tea_number").val(val);
            var n = new Array();
            n = text.split(" ");
            $('#tea_name').val(n[0]);

        }

    </script>
</html>