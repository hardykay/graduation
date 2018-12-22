<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系主任-将学生分配的评阅老师</title>
	<link rel="stylesheet" href="../">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script type="text/javascript" src="/graduation/static/js/jquery.min.js"> </script>
        <script type="text/javascript" src="/graduation/static/js/bootstrap.min.js"> </script>
<script > 
function xuan(){
        //获取name值
        var qcheck=document.getElementsByName("checkbox[]");
            for(var i=0;i<=qcheck.length;i++){
                qcheck[i].checked=true;
            }
        }
</script>
</head>
<body>
    <form action="<?php echo U('Review/Fenpei');?>" method="post">
<!--<div class="maofu" >-->
<input type="hidden" name="tea_number" value="<?php echo ($data["tea"]); ?>">
<input type="hidden" name="dep_id" value="<?php echo ($data["dep_id"]); ?>">
	<table class="table panel-info bshadow" >
		<thead>
			<tr>
				<th colspan="9">
                                    给<span class="red"><?php echo ($data["name"]); ?>老师</span> [ <?php echo ($data["tea"]); ?> ] 分配学生，该教师已分配学生人数 <span class="red"><?php echo ($data["num"]); ?></span> 名。
				</th>
			</tr>
			<tr class="success">
				<th><button type="button" onclick="xuan()">全选</button></th>
                                <th>编号</th>
				<th>学号</th>
				<th>学生姓名</th>
				<th>专业</th>
				<th>班级</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><input type="checkbox" name="checkbox[]" value="<?php echo ($vo["stu_number"]); ?>"></td>
                            <td><?php echo ($i); ?></td>
				<td><?php echo ($vo["stu_number"]); ?></td>
				<td><?php echo ($vo["name"]); ?></td>
				<td ><?php echo ($vo["dep_name"]); ?></td>
				<td><?php echo ($vo["cname"]); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

		<tfoot>
			<tr class="active">
				<td colspan="9">
                                    <div class="left">
						<i class="i"></i>
						<input type="submit" value="分配选中的学生" class="btn btn-success"><i class="i"></i>
						<input type="button" value="返回" class="btn btn-success" onclick="window.history.go(-1)">
                                    </div>
					<?php echo ($page); ?>
				</td>
			</tr>
		</tfoot>
	</table>
<!--</div>-->
</form>
</body>
</html>