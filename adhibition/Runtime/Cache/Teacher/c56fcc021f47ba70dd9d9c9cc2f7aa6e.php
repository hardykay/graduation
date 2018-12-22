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
<!--<br>
<form action="">
<div class="maofu" >-->
	<table class="table panel-info" >
            <caption style="text-align: center"><a href="/graduation/Teacher/Alteration/LookList"><b>查看已审核的学生</b></a></caption>
		<thead>
			<tr class="success">
				<th>学号</th>
				<th>姓名</th>
				<th>学院</th>
				<th>专业</th>
				<th>指导老师审核</th>
				<th>系主任审核</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($vo["stu_number"]); ?></td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td><?php echo ($vo["college_name"]); ?></td>
                            <td><?php echo ($vo["major_name"]); ?></td>
                            <td>
                                 <?php switch($vo["adviser_audit"]): case "0": ?><b class="huise">未审核</b><?php break;?>
                                    <?php case "1": ?><b class="langse">通过</b><?php break;?>
                                    <?php case "2": ?><b class="red">退回</b><?php break; endswitch;?>  
                            </td>
                            <td>
                                 <?php switch($vo["college_audit"]): case "0": ?><b class="huise">未审核</b><?php break;?>
                                    <?php case "1": ?><b class="langse">通过</b><?php break;?>
                                    <?php case "2": ?><b class="red">退回</b><?php break; endswitch;?>  
                            </td>
                            <td><a href="/graduation/Teacher/Alteration/Check/stu/<?php echo ($vo["stu_number"]); ?>">立即审核</a></td>
                       
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			
		</tbody>
	</table><!--
<!--</div>
</form>-->
</body>
</html>