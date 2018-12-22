<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  

    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/ApplyFor.css"> 
        
        <link rel="stylesheet" type="text/css" href="/graduation/static/Redactor/css/style.css" /> 	
	<script type="text/javascript" src="/graduation/static/Redactor/lib/jquery-1.7.min.js"></script>	
	<link rel="stylesheet" href="/graduation/static/Redactor/redactor/css/redactor.css" />
	<script src="/graduation/static/Redactor/redactor/redactor.js"></script>
	
	<script type="text/javascript">
	$(document).ready(
		function()
		{
			 $('#redactor').redactor({
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
		}
	);
	</script>
        <title>大学生毕业设计课题申请表</title>  
    </head>  
    <body>
        <h2>大学生毕业设计课题申请表</h1>  

        <form action="<?php echo U('Team/Post1');?>" method="post" enctype="multipart/form-data" >
            <div class="container">
                <table  class="table table-bordered" align="center" >
                    <tr>  
                        <td width="140" class="col-sm-2">课题名称</td>  
                        <td width="470" colspan="6"><?php echo ($data["name"]); ?></td>  
                    </tr> 
                    <tr>  
                        <td height="40">题目类型</td>  
                        <td class="bcolor"  colspan="6"> <?php echo ($data["genre"]); ?>
                        </td>
                    </tr>
                    <tr>  
                        <td height="40">结合科研</td>  
                        <td class="bcolor"  colspan="6"> <?php echo ($data["seientific"]); ?>
                        </td>
                    </tr> 
                    <tr>  
                        <td height="40">结合生产实践和社会实际</td>  
                        <td class="bcolor"  colspan="6"> <?php echo ($data["practice"]); ?>
                        </td>
                    </tr>
                    <tr>  
                        <td height="65" >主要研究内容及要求(分工)</td>
                        <td width="470" colspan="6"><?php echo (htmlspecialchars_decode($data["content"])); ?></td> 
                    </tr>  
                    <tr>  
                        <td >课题模式</td>
                        <td class="bcolor"  colspan="6" > 
                            团队课题
                        </td>
                    </tr>
                    <tr>  
                        <td height="65" >学生</td>
                        <td width="470" colspan="6">
                    <?php if(is_array($stu)): $i = 0; $__LIST__ = $stu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="margin-top: 10px;">（<?php echo ($i); ?>）学院：<?php echo ($vo["college"]); ?>; 专业：<?php echo ($vo["specialty"]); ?>; 班级：<?php echo ($vo["class"]); ?>; 姓名：<?php echo ($vo["name"]); ?>; 学号：<?php echo ($vo["stu_number"]); ?><br> </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </td> 
                    </tr> 
                    <tr>  
                        <td>附件</td>  
                        <td colspan="6" >
                    <?php if(empty($data["url"])): ?>无<?php else: ?><a href="/graduation/<?php echo ($data["url"]); ?>">附件下载</a><?php endif; ?>
                    </td> 
                    </tr>  

                    <tr>  
                        <td height="40">审核结果</td>  
                        <td class="bcolor"  colspan="6">
                            <select name="audit" class="input-lg">
                                <option value="">请选择</option>
                                <option value="1" <?php if(($data["audit"]) == "1"): ?>selected<?php endif; ?>>同意</option>
                                <option value="2" <?php if(($data["audit"]) == "2"): ?>selected<?php endif; ?>>退回修改</option>
                            </select>
                        </td>
                    </tr>
                    <tr>  
                        <td height="65" >教学院长审核的意见</td>
                        <td width="470" colspan="6"><textarea class="input2" id="redactor" name="advice"><?php echo (htmlspecialchars_decode($data["advice"])); ?></textarea></td> 
                    </tr> 
                </table>
            </div>
            <br>
            <div style="width: 100px;margin: 0 auto;">
                <input value="<?php echo ($data["top_id"]); ?>" type="hidden" name="top_id">
                <button type="submit" class="btn btn-primary" >提交</button>
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
                    url: '/graduation/Teacher/Ajax/' + bian, //这里指向的就不再是页面了，而是一个方法。
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
                var val = jQuery("#" + obj).val();
                $.ajax({
                    url: '/graduation/Teacher/Ajax/Stu', //这里指向的就不再是页面了，而是一个方法。
                    data: {'dep': val},
                    type: "POST",
                    dataType: "JSON",
                    success: function (data) {
                        var str = '';
                        $(data).each(function (i) {
                            //alert(data[i].dep_name);
                            str += '  <div><span  class="glyphicon glyphicon-plus-sign opti"><span class="name1">' + data[i].n + '[' + data[i].d + ']' + '</span><span class="hao none">' + data[i].d + '</span></span></div>';

                        });
                        $('#weixuan').empty();
                        $('#weixuan').append(str);
                    }
                });
            }

        </script>
</body>  
</html>