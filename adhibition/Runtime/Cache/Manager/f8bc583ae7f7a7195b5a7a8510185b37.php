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
				<th>专业总人数</th>
				<th>已提交人数</th>
				<th>未提交人数</th>				
				<th>优秀</th>
				<th>良好</th>
				<th>中等</th>
				<th>及格</th>
                                <th>不及格</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["dep_name"]); ?></td>
				<td><?php echo ($vo["renshu"]); ?></td>
				<td><?php echo ($vo["tijiao"]); ?></td>
				<td><?php echo ($vo["kong"]); ?></td>
				<td><?php echo ($vo["you"]); ?></td>
				<td><?php echo ($vo["lang"]); ?></td>
				<td><?php echo ($vo["zhong"]); ?></td>	
				<td><?php echo ($vo["jige"]); ?></td>
				<td><?php echo ($vo["bujige"]); ?></td>
				<td><a href="/graduation/Manager/Inspection/ClassGrade/dep/<?php echo ($vo["dep_id"]); ?>">进入</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                
		</tbody>
	</table>

<!--</div>-->
</body>
</html>