<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>教学院长-课题发布</title>
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script type="text/javascript" src="/graduation/static/js/jquery.min.js"> </script>    
        <script type="text/javascript" src="/graduation/static/js/bootstrap.min.js"> </script>

</head>
<body>
<!--<div class="maofu" >-->
	<table class="table panel-info bshadow" >
		<thead>
                    <tr>
                        <th colspan="8">
                            <form action="/graduation/Dean/Teacher/number" method="post">
                                统一设置教师所带学生数为：<input type="number" max="50" min="1" name="number">
                                <input type="submit" value="提交">
                            </form>
                        </th>
                    </tr>
<!--				<th>管理员</th>
				<th>院长</th>-->
			<tr class="success">
				<th>序号</th>
				<th>工号</th>
                                <th>姓名</th>
                                <th>系主任</th>
                                <th>指导老师</th>
				<th>带学生人数</th>
			</tr>
		</thead>
		<tbody>
                    <!--                <td><input type="checkbox" value="<?php echo ($vo["tea_number"]); ?>" onclick="admin(this)" <?php if(empty($vo["admin"])): else: ?>checked="checked"<?php endif; ?>></td>
                <td><input type="checkbox" value="<?php echo ($vo["tea_number"]); ?>" onclick="dean(this)" <?php if(empty($vo["dean"])): else: ?>checked="checked"<?php endif; ?>></td>-->
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["tea_number"]); ?></td>
				<td><?php echo ($vo["name"]); ?></td>

                <td><?php if(empty($vo["specialty"])): ?>否 <?php else: ?> <span style="color: red">是</span><?php endif; ?>|<a data-toggle="modal" data-target="#myModal" onclick="$('#tea').val('<?php echo ($vo["tea_number"]); ?>')">进入选择专业</a></td>
                <td><input type="checkbox" value="<?php echo ($vo["tea_number"]); ?>" onclick="adviser(this)" <?php if(empty($vo["adviser"])): else: ?>checked="checked"<?php endif; ?>></td>
                <td><input type="number" value="<?php echo ($vo["nowadays_stu"]); ?>" onchange="nowaday(this,'<?php echo ($vo["tea_number"]); ?>')" max="100" min="0"> </td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
                <script>
                    function admin(it){
                        if($(it).is(':checked')) {
                            // do something
                             //alert(it.value)
                             ajax(it.value,'Admin',1)
                        }else{
                            ajax(it.value,'Admin',0)
                        }
                    }
                    function dean(it){
                        if($(it).is(':checked')) {
                            // do something
                             //alert(it.value)
                             ajax(it.value,'dean',1)
                        }else{
                            ajax(it.value,'dean',0)
                        }
                    }
                    function specialty(it){
                        if($(it).is(':checked')) {
                            // do something
                             //alert(it.value)
                             ajax(it.value,'specialty',1)
                        }else{
                            ajax(it.value,'specialty',0)
                        }
                    }
                    function adviser(it){
                        if($(it).is(':checked')) {
                            // do something
                             //alert(it.value)
                             ajax(it.value,'adviser',1)
                        }else{
                            ajax(it.value,'adviser',0)
                        }
                    }
                    /**
                     * [nowaday description]
                     * @param  {[type]} it [description]
                     * @return {[type]}    [description]
                     */
                    function nowaday(it,t){
                        $.post("/graduation/Dean/Rank/Nowaday", { val: $(it).val(), tea: t },
                       function(data){
                         //alert(data['val']);
                         if(data['val'] == 0){
                            alert('没有改变');
                         }else if(data['val'] == 1){
                            alert('设置成功');
                         }
                       });
                    }
                    function ajax(t,shenfen,v){
                       // var val=jQuery("#"+obj).val();
                         $.ajax({
                         url:"/graduation/Dean/Rank/"+shenfen,//这里指向的就不再是页面了，而是一个方法。
                         data:{
                             val:v,
                             tea:t
                         },
                         type:"POST",
                         dataType:"JSON",
                         success: function(data){
                             $(data).each(function (i) { 
                                 if(data.val==0){
                                     alert('设置失败')
                                 }else{
                                     alert('设置成功')
                                 }
                                 //str += "<option value='"+data[i].d+"'>"+data[i].n+"</option>";
                             });
//                             $('#banji').empty();
//                             $('#banji').append(str);
                         }
                     });
                 }
                </script>
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

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">选择系主任负责的专业</h4>
            </div>
            <form  action="<?php echo U('Teacher/Spe');?>" method="POST" >
            <div class="modal-body">
                <input name="tea" id="tea" value="<?php echo ($v["dep_id"]); ?>" type="hidden"><?php echo ($v["dep_name"]); ?><br>
                <?php if(is_array($dep)): $i = 0; $__LIST__ = $dep;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input name="dep[]" value="<?php echo ($v["dep_id"]); ?>" type="checkbox"><?php echo ($v["dep_name"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
           </form >
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
</body>
</html>