<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <script>
        function xuan(){
           return  confirm("确认选择该学生？如果选择了，就不能修改了！");
        }
        function fang(){
           return  confirm("确认放弃该学生？如果放弃了了，就等于删除！");
        }
    </script>
<body>
    
	<table class="table panel-info" >
		<thead>
			<tr class="success">
				<th>编号</th>
				<th>课题名称</th>
				<th>课题类型</th>
				<th>所属专业</th>
				<th>学生</th>
				<th>联系电话</th>
                                <th>Q Q</th>
				<th>志愿</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td class="twidth">
                                    <div class="ttext" ><?php echo ($name["name"]); ?></div>
				</td>
				<td><?php echo ($name["genre"]); ?></td>
				<td><?php echo ($vo["dep_name"]); ?></td>
				<td><?php echo ($vo["name"]); ?>:<?php echo ($vo["stu_number"]); ?></td>
                                <td><?php echo ($vo["phone"]); ?></td> 
                                <td><?php echo ($vo["qq"]); ?></td>
				<td><?php echo ($vo["volunt"]); ?></td>
                                <td><a href="/graduation/Teacher/Choose/Choose1/top/<?php echo ($vo["top_id"]); ?>/stu/<?php echo ($vo["stu_number"]); ?>/volunt/<?php echo ($vo["volunt"]); ?>" class="btn btn-info btn-ms"  id="white" onclick="return  confirm('确认选择“<?php echo ($vo["name"]); ?>”同学？')"><b>选择</b></a> <a href="/graduation/Teacher/Choose/Delete/top/<?php echo ($vo["top_id"]); ?>/stu/<?php echo ($vo["stu_number"]); ?>/volunt/<?php echo ($vo["volunt"]); ?>" class="btn btn-ms btn-danger " onclick="return  confirm('确认放弃“<?php echo ($vo["name"]); ?>”同学？')" id="white"><b>放弃</b></a> </td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
<!--</div>
</form>-->
</body>
</html>