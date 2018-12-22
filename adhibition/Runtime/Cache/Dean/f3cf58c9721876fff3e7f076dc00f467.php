<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <title>院长审核团队课题</title>
</head>
<body>
<!--<form action="">
<div class="maofu" >-->
	<table class="table panel-info bshadow" >
		<thead>
			<tr class="success">
                                <td>编号</td>
				<th>课题名称</th>
				<th>课题类型</th>
				<th>指导老师</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>	
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($i); ?></td>
				<td><?php echo ($vo["name"]); ?></td>
				<td><?php echo ($vo["genre"]); ?></td>
				<td><?php echo ($vo["tea_name"]); ?>【<?php echo ($vo["tea_number"]); ?>】</td>
				<td>
                                    <?php switch($vo["audit"]): case "0": ?>未审核<?php break;?>
                        <?php case "1": ?>已通过<?php break;?>
                        <?php case "2": ?>退回修改<?php break; endswitch;?>
                                </td>
				<td>
                                
                                    <?php switch($vo["audit"]): case "0": ?><a href="/graduation/Dean/Team/Check/top/<?php echo ($vo["top_id"]); ?>">立即审核</a><?php break;?>
                        <?php case "1": ?><a href="/graduation/Dean/Team/Look/top/<?php echo ($vo["top_id"]); ?>">查看</a><?php break;?>
                        <?php case "2": ?>等待中<?php break; endswitch;?>    
                                    
                                </td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
<!--</div>
</form>-->
</body>
</html>