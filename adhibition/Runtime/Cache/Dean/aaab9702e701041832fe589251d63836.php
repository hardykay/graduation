<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>教学院长-课题发布</title>
	<link rel="stylesheet" href="../">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script type="text/javascript" src="/graduation/static/js/jquery.min.js"> </script>
</head>
<body>
<!--<div class="maofu" >-->
<table class="table panel-info bshadow" style="width: 700px;margin: 0 auto" >
		<tbody>
			<tr>
                            <td><b>学院教师总数</b></td>
				<td><?php echo ($top["teacher"]); ?>人</td>
			</tr>
			<tr>
                            <td><b>课题总数</b></td>
				<td><?php echo ($top["topic"]); ?>个</td>
			</tr>
			<tr>
                            <td><b>课题通过审核的总数</b></td>
				<td><?php echo ($top["audit"]); ?>个</td>
			</tr>
			<tr>
                            <td><b>学院总学生数</b></td>
                            <td><?php echo ($top["student"]); ?>人</td>
			</tr>
                        <tr>
                            <td><b>学院已有课题学生的总数</b></td>
                            <td><?php echo ($top["stuTopic"]); ?>人</td>
			</tr>
                <?php if(is_array($dep)): $i = 0; $__LIST__ = $dep;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><b><?php echo ($vo["dep_name"]); ?></b></td>
				<td><b>学生总数：</b><?php echo ($vo["student"]); ?>人；<b>已选课题：</b><?php echo ($vo["notset"]); ?>人；<b>未选：</b><?php echo ($vo['student']-$vo['notset']); ?>人；</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
                            <td><b>操作</b></td>
                            
                            <td><a href="/graduation/Dean/Topic/Specialty.html">进入发布双选结果</a></td>
<!--                            <td><a href="/graduation/Dean/Topic/Two.html">进入发布双选结果</a></td>-->
			</tr>
		</tbody>
	</table>

<!--</div>-->
</body>
</html>