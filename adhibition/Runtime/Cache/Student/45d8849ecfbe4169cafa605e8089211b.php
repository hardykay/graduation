<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
	<title>毕业设计（论文）定稿</title>
</head>
<body>
<br>
<div class="container" >
	<fieldset>
        <legend>相关提示</legend>
        <div style="margin: 0 auto;width: 80%">
            <h3>对于论文的最后一版就是定稿。</h3>
            <br>
            
        </div>
      
    </fieldset>
	<table class="table panel-info">
		<thead>
			<tr class="success">
				<th>课题名称</th>
				<th>课题类型</th>
				<th>指导老师</th>
				<th>论文定稿状态</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="twidth"><?php echo ($li["name"]); ?></td>
				<td><?php echo ($li["genre"]); ?></td>
				<td><?php echo ($li["tea_name"]); ?></td>
				<td>
                                <?php switch($li["audit"]): case "0": ?>审核中<?php break;?>
                                    <?php case "1": ?>通过审核<?php break;?> 
                                    <?php case "2": ?><a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">退回修改</a>
                                    <!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">修改论文</h4>
            </div>
 <form role="form" action="<?php echo U('Finalize/Alert');?>" method="post" enctype="multipart/form-data" >
            <div class="modal-body">
            <div ><b>设计(论文)文件：</b><input type="file" name="file" style="display: inline-block;"></div>
            <br>
            <div><b>附件：</b><input name="fujian" type="file" style="display: inline-block;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交更改</button>
            </div>
</form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div><?php break; endswitch;?>
                                    </td>
			</tr>
	</table>
    <br><br><br>
    
    
</div>
</body>
</html>