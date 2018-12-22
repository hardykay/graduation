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
                    <th>课题名称</th>
                    <th>课题类型</th>
                    <th>选题学生</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($i); ?></td>
                    <td class="twidth">
                        <div class="ttext" ><?php echo ($vo["name"]); ?></div>
                    </td>
                    <td><?php echo ($vo["genre"]); ?></td>
                    <td><a href="/graduation/Home/Student/Index/stu/<?php echo ($vo["stu_number"]); ?>"><?php echo ($vo["sanme"]); ?></a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
</body>
</html>