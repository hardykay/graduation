<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
<link rel="stylesheet" href="/graduation/static/css/nav.css"> 
<script src="/graduation/static/js/jquery.min.js"></script>
<script src="/graduation/static/js/bootstrap.min.js"></script> 
	<title>指导教师审阅论文草稿</title>
	
</head>
<body>
<br>


	<table class="table panel-info">
		<thead>
                    <tr>
                        <th colspan="6">总共有<span class="red"><?php echo ($zo["zong"]); ?></span>名学生选了您的课题，其中有<span class="red"><?php echo ($zo["dingz"]); ?></span>名学生已提交论文草稿。这其中未审核<span class="red"><?php echo ($zo["dingw"]); ?></span>名，已通过<span class="red"><?php echo ($zo["dingt"]); ?></span>名，退回修改<span class="red"><?php echo ($zo["dingg"]); ?></span>名。</th>
                    </tr>
			<tr class="success">
				<th>编号</th>
				<th>课题名称</th>
				<th>选题学生</th>
				<th>所属专业</th>
				<th>论文草稿</th>
				<th>状态</th>
		</thead>
		<tbody>	
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td class="twidth">
					<div class="ttext" >
	    				<a href="" title="<?php echo ($vo["name"]); ?>">
	    					<?php echo ($vo["name"]); ?>
	    				</a>
					</div>
				</td>
				<td><?php echo ($vo["sname"]); ?>[<?php echo ($vo["stu_number"]); ?>]</td>
				<td><?php echo ($vo["dep_name"]); ?></td>
				<td>
                                    <?php switch($vo["audit"]): case "0": ?><a href="/graduation/Teacher/Draft/ThesisDetermine/name/<?php echo (base64_encode($vo["name"])); ?>/sname/<?php echo (base64_encode($vo["sname"])); ?>/stu/<?php echo ($vo["stu_number"]); ?>/dep/<?php echo (base64_encode($vo["dep_name"])); ?>/top/<?php echo ($vo["top_id"]); ?>">立即审核</a><?php break;?>
                                        <?php case "1": ?><a href="/graduation/Teacher/Draft/Look/name/<?php echo (base64_encode($vo["name"])); ?>/sname/<?php echo (base64_encode($vo["sname"])); ?>/stu/<?php echo ($vo["stu_number"]); ?>/dep/<?php echo (base64_encode($vo["dep_name"])); ?>/top/<?php echo ($vo["top_id"]); ?>">查看</a><?php break;?>
                                        <?php case "2": ?>等待中<?php break; endswitch;?>
                                </td>
				<td>
                                    <?php switch($vo["audit"]): case "0": ?>未审核<?php break;?>
                                         <?php case "1": ?>已通过<?php break;?>
                                         <?php case "2": ?>退回修改<?php break; endswitch;?>
                                </td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

</body>
</html>