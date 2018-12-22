<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系主任-查看老师信息带人数</title>
	<link rel="stylesheet" href="../">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script type="text/javascript" src="/graduation/static/js/jquery.min.js"> </script>
        <script type="text/javascript" src="/graduation/static/js/bootstrap.min.js"> </script>

</head>
<body>

	<table class="table panel-info bshadow" >
		<thead>
			<tr class="success">
				<th>序号</th>
				<th>教师姓名</th>
				<th>所带课题人数</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["tea_name"]); ?></td>
				<td><?php echo ($vo["yixaun"]); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
<!--</div>-->
</body>
</html>