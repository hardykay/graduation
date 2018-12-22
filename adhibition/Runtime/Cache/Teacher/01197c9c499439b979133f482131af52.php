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
                    <th>序号</th>
                    <th>学生</th>
                    <th>平时成绩</th>
                    <th>论文成绩</th>
                    <th>评阅成绩</th>
                    <th>答辩成绩</th>
                    <th>总成绩</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($i); ?></td>
                    <td><?php echo ($vo["name"]); ?>【<?php echo ($vo["stu_number"]); ?>】</td>
                    <td><?php echo ($vo["grade"]); ?></td>
                    <td><?php echo ($vo["zdgrade"]); ?></td>
                    <td><?php echo ($vo["pingyuegrade"]); ?></td>
                    <td><?php echo ($vo["dabiangrade"]); ?></td>
                    <td><?php echo ($vo["score"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
</body>
</html>