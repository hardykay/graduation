<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
	<title>专业毕业设计负责添加答辩小组</title>
	
</head>
<body>
	<table class="table panel-info">
		<thead>
			<tr class="success">
				<th>编号</th>
				<th>答辩组名称</th>
				<th>答辩地点</th>
				<th>答辩时间</th>
				<th>答辩组长</th>
				<th>答辩秘书</th>
				<th>答辩学生</th>
				<th>已分配</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["name"]); ?></td>
				<td><?php echo ($vo["place"]); ?></td>
				<td><?php echo ($vo["dtime"]); ?></td>
				<td><?php echo ($vo["zz_name"]); ?><br>[<?php echo ($vo["zz_number"]); ?>]</td>
                                <td><?php if(empty($vo["tea_number"])): ?><a href="/graduation/Director/Squad/Teacher/id/<?php echo ($vo["id"]); ?>">选择秘书</a><?php else: echo ($vo["tea_name"]); ?><br>[<?php echo ($vo["tea_number"]); ?>]<?php endif; ?></td>
				<td><a href="/graduation/Director/Squad/Student/id/<?php echo ($vo["id"]); ?>/dep/<?php echo ($dep); ?>">进入选择</a></td>
				<td><a href="/graduation/Director/Squad/Look/id/<?php echo ($vo["id"]); ?>/dep/<?php echo ($dep); ?>">查看(<?php echo ($vo["coun"]); ?>)</a></td>
				<td><a href="/graduation/Director/Squad/Alert/id/<?php echo ($vo["id"]); ?>/dep/<?php echo ($dep); ?>">修改</a> <span class="red">|</span> <a href="/graduation/Director/Squad/del/id/<?php echo ($vo["id"]); ?>/dep/<?php echo ($dep); ?>">删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

		<tfoot>
			<tr class="active">
				<td colspan="9">
					<div class="left">
						<a href="/graduation/Director/Squad/Add/dep/<?php echo ($dep); ?>"><input type="button" value="添加答辩小组" class="btn btn-success"></a>
						<i class="i"></i>
                                                <a style="color: white" value="返回" class="btn btn-success" href="/graduation/Director/Squad/Index.html" >返回</a>
					</div>
					
				</td>
			</tr>
		</tfoot>
	</table>

</body>
</html>