<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
	<title>发布双选结果</title>
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
    <form action="<?php echo U('Dean/Topic/CheckOuter');?>" method="post">
        <input type="hidden" name="dep" value="<?php echo ($dep); ?>">
	<table class="table panel-info bshadow" >
		<thead>
			<tr class="success">
                            <th><button type="button" onclick="xuan()">全选</button></th>
                            <th>选择人数</th>
                            <th>课题名称</th>
                            <th>申报老师</th>
                            <th>课题类型</th>
                            <th>选题方式</th>
                            <th>状态</th>
			</tr>
		</thead>
		<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><input type="checkbox" name="checkbox[]" value="<?php echo ($vo["top_id"]); ?>"></td>
				<td><?php echo ($vo["yixuan"]); ?></td>
				<td class="twidth">
					<div class="ttext" >
	    				<a href="/graduation/Home/Topic/Index/top/<?php echo ($vo["top_id"]); ?>" title="<?php echo ($vo["name"]); ?>">
	    					<?php echo ($vo["name"]); ?>
	    				</a>
					</div>
				</td>
				<td><?php echo ($vo["tea_name"]); ?>[<?php echo ($vo["tea_number"]); ?>]</td>
				<td><?php echo ($vo["genre"]); ?></td>
				<td>
                                    <?php switch($vo["top_type"]): case "1": ?><b class="langse">盲选</b><?php break;?>
                                    <?php case "2": ?><b class="langse">指定选</b><?php break;?>
                                    <?php case "3": ?><b class="langse">团队课题</b><?php break;?>
                                    <?php case "3": ?><b class="langse">外出毕设</b><?php break; endswitch;?>
                                    </td>
				<td class="red">未发布</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

		<tfoot>
			<tr class="active">
				<td colspan="9">
					<div class="left">
						<i class="i"></i>
						<input type="submit" value="发布选中" class="btn btn-success">
						
                                                <a type="button" class="btn btn-success" style="color:#fff" href="/graduation/Dean/Topic/Specialty.html">返回</a>
					</div>
					<?php echo ($page); ?>
				</td>
			</tr>
		</tfoot>
	</table>
</form>
</body>
</html>