<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
	<table class="table panel-info bshadow" >
		<thead>
			<tr class="success">
				<th>序号</th>
				<th>专业名称</th>
				<th>已发布课题</th>
				<th>未发布课题</th>
				<th>进入发布</th>
                                <th>批量操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["dep_name"]); ?></td>
				<td><?php echo ($vo["yi"]); ?></td>
				<td class="red"><?php echo ($vo["wei"]); ?></td>
				<td><a href="/graduation/Dean/Topic/Affirm2/dep/<?php echo ($vo["dep_id"]); ?>">进入</a></td>
                                <td><a href="/graduation/Dean/Topic/yijian/dep_id/<?php echo ($vo["dep_id"]); ?>">一键发布</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

<!--</div>-->
</body>
</html>