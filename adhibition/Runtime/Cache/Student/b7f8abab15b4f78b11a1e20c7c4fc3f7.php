<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>题目变更</title>
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="/graduation/static/Redactor/css/style.css" /> 	
	<script type="text/javascript" src="/graduation/static/Redactor/lib/jquery-1.7.min.js"></script>	
	<link rel="stylesheet" href="/graduation/static/Redactor/redactor/css/redactor.css" />
	<script src="/graduation/static/Redactor/redactor/redactor.js"></script>
	
	<script type="text/javascript">
	$(document).ready(
		function()
		{
			$('#redactor_content').redactor({
                            lang: "zh_cn",
                        });
                        $('#redactor').redactor({
                            lang: "zh_cn",
                        });
		}
	);
	</script>
	<style>
		td{
			width: 200px;
			border:1px solid #ddd;
		}
		td:first-child{
			width: 100px;
			text-align: center;
		}
		input{
			width: 100%;
			height: 100%;
			outline: 0;
			border:0;
                        font-size: 20px;
		}
		textarea{
			width: 99%;
			height: 300px;
			outline: 0;
			border:0px;
                         font-size: 15px;
		}
                
	</style>
</head>
<body>
    <form action="/graduation/Student/Alteration/Add" method="post">
<table class="table">
    <caption><h3 style="text-align:center">毕业设计题目变更审批表</h3></caption>
        <tbody >
		<tr  style="text-align: center;">
			<td>学生姓名</td>
			<td><?php echo ($vo["stu_name"]); ?></td>
			<td>学号</td>
			<td><?php echo ($vo["stu_number"]); ?></td>
		</tr>
		<tr style="text-align: center;">
			<td>学院</td>
			<td><?php echo ($vo["college"]); ?></td>
			<td>专业</td>
			<td><?php echo ($vo["specialty"]); ?></td>
		</tr>
		<tr  style="text-align: center;">
			<td>变更前题目</td>
			<td colspan="3"><?php echo ($vo["name"]); ?></td>
		</tr>
		<tr>
			<td>变更后题目</td>
                        <td colspan="3"><input type="text" name="new_name" required placeholder="请输入变更后的课题名称" ></td>
		</tr>
		<tr>
			<td><br><br><br><br><br><br><br><br>题目变更原因</td>
                        <td colspan="3"><textarea id="redactor_content" name="cause" required></textarea></td>
		</tr>
		<tr>
			<td><br><br><br><br><br><br>新题目内容、进度计划及完成任务的保障措施</td>
                        <td colspan="3"><textarea id="redactor" name="plan" required></textarea></td>
		</tr>
                <tr>
                    <td colspan="4"><button type="submit" style="width:100px;height: 40px;background-color: #89e4cf;border:0;color:#fff;font-size: 20px;font-weight: 700;">提交</button> </td>
		</tr>
		<div style="display: none;">
			<input type="heddin" name="college_name" value="<?php echo ($vo["college"]); ?>"><!-- 学院 -->
			<input type="heddin" name="major_name" value="<?php echo ($vo["specialty"]); ?>"><!-- 专业 -->
			<input type="heddin" name="top_id" value="<?php echo ($vo["top_id"]); ?>"><!-- 课题 -->
			<input type="heddin" name="top_name"  value="<?php echo ($vo["name"]); ?>"><!-- 课题名称 -->
		</div>
	</tbody>
</table>
</form>
</body>
</html>