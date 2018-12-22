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
    <a href="<?php echo U('Gonggao/Add');?>"  class="a-title-style">发布公告</a>
<!--<div class="maofu" >-->
	<table class="table panel-info bshadow" >
		<thead>
			<tr class="success">
				<th>序号</th>
				<th>标题</th>
				<th>发布时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["title"]); ?></td>
				<td><?php echo ($vo["publish"]); ?></td>
				<td><a href="/graduation/Manager/Gonggao/Del/id/<?php echo ($vo["id"]); ?>">删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

<!--</div>-->
</body>
</html>