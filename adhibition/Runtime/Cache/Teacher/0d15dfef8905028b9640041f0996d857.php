<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
<link rel="stylesheet" href="/graduation/static/css/nav.css"> 
<script src="/graduation/static/js/jquery.min.js"></script>
<script src="/graduation/static/js/bootstrap.min.js"></script> 
    
	<title>指导教师审核开题报告和外文翻译</title>
	
</head>
<body>
<br>

	<table class="table panel-info" >
		<thead>
			<tr class="success">
				<th>编号</th>
				<th>学生</th>
				<th>所属专业</th>
				<th>课题名称</th>
				<th>操作</th>
				<th>状态</th>
			</tr>
		</thead>
		<tbody>	
                 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["sname"]); ?> [<?php echo ($vo["stu_number"]); ?>]</td>
				<td><?php echo ($vo["dep_name"]); ?></td>   
				<td class="twidth">
					<div class="ttext" >
	    				<a href="/graduation/Home/Topic/Index/top/<?php echo ($vo["top_id"]); ?>" title="<?php echo ($vo["sname"]); ?>">
	    					<?php echo ($vo["name"]); ?>
	    				</a>
					</div>
				</td>
                                <?php switch($vo["audit"]): case "0": ?><td><a href="/graduation/Teacher/Report/Check/stu/<?php echo ($vo["stu_number"]); ?>/name/<?php echo (base64_encode($vo["sname"])); ?>/dep/<?php echo (base64_encode($vo["dep_name"])); ?>">审核</a></td><td class="red">未审核</td><?php break;?>
                                    <?php case "1": ?><td><a href="/graduation/Teacher/Report/Look/stu/<?php echo ($vo["stu_number"]); ?>/name/<?php echo (base64_encode($vo["sname"])); ?>/dep/<?php echo (base64_encode($vo["dep_name"])); ?>">查看</a></td><td class="red">通过</td><?php break;?>
                                    <?php case "2": ?><td>等待中...</td><td class="red">退回修改</td><?php break;?>
                                    <default><td><a href=""></a></td><td class="red"></td></default><?php endswitch;?>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

	</table>

</body>
</html>