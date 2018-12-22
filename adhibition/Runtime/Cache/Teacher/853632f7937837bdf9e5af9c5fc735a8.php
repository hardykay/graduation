<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script src="/graduation/static/js/jquery.min.js"></script>
        <script src="/graduation/static/js/bootstrap.min.js"></script> 
        <title>教师选择学生</title>
    </head>
    <body>
        <table class="table panel-info" >
            <thead>
                <tr class="success">
                    <th>编号</th>
                    <th>专业</th>
                    <th>学生姓名</th>
                    <th>学号</th>
                    <th>联系方式</th>
                    <th>邮箱</th>
                    <th>qq</th>
                    <th>删除</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($i); ?></td>
                    <td><?php echo ($vo["dep_name"]); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["stu_number"]); ?></td>
                    <td><?php echo ($vo["phone"]); ?></td>
                    <td><?php echo ($vo["email"]); ?></td>
                    <td><?php echo ($vo["qq"]); ?></td>
                    <td><a href="/graduation/Teacher/MagerTop/D/stu/<?php echo ($vo["stu_number"]); ?>/top/<?php echo ($top); ?>" class="btn btn-ms btn-danger" style="color: #fff;font-size: 900" onclick="return confirm('确定删除该学生吗？')">删除</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
</body>
</html>