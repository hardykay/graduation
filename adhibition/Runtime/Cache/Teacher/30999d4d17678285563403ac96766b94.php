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

        <form action="<?php echo U('MagerTop/Update');?>" method="post" enctype="multipart/form-data" >
            <table   border="1" class="table table-bordered">  
                <caption><h2 style="text-align:center">大学生毕业设计课题申请表</h1></caption>
                <input type="hidden"  value="<?php echo ($top["top_id"]); ?>" name="top_id"/>
                <tr>  
                    <td style="width: 100px;">课题名称</td>  
                    <td ><input style="width: 100%;height: 35px;border:0px;outline: 0;font-size: 20px" name="name" required placeholder="请输入课题名称" value="<?php echo ($top["name"]); ?>"></td>  
                </tr> 
                <tr>  
                    <td>题目类型</td>  
                    <td class="bcolor"  colspan="6"> 
                        <select name="genre" required class="xuanze">
                            <?php if(($top["genre"]) == "论文"): ?><option value="论文" selected = "selected">论文</option>
                                <option value="设计">设计</option>
                            <?php else: ?>
                                <option value="论文">论文</option>
                                <option value="设计" selected = "selected">设计</option><?php endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>  
                    <td>结合科研</td>  
                    <td class="bcolor"  colspan="6"> 
                        <select name="seientific" required  class="xuanze">
                            <?php if(($top["seientific"]) == "是"): ?><option value="是" selected = "selected">是</option>
                                <option value="否">否</option>
                            <?php else: ?>
                                <option value="是">是</option>
                                <option value="否" selected = "selected">否</option><?php endif; ?>
                        </select>
                    </td>
                </tr> 
                <tr>  
                    <td>结合生产实践和社会实际</td>  
                    <td class="bcolor"  colspan="6"> 
                        <select name="practice" required  class="xuanze">
                             <?php if(($top["practice"]) == "是"): ?><option  value="是" selected = "selected">是</option>
                                <option value="否">否</option>
                            <?php else: ?>
                                <option value="是">是</option>
                                <option value="否" selected = "selected">否</option><?php endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>预选人数</td>
                    <td><input name="youxiao" type="number" style="width:100px;text-align: center" max="100" min="1"  value="<?php echo ($top["youxiao"]); ?>" ></td>
                </tr>
                <tr>  
                    <td><BR><BR><BR><BR><BR>主要研究内容及要求（多人合作题目应有明确分工）</td>
                    <td ><textarea name="content" style="width:100%;height: 400px;" id="redactor" required><?php echo (htmlspecialchars_decode($top["content"])); ?></textarea></td> 
                </tr>   
                <tr><td>附件</td><td><?php if(empty($top["url"])): ?>无<?php else: ?><a style="float:left" href="/graduation/Home/Index/download/url/<?php echo (base64_encode($top["url"])); ?>">附件下载</a><?php endif; ?><input name="file" type="file" style="float:right"></td></tr>
            </table>
            <br>
            <div style="width: 300px;margin: 0 auto;">
                <button type="submit" class="btn btn-success" >提交</button>
            </div>
            <br><br><br>
        </form>
        <div style="width:610px;margin:0 auto;">  
            <p style="float: left;">注：1、以上内容要求申请人填写完整</p>  
            <p style="text-indent:2em;float: left;">2、本表解释权归学校所有</p>  
        </div>  

    </body>  
</html>