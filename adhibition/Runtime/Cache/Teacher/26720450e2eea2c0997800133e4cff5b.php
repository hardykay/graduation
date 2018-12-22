<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
<link rel="stylesheet" href="/graduation/static/css/nav.css"> 
<script src="/graduation/static/js/jquery.min.js"></script>
<script src="/graduation/static/js/bootstrap.min.js"></script> 
	<title>指导教师审阅论文定稿</title>
	
</head>
<body>
<br>


	<table class="table panel-info">
		<thead>
			<tr class="success">
				<th>编号</th>
				<th>课题名称</th>
				<th>选题学生</th>
				<th>所属专业</th>
				<th>操作</th>
				<th>论文状态</th>
				<th>论文下载</th>
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
				<td><?php echo ($vo["sname"]); ?>[<?php echo ($vo["stu_number"]); ?>]</td>
				<td><?php echo ($vo["dep_name"]); ?></td>
				<td>
                                    <?php switch($vo["audit"]): case "0": ?><a href="/graduation/Teacher/Review/ThesisDetermine/stu/<?php echo ($vo["stu_number"]); ?>">立即评阅</a><?php break;?>
                                        <?php case "1": ?><a href="/graduation/Teacher/Review/Check1/stu/<?php echo ($vo["stu_number"]); ?>">查看</a><?php break; endswitch;?>
                                </td>
				<td>
                                    <?php switch($vo["audit"]): case "0": ?><span class="red">未评阅</span><?php break;?>
                                         <?php case "1": ?>已通过<?php break; endswitch;?>
                                </td>
				<td>
                                    <?php switch($vo["audit"]): case "0": ?><a href="/graduation/Teacher/Review/DownloadFile/stu/<?php echo ($vo["stu_number"]); ?>">立即下载</a><?php break;?>
                                         <?php case "1": ?><a href="/graduation/Teacher/Review/DownloadFile/stu/<?php echo ($vo["stu_number"]); ?>">立即下载</a><?php break; endswitch;?>
                                </td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

</body>
</html>