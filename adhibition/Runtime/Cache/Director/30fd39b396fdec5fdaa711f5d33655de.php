<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>教师下达任务书</title>
	<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
	<link rel="stylesheet" href="/graduation/static/css/nav.css">
	<script src="/graduation/static/js/jquery.min.js"></script>
	<script src="/graduation/static/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table panel-info" >
	<thead>
		<tr class="success">
			<th>编号</th>
			<th>专业名称</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>	
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			
			<td><?php echo ($i); ?></td>
			<td><?php echo ($vo["dep_name"]); ?></td>
                        <td><a href="/graduation/Director/Index/Tsetting/dep_id/<?php echo ($vo["dep_id"]); ?>">立即设置</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table>

</body>
</html>