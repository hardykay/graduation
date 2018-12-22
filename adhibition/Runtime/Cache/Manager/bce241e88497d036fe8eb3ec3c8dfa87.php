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
                    <th>选题学生</th>
                    <th>指导老师</th>
                    <th>评阅老师</th>
                    <th>课题名称</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($i); ?></td>
                    <td><?php echo ($vo["stu_name"]); ?>【<?php echo ($vo["stu_number"]); ?>】</td>
                    <td><?php echo ($vo["tea_name"]); ?>【<?php echo ($vo["tea_number"]); ?>】</td>
                    <td><?php echo ($vo["review_tea_name"]); ?>【<?php echo ($vo["review_tea_number"]); ?>】</td>
                    <td class="twidth">
                        <div class="ttext" ><?php echo ($vo["name"]); ?></div>
                    </td>
                    <td><a href="/graduation/Manager/Review/DeleteReview/stu/<?php echo ($vo["stu_number"]); ?>" onclick="return confirm('确定移除“<?php echo ($vo["stu_name"]); ?>”吗？')">移除</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
        <tfoot><tr><td colspan="6"><?php echo ($page); ?></td></tr></tfoot>
    </table>
</body>
</html>