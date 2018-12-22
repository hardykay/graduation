<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <title>我的课题</title>
    <style>
        .l1{color: #009688}
        .hui{color:#9e9e9e}
    </style>
</head>
<body>
	<table class="table panel-info" >
		<thead>
			<tr class="success">
				<th>编号</th>
				<th>课题名称</th>
				<th>课题类型</th>
                                <th>课题属性</th>
                                <th>已选学生</th>
				<th>选题状态</th>
				<th>是否发布</th>
				<th>是否通过审核</th>
                                <th>操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td class="twidth">
					<div class="ttext" >
	    				<a href="/graduation/Home/Topic/Index/top/<?php echo ($vo["top_id"]); ?>" title="<?php echo ($vo["name"]); ?>">
	    					<?php echo ($vo["name"]); ?>
	    				</a>
					</div>
				</td>
				<td><?php echo ($vo["genre"]); ?></td>
                                <td>
                                    <?php switch($vo["top_type"]): case "1": ?>盲选<?php break;?>
                                        <?php case "2": ?>指定选<?php break;?>
                                        <?php case "3": ?>团队课题<?php break;?>
                                        <?php case "4": ?>外出毕设<?php break; endswitch;?>
                                </td>
                                <td> <?php if(empty($vo["yixuan"])): ?>无<?php else: ?><a href="/graduation/Teacher/MagerTop/Look/top/<?php echo ($vo["top_id"]); ?>">查看</a><br><span class="red"><?php echo ($vo["yixuan"]); ?></span> 个<?php endif; ?></td>
                                <?php if(($vo["opt"]) == "0"): ?><td  class="l1"><a href="/graduation/Teacher/Choose/Verify1/top/<?php echo ($vo["top_id"]); ?>" class="btn btn-xs btn-info " id="white">开启</a></td>
                                <?php else: ?>
                                    <td class="red">
                                        <a href="/graduation/Teacher/Choose/Verify/top/<?php echo ($vo["top_id"]); ?>" class="btn btn-xs btn-info " onclick="return  confirm('确认该课题后，就不能再选择学生，确定要进行此操作吗？')" id="white">停止选题</a>
                                    </td><?php endif; ?>
                                <?php if(($vo["rele"]) == "0"): ?><td class="hui">未发布</td><?php else: ?><td class="l1">已发布</td><?php endif; ?>
                                
                                <?php switch($vo["audit"]): case "0": ?><td><a href="/graduation/Teacher/MagerTop/Change/top_id/<?php echo ($vo["top_id"]); ?>.html">更改</a></td><?php break;?>
                                        <?php case "1": ?><td class="l1">已通过</td><?php break;?>
                                        <?php case "2": ?><td style="color:red"><a href="/graduation/Teacher/MagerTop/ApplyFor/id/<?php echo ($vo["top_id"]); ?>">退回修改</a></td><?php break; endswitch;?>
                                
                                <td class="hui"><a style="color:red" href="/graduation/Teacher/Choose/Del/top/<?php echo ($vo["top_id"]); ?>" onclick="return confirm('确定要删除？')" >删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			
		</tbody>
	</table>
    注意：若需要修改"盲选适合的专业"，请重新申请课题。
</body>
</html>