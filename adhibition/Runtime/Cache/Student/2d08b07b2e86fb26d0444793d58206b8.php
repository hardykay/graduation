<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <title>时间安排表</title>
</head>
<body>
<!--<br>
<form action="">
<div class="maofu" >-->
	<table class="table panel-info" >
            <caption style="text-align: center">时间安排表</caption>
		<thead>
			<tr class="success">
				<th>专业</th>
				<th>申报课题开始时间</th>
				<th>申报课题结束时间</th>
				<th>学生选题开始时间</th>
				<th>学生选题结束时间</th>
				<th>老师选学生开始时间</th>
                                <th>老师选学生结束时间</th>
				<th>论文提交截至时间</th>
			</tr>
		</thead>
		<tbody>
			<tr>
                            <td><?php echo ($vo["dep_name"]); ?></td>
                            <td><?php echo ($vo["topic_strat"]); ?></td>
                            <td><?php echo ($vo["topic_close"]); ?></td>
                            <td><?php echo ($vo["choice_strat"]); ?></td>
                            <td><?php echo ($vo["choice_close"]); ?></td>
                            <td><?php echo ($vo["teacher_strat"]); ?></td>
                            <td><?php echo ($vo["teacher_close"]); ?></td>
                            <td><?php echo ($vo["paper_close"]); ?></td>
                        </tr>
			
		</tbody>
                <tfoot>
                    <tr><td colspan="8">请各位同学留意各个时间段安排，切莫错过。</td></tr>
                </tfoot>
	</table><!--
<!--</div>
</form>-->
</body>
</html>