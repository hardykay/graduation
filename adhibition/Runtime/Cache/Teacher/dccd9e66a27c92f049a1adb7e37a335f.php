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
                    <th>选题学生</th>
                    <th>课题名称</th>
                    <th>课题类型</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($i); ?></td>
                    <td><span><?php echo ($vo["sname"]); ?> <?php echo ($vo["stu_number"]); ?></span></td>
                    <td class="twidth">
                        <div class="ttext" ><?php echo ($vo["name"]); ?></div>
                    </td>
                    <td><?php echo ($vo["genre"]); ?></td>
                    <td>
                         <?php switch($vo["audit"]): case "1": ?><b><a href="/graduation/Teacher/Assignment/Assignment/top/<?php echo ($vo["top_id"]); ?>/stu/<?php echo ($vo["stu_number"]); ?>/dep/<?php echo ($vo["dep_major"]); ?>">下达任务书</a></b><?php break;?>
                            <?php case "2": ?><b>
                                    <a style="margin-right: 10px;" href="/graduation/Teacher/Assignment/lookcheck/stu/<?php echo ($vo["stu_number"]); ?>">修改</a>
                                    <a href="/graduation/Teacher/Assignment/Look/top/<?php echo ($vo["top_id"]); ?>/stu/<?php echo ($vo["stu_number"]); ?>">查看</a>
                                </b><?php break;?>
                            <?php default: ?>请联系开发人员<?php endswitch;?>
                    </td>

                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
</body>
</html>