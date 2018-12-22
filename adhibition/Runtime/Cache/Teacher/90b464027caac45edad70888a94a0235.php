<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  

    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/public.style.css"> 
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

        <form action="<?php echo U('Topic/DapplyFor');?>" method="post" enctype="multipart/form-data" >
            <table   border="1" class="table table-bordered">  
                <caption><h2 style="text-align:center">大学生毕业设计课题申请表</h1></caption>
                <tr>  
                    <td style="width: 100px;">课题名称</td>  
                    <td ><input style="width: 100%;height: 35px;border:0px;outline: 0;font-size: 20px" name="name" required placeholder="请输入课题名称" value="<?php echo ($top["name"]); ?>"></td>  
                </tr> 
                <tr>  
                    <td>题目类型</td>  
                    <td class="bcolor"  colspan="6"> 
                        <select name="genre" required class="xuanze">
                            <option value="" >请选择</option>
                            <option value="论文" >论文</option>
                            <option value="设计" >设计</option>
                        </select>
                    </td>
                </tr>
                <tr>  
                    <td>结合科研</td>  
                    <td class="bcolor"  colspan="6"> 
                        <select name="seientific" required  class="xuanze">
                            <option value="" >请选择</option>
                            <option value="是" >是</option>
                            <option value="否" >否</option>
                        </select>
                    </td>
                </tr> 
                <tr>  
                    <td>结合生产实践和社会实际</td>  
                    <td class="bcolor"  colspan="6"> 
                        <select name="practice" required  class="xuanze">
                            <option value="" >请选择</option>
                            <option value="是" >是</option>
                            <option value="否" >否</option>
                        </select>
                    </td>
                </tr>
                <tr>  
                    <td>主要研究内容及要求（多人合作题目应有明确分工）</td>
                    <td ><textarea name="content" style="width:100%;height: 400px;" id="redactor" required><?php echo (htmlspecialchars_decode($top["content"])); ?></textarea></td> 
                </tr>  
                <tr>  
                    <td>课题选择模式</td>
                    <td>
                        指定学生(<span class="red">只能选择一个学生，并且，指定选课题、团队选课题、外出毕设等课题的学生不列入选择。</span>)
                    </td>
                </tr>
                <tr> 
                    <td>请选择学生</td>
                    <td>
                        选择专业：<select name="hao" id="hao" onchange="r('hao')">
                            <option value="">请选择专业</option>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["dep_id"]); ?>"><?php echo ($vo["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>&nbsp;&nbsp;
                        选择班级：<select id="banji" onchange="stu('banji')">
                            <option value="">请选择班级</option>
                        </select>&nbsp;&nbsp;
                        选择学生：<select name="nunber" id="student">
                            <option value="">请选择学生</option>
                        </select>
                    </td>
                </tr>
                <script type="text/javascript">
                    /**
                     * 
                     * @param {type} obj
                     * @returns {undefined}获得班级
                     */
                    function r(obj) {
                        var val = jQuery("#" + obj).val();
                        $.ajax({
                            url: "<?php echo U('/Teacher/Ajax/ajaxchuli');?>", //这里指向的就不再是页面了，而是一个方法。
                            data: {'dep': val},
                            type: "POST",
                            dataType: "JSON",
                            success: function (data) {
                                //alert(data[0].code);//这里要用索引，使用eq读取不出来数据。
                                var str = '<option value="">请选择班级</option>';
                                //alert(data);//alert(data[1].dep_id)
                                $(data).each(function (i) {
                                    //alert(data[i].dep_name);
                                    str += "<option value='" + data[i].d + "'>" + data[i].n + "</option>";
                                });
                                $('#banji').empty();
                                $('#banji').append(str);
                            }
                        });
                    }
                    /**
                     * 获得学生
                     */
                    function stu(obj) {
                        var val = jQuery("#" + obj).val();
                        //alert(val)
                        $.ajax({
                            url: "<?php echo U('/Teacher/Ajax/mStu');?>", //这里指向的就不再是页面了，而是一个方法。
                            data: {'dep': val},
                            type: "POST",
                            dataType: "JSON",
                            success: function (data) {
                                //alert(data[0].code);//这里要用索引，使用eq读取不出来数据。
                                var str = '<option value="">请选择学生</option>';
                                //alert(data);//alert(data[1].dep_id)
                                $(data).each(function (i) {
                                    //alert(data[i].dep_name);
                                    str += "<option value='" + data[i].d + "'>" + data[i].n + "(" + data[i].d + ")</option>";
                                });
                                $('#student').empty();
                                $('#student').append(str);
                            }
                        });
                    }

                </script>
                <tr>  
                    <td height="60">附件</td>  
                    <td colspan="6" >
                        <div style="width: 200px;margin: 0 auto;">
                            <input type="file" name="file">
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

    </body>  
</html>