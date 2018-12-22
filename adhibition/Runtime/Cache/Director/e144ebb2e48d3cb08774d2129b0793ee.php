<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系主任-查看评阅老师信息</title>
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

<!--<div class="maofu" >-->
	<table class="table panel-info bshadow" >
		<thead>
<!--			<tr>
				<th colspan="9">
					<div class="smiddle">
						教师工号：
						<input type="text">
						<i class="i"></i>
						教师姓名：<input type="text">
					</div>
				</th>
			</tr>-->
			<tr class="success">
				<th>编号</th>
				<th>教师工号</th>
				<th>教师姓名</th>
                                <th>所属学院</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["tea_number"]); ?></td>
				<td><?php echo ($vo["name"]); ?></td>
                                <td><?php echo ($vo["dep_name"]); ?></td>
                                <td><a  href="/graduation/Director/Squad/Addtea/id/<?php echo ($data["id"]); ?>/tea/<?php echo ($vo["tea_number"]); ?>/tname/<?php echo (base64_encode($vo["name"])); ?>/email/<?php echo ($vo["email"]); ?>">选择</td>
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