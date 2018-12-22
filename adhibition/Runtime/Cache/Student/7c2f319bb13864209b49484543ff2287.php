<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <title>学生查看自己的课题</title>
</head>
<body>
<?php if(empty($vo)): ?><b style="font-size: 70px;">不好意思，没有！</b>
    <?php else: ?>
<div class="container" >
    <fieldset>
        <legend>相关提示</legend>
        <div style="margin: 0 auto;width: 80%">
            你选的课题已近发布，赶紧联系导师进行毕业设计吧！下面是老师的QQ/微信及手机号，赶紧找指导老师吧！<br><br>
            需要更改课题或者申请外出毕业设计的同学，请<b>及时</b>联系<b>导师</b>及<b>系主任</b>。
        </div>
    </fieldset>
</div>
	<table class="table panel-info" >
		<thead>
			<tr class="success">
				<th>课题名称</th>
				<th>指导老师</th>
				<th>联系方式</th>
                                <th>邮箱</th>
				<th>QQ/微信</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a href="/graduation/Home/Topic/Index/top/<?php echo ($vo["top_id"]); ?>"><?php echo ($vo["name"]); ?></a></td>
				<td><?php echo ($vo["tea_name"]); ?></td>
				<td><?php echo ($vo["phone"]); ?></td>
				<td><?php echo ($vo["email"]); ?></td>
				<td><?php echo ($vo["qq"]); ?></td>
			</tr>
		</tbody>
	</table><?php endif; ?> 
</body>
</html>