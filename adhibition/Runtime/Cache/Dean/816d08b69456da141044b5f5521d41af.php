<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<head>
<meta charset="utf-8">
	<title>中国石油大学胜利学院</title>
	<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
   <script src="/graduation/static/js/jquery.min.js"></script>
   <script src="/graduation/static/js/bootstrap.min.js"></script>
	<link rel="StyleSheet" href="/graduation/static/css/dtree.css" type="text/css" />
	<script type="text/javascript" src="/graduation/static/js/dtree.js"></script>

</head>

<body>

<div class="container">
   <div class="row" >
   <h1>   </h1>
   <div class="col-sm-2"></div>
   <div class="col-sm-1"></div>
   <div class="col-sm-2">
	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#zy">添加专业</button>
   </div>
   <div class="col-sm-1"></div>

   <div class="col-sm-1"></div>
   <div class="col-sm-2">
	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#banji">添加班级</button>
   </div>
   <div class="col-sm-2"></div>
	
	
	
   </div>
</div>

<div class="dtree">
	<h1 style="text-align: center;">学校树形结构</h1>
	<script type="text/javascript">
		<!--

		d = new dTree('d');
		d.add(0,-1,'中国石油大学胜利学院');
                //学院
        <?php if(is_array($co)): $i = 0; $__LIST__ = $co;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>d.add(<?php echo ($v["dep_id"]); ?>,0,'<?php echo ($v["dep_name"]); ?>');<?php endforeach; endif; else: echo "" ;endif; ?>
//专业
        <?php if(is_array($sp)): $i = 0; $__LIST__ = $sp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>d.add(100<?php echo ($v["dep_id"]); ?>,<?php echo ($v["dep_father"]); ?>,'<?php echo ($v["dep_name"]); ?><a style="float:right;margin-right:300px;" href="/graduation/Manager/Tree/DelSpecialty/id/<?php echo ($v["dep_id"]); ?>" onclick="return confirm(\'确认删除该专业吗？\')"><span style="color:red" class="glyphicon glyphicon-remove"></span></a>');<?php endforeach; endif; else: echo "" ;endif; ?>
//班级
        <?php if(is_array($ca)): $i = 0; $__LIST__ = $ca;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>d.add(500<?php echo ($v["dep_id"]); ?>,100<?php echo ($v["dep_father"]); ?>,'<?php echo ($v["dep_name"]); ?><a style="float:right;margin-right:300px;" href="/graduation/Manager/Tree/DelClass/id/<?php echo ($v["dep_id"]); ?>" onclick="return confirm(\'确认删除该班级吗？\')"><span style="color:red" class="glyphicon glyphicon-remove"></span></a>');<?php endforeach; endif; else: echo "" ;endif; ?>
//		d.add(2,0,'Node 2','example01.html');
//		d.add(3,1,'Node 1.1','example01.html');
//		d.add(4,0,'Node 3','example01.html');
//		d.add(5,3,'Node 1.1.1','example01.html');
//		d.add(6,5,'Node 1.1.1.1','example01.html');
//		d.add(7,0,'Node 4','example01.html');
//		d.add(8,1,'Node 1.2','example01.html');
		
		//d.add(12,0,'Recycle Bin','example01.html','','','img/trash.gif');

		document.write(d);

		//-->
                
             
    /**
     * 
     * @param {type} obj
     * @returns {undefined}获得班级
     */
    function spe(obj){
           var val=jQuery("#xy").val();
            $.ajax({
            url:"<?php echo U('Ajax/specialty');?>",//这里指向的就不再是页面了，而是一个方法。
            data:{dep:val},
            type:"POST",
            dataType:"JSON",
            success: function(data){
                //alert(data[0].code);//这里要用索引，使用eq读取不出来数据。
                var str='<option value="">请选择专业</option>';
                //alert(data);//alert(data[1].dep_id)
                $(data).each(function (i) { 
                    //alert(data[i].dep_name);
                    str += "<option value='"+data[i].d+"'>"+data[i].n+"</option>";
                });
                $('#spec').empty();
                $('#spec').append(str);
            }
        });
    }
	</script>
</div>

  
<!-- 添加学院 -->
<div class="modal fade" id="college" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加学院</h4>
            </div>
            <form class="form-horizontal" role="form" action="<?php echo U('Tree/AddColege');?>" method="post">
            <div class="modal-body">
				<div class="form-group">
			    <label for="firstname" class="col-sm-2 control-label">学院名称</label>
			    <div class="col-sm-10">
                                <input type="text" name="dep_name" class="form-control" id="firstname" placeholder="请输入学院名称">
			    </div>
			  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
</form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!-- 添加专业 -->
<!-- 模态框（Modal） -->
<div class="modal fade" id="zy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加专业</h4>
            </div>
<form class="form-horizontal" role="form"  action="<?php echo U('Tree/AddSpecialty');?>" method="post">
			<div class="modal-body">
			  <div class="form-group">
			    <label for="firstname" class="col-sm-4 control-label">请选择学院</label>
			    <div class="col-sm-8">
			      <select name="dep_father" id="" class="input-sm">
                                  
			      	<option value="">请选择学院</option>
                            <?php if(is_array($co)): $i = 0; $__LIST__ = $co;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["dep_id"]); ?>"><?php echo ($v["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			      </select>
			    </div>
			  </div>
				<div class="form-group">
			    <label for="firstname" class="col-sm-4 control-label">专业名称</label>
			    <div class="col-sm-8">
                                <input type="text" name="dep_name" class="form-control" id="firstname" placeholder="请输入专业名称">
			    </div>
			  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
</form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!-- 添加班级 -->
<div class="modal fade" id="banji" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加班级</h4>
            </div>
 <form class="form-horizontal" role="form"   action="<?php echo U('Tree/AddClass');?>" method="post">
            <div class="modal-
            body">
              <div class="form-group">
			    <label for="firstname" class="col-sm-3 control-label">请选择</label>
			    <div class="col-sm-8">
			      
			      <select name="" id="xy" onchange="spe()" class="input-sm">
                                  
			      	<option value="">请选择学院</option>
                            <?php if(is_array($co)): $i = 0; $__LIST__ = $co;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["dep_id"]); ?>"><?php echo ($v["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			      </select>
			      <select name="dep_father" id="spec" class="input-sm">
			      	<option value="">请选择专业</option>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="firstname" class="col-sm-2 control-label">学院名称</label>
			    <div class="col-sm-10">
                                <input type="text" name="dep_name" class="form-control" id="firstname" placeholder="请输入学院名称">
			    </div>
			  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
</form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
</body>

</html>