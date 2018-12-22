<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
	<title>专业毕业设计负责添加答辩小组</title>
	
</head>
<body>
	<table class="table panel-info">
		<thead>
			<tr class="success">
				<th>编号</th>
				<th>答辩组名称</th>
				<th>答辩地点</th>
				<th>答辩时间</th>
				<th>答辩学生总人数</th>
                                <th>已答辩</th>
                                <th>未答辩</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["name"]); ?></td>
				<td><?php echo ($vo["place"]); ?></td>
				<td><?php echo ($vo["dtime"]); ?></td>
				<td><?php echo ($vo["coun"]); ?></td>
				<td><?php echo ($vo["yi"]); ?></td>
				<td><?php echo ($vo["wei"]); ?></td>
				<td><a href="/graduation/Teacher/Score/Score/id/<?php echo ($vo["id"]); ?>">答辩</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

		
	</table>

</body>
</html>