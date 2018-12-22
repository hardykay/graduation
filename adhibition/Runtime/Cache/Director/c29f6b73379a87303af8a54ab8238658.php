<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script type="text/javascript" src="/graduation/static/js/jquery.min.js"> </script>
        <script type="text/javascript" src="/graduation/static/js/bootstrap.min.js"> </script>
	<title>选择答辩小组学生</title>
<script>
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

<form action="<?php echo U('Squad/Addstu');?>" method='post'>
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
    <input type="hidden" name="dep" value="<?php echo ($data["dep"]); ?>">
	<table class="table panel-info bshadow" >
		<thead>
               
			<tr class="success">
				<th><button type="button" onclick="xuan()">全选</button></th>
				<th>序号</th>
				<th>选题学生</th>
				<th>班级</th>
				<th>指导老师</th>
				<th>课题名称</th>
				<th>所属专业</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><input type="checkbox" name="checkbox[]" value="<?php echo ($vo["stu_number"]); ?>"></td>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["stu_name"]); ?>（<?php echo ($vo["stu_number"]); ?>）</td>
                                <td><?php echo ($vo["b_name"]); ?></td>
				<td><?php echo ($vo["tea_name"]); ?> [<?php echo ($vo["tea_number"]); ?>]</td>
				<td class="twidth">
					<div class="ttext" >
<!--	    				<a href="" title="<?php echo ($vo["t_name"]); ?>">-->
	    					<?php echo ($vo["top_name"]); ?>
<!--	    				</a>-->
					</div>
				</td>
				<td><?php echo ($vo["z_name"]); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

		<tfoot>
			<tr class="active">
				<td colspan="8">
					<div class="left">
						<i class="i"></i>
						<input type="submit" value="分配选中" class="btn btn-success">
						<i class="i"></i>
						<input type="button" value="返回" class="btn btn-success" onclick="window.history.go(-1)">
					</div>
                                        <?php echo ($page); ?>
				</td>
                                
			</tr>
		</tfoot>
	</table>

</form>
</body>
</html>