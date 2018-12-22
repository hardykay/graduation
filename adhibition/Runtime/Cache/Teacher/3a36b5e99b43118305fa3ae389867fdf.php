<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
<link rel="stylesheet" href="/graduation/static/css/nav.css"> 
<script src="/graduation/static/js/jquery.min.js"></script>
<script src="/graduation/static/js/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="/graduation/static/Redactor/css/style.css" />     
<script type="text/javascript" src="/graduation/static/Redactor/lib/jquery-1.7.min.js"></script>   
<link rel="stylesheet" href="/graduation/static/Redactor/redactor/css/redactor.css" />
<script src="/graduation/static/Redactor/redactor/redactor.js"></script>
<script type="text/javascript">
    $(document).ready(
            function ()
            {
                $('#editor').redactor({
                   // fixed: true,
                    lang: "zh_cn",
                    wym: true,
                    air: true,
                });
            }
    );
</script>
    <title>26-2指导教师评语论文</title>
  
</head>
<body>
<br>
<div class="container" >
     <div class="col-md-1 col-lg-1 col-xs-12"></div>
      <div class="col-md-10 col-lg-10 col-xs-12" >
      <form action="<?php echo U('Finalize/Opinion');?>" method="post" >
          
          <input type="hidden" name="stu_number" value="<?php echo ($li["stu_number"]); ?>">
<!--          <input type="hidden" name="top_id" value="<?php echo ($li["top_id"]); ?>">
          <input type="hidden" name="stu_name" value="<?php echo ($li["sname"]); ?>">
          <input type="hidden" name="top_name" value="<?php echo ($li["name"]); ?>">
          <input type="hidden" name="z_id" value="<?php echo ($li["dep_id"]); ?>">
          <input type="hidden" name="z_name" value="<?php echo ($li["dep_name"]); ?>">
          <input type="hidden" name="b_id" value="<?php echo ($li["dep_class"]); ?>">-->
          <input type="hidden" name="b_name" value="<?php echo ($c["dep_name"]); ?>">
        <table  class="table panel-info" border=""  align="center" cellpadding="5" class="table" cellspacing="0">
            <thead align="center" >
                <tr  align="left">
                    <th colspan="4" >中国石油大学本科生毕业设计（论文）指导教师评语</th>
                </tr>
            </thead>
            <tbody align="center">
                <tr>
                    <td><b>课题名称:</b></td>
                    <td colspan="3"><?php echo ($li["name"]); ?></td>
                </tr>
                <tr >
                    <td><b>学生姓名:</b></td>
                    <td><?php echo ($li["sname"]); ?></td>
                    <td><b>学生学号:</b></td>
                    <td><?php echo ($li["stu_number"]); ?>  </td>
                </tr>
                <tr>
                    <td><b>所在专业:</b></td>
                    <td><?php echo ($li["dep_name"]); ?></td>
                    <td><b>所在班级:</b></td>
                    <td><?php echo ($li["class"]); ?></td>
                </tr>
                <tr >
                    <td><b>评价项目</b></td>
                    <td colspan="2"><b>评价内容</b></td>
                    <td><b>得分</b></td>
                </tr>
                <tr>
                    <td><b>平时表现（百分制）:</b></td>
                    <td colspan="2">学习,工作态度;纪律性;综合运用知识能力</td>
                    <td><input type="number" name="grade" min="0" max="100" required></td>
                </tr>
                <tr >
                    <td><b>毕业论文（百分制）:</b></td>
                    <td colspan="2">论文规范性;论文撰写水平:综合能力;理论与实践结合;创新性</td>
                    <td><input type="number" name="zdgrade" min="0" max="100" required></td>
                </tr>
                <tr align="left">
                    <td colspan="4"><b>评语(特点,改进意见等) <span style="color: red">必填</span></b><br><textarea required id="editor" style="width: 100%;height: 200px;" name="content1"></textarea></td>
                </tr>
               
            </tbody>
            <tfoot >
                <tr>
                    <td colspan="7" align="center">
                        <input type="submit" class="btn btn-success" value="提交">
                        <input type="button" class="btn btn-success" onclick="window.history.go(-2)" value="返回">
                    </td>
                </tr>
            </tfoot>
        </table>
        </form>
    </div>
 </div>
</body>
</html>