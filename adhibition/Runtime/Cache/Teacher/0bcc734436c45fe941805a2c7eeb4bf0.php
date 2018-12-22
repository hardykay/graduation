<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <title>教师选择学生</title>
</head>
<body>
<!--<br>
<form action="">
<div class="maofu" >-->
	<table class="table panel-info" >
		<thead>
			<tr class="success">
				<th>编号</th>
				<th>课题名称</th>
				<th>课题类型</th>
				<th>待选学生</th>
                                <th>已选学生</th>
				<th>选题状态</th>
				<th>是否发布</th>
				<th>是否通过审核</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td class="twidth">
					<div class="ttext" >
	    					<?php echo ($vo["name"]); ?>
					</div>
				</td>
				<td><?php echo ($vo["genre"]); ?></td>
                                <?php if(($vo["opt"]) == "0"): ?><td style="color: #9E9E9E">已确认<br>不能选择学生</td>
                                <?php else: ?>
                                    <td><a href=""><a href="/graduation/Teacher/Choose/Choose/top/<?php echo ($vo["top_id"]); ?>" >进入选择</a><br>(<span class="red"><?php echo ($vo["number"]); ?>人</span>)</a><br></td><?php endif; ?>
				
                                <td> <a href="/graduation/Teacher/Choose/Look/top/<?php echo ($vo["top_id"]); ?>">查看</a><br><span class="red"><?php echo ($vo["yixuan"]); ?></span> 个</td>
                                <?php if(($vo["opt"]) == "0"): ?><td  style="color: #009688">
                                        <a href="/graduation/Teacher/Choose/Verify1/top/<?php echo ($vo["top_id"]); ?>" class="btn btn-xs btn-info " id="white">开启</a>
                                    </td>
                                <?php else: ?>
                                    <td class="red">
                                        <a href="/graduation/Teacher/Choose/Verify/top/<?php echo ($vo["top_id"]); ?>" class="btn btn-xs btn-info " onclick="return  confirm('确认该课题后，就不能再选择学生，确定要进行此操作吗？')" id="white">停止选择</a>
                                    </td><?php endif; ?>
                                <?php if(($vo["rele"]) == "0"): ?><td class="red">未发布</td><?php else: ?><td style="color: #009688">已发布</td><?php endif; ?>
                                <?php if(($vo["audit"]) == "0"): ?><td class="red">未审核</td><?php else: ?><td style="color: #009688">通过</td><?php endif; ?>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			
		</tbody>
	</table><!--
<!--</div>
</form>-->
</body>
</html>