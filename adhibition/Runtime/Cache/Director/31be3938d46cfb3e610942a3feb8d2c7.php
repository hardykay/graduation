<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <title>专业毕业设计负责人审核任务书</title>
</head>
<body>
<!--<form action="">
<div class="maofu" >-->
<a href="<?php echo U('RandomAllotReview/Index');?>" style="display: block;text-align: center;font-weight: 900;margin-bottom: 30px;margin-top: 20px;"  target="right" >一键分配评阅老师</a>
	
	<table class="table panel-info bshadow" >
		<thead>
			<tr class="success">
                            <td>编号</td>
				<th>专业名称</th>
				<th>专业总人数</th>
				<th>已分配总人数</th>
				<th>未分配总人数</th>
				<th>分配评阅老师</th>
<!--				<th>按教师分配</th>-->
			</tr>
		</thead>
		<tbody>	
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($i); ?></td>
				<td><?php echo ($vo["name"]); ?></td>
                                <td><?php echo ($vo["zz"]); ?></td>
				<td><a href="/graduation/Director/Review/ReviewView/dep/<?php echo ($vo["dep"]); ?>" title="点击进入查看已分配的学生"><?php echo ($vo["fz"]); ?></a></td>
				<td><?php echo ($vo["wei"]); ?></td>
				<td><a href="/graduation/Director/Review/Teacher/dep/<?php echo ($vo["dep"]); ?>">进入</a></td>
<!--				<td><a href="/graduation/Director/Review/Affirm/dep/<?php echo ($vo["dep"]); ?>">进入</a></td>-->
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
                
	</table>
<!--</div>
</form>-->
</body>
</html>