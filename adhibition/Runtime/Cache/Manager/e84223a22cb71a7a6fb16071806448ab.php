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
                                <th>班级</th>
				<th>学生人数</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($zy); ?></td>
				<td><?php echo ($vo["dep_name"]); ?></td>
                                <td><?php echo ($vo["xs"]); ?></td>
				<td><a href="/graduation/Manager/OutTopic/claExcel/dep/<?php echo ($vo["dep_id"]); ?>/spe/<?php echo (base64_encode($zy)); ?>/name/<?php echo (base64_encode($vo["dep_name"])); ?>">导出</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
                <tfoot>
			<tr class="active">
				<td colspan="9">
					<div class="left">
						<i class="i"></i>
						<input type="button" value="返回" class="btn btn-success" onclick="window.history.go(-1)">
					</div>
				</td>
			</tr>
		</tfoot>
	</table>

<!--</div>-->
</body>
</html>