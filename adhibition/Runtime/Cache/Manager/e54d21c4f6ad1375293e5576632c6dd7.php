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
                    <tr>
                        <th colspan="5">
                            <?php echo (base64_decode($zy["zy"])); ?>/<?php echo (base64_decode($zy["bj"])); ?>
                        </th>
                    </tr>
			<tr class="success">
				<th>序号</th>
				<th>学号</th>
                <th>姓名</th>
                <th>密码操作</th>
                <th>删除操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["stu_number"]); ?></td>
				<td><?php echo ($vo["name"]); ?></td>
<!--                                <td><?php echo ($vo["xs"]); ?></td>
				<td><a href="/graduation/Manager/Student/Student/dep/<?php echo ($vo["dep_id"]); ?>/zy/<?php echo ($zy); ?>/bj/<?php echo ($vo["dep_name"]); ?>">进入</a></td>-->
				<td><a href="/graduation/Manager/Initialize/student/number/<?php echo ($vo["stu_number"]); ?>" onclick="return confirm('重置后，密码与账号相同！')">密码重置</a></td>
				<td><a href="/graduation/Manager/Initialize/delstudent/number/<?php echo ($vo["stu_number"]); ?>" onclick="return confirm('确认删除“<?php echo ($vo["name"]); ?>”账号吗？')">删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
                <tfoot>
			<tr class="active">
				<td colspan="9">
					<div class="left">
						<i class="i"></i>
						<input type="button" value="返回" class="btn btn-success" onclick="window.history.go(-1)">
					</div>
					<?php echo ($page); ?>
				</td>
			</tr>
		</tfoot>
	</table>

<!--</div>-->
</body>
</html>