<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
<link rel="stylesheet" href="/graduation/static/css/nav.css"> 
<script src="/graduation/static/js/jquery.min.js"></script>
<script src="/graduation/static/js/bootstrap.min.js"></script> 
    <title>26-2指导教师评语论文</title>
  
</head>
<body>
<br>
<div class="container" >
     <div class="col-md-1 col-lg-1 col-xs-12"></div>
      <div class="col-md-10 col-lg-10 col-xs-12" >
      <form action="<?php echo U('Review/Opinion');?>" method="post" >
          <input type="hidden" name="stu_name" value="<?php echo ($li["stu_name"]); ?>">
          <input type="hidden" name="stu_number" value="<?php echo ($li["stu_number"]); ?>">
        <table  class="table panel-info" border=""  align="center" cellpadding="5" class="table" cellspacing="0">
            <thead align="center" >
                <tr  align="left">
                    <th colspan="4" >中国石油大学本科生毕业设计（论文）指导教师评语</th>
                </tr>
            </thead>
            <tbody align="center">
                <tr>
                    <td><b>课题名称:</b></td>
                    <input type="hidden" name="top_name" value="<?php echo ($li["name"]); ?>">
                    <td colspan="3"><?php echo ($li["name"]); ?></td>
                </tr>
                <tr >
                    <td><b>学生姓名:</b></td>
                    <td><?php echo ($li["stu_name"]); ?></td>
                    <td><b>学生学号:</b></td>
                    <td><?php echo ($li["stu_number"]); ?>  </td>
                </tr>
                <tr>
                    <td><b>所在专业:</b></td>
                    <td><?php echo ($li["specialty"]); ?><input type="hidden" name="z_name" value="<?php echo ($li["specialty"]); ?>"></td>
                    <td><b>所在班级:</b></td>
                    <td><?php echo ($li["class"]); ?><input type="hidden" name="b_name" value="<?php echo ($li["class"]); ?>"></td>
                </tr>
                <tr >
                    <td><b>评价项目</b></td>
                    <td colspan="2"><b>评价内容</b></td>
                    <td><b>得分</b></td>
                </tr>
                <tr >
                    <td><b>毕业论文（百分制）:</b></td>
                    <td colspan="2">论文规范性;论文撰写水平:综合能力;理论与实践结合;创新性</td>
                    <td><input type="number" name="pingyuegrade" min="0" max="100" value="<?php echo ($li["pingyuegrade"]); ?>" required></td>
                </tr>
                <tr align="left">
                    <td colspan="4"><b>评语(特点,改进意见等):</b><br><textarea required style="width: 100%;height: 200px;" name="content2"><?php echo ($li["content2"]); ?></textarea></td>
                </tr>
               
            </tbody>
            <tfoot >
                <tr>
                    <td colspan="7" align="center">
                        <input type="submit" class="btn btn-success" value="提交">
                        <a class="btn btn-success" style="color:#fff" href="/graduation/Teacher/Review/Index.html">返回 </a>
                    </td>
                </tr>
            </tfoot>
        </table>
        </form>
    </div>
 </div>
</body>
</html>