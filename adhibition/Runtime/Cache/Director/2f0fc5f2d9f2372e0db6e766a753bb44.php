<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/public.style.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
    <title>专业毕业设计负责添加答辩小组</title>
</head>
<body>
<br>

<div class="container" >
    <form class="form-horizontal" role="form" action="/graduation/Director/Squad/Add/dep/1" method="post">
  <div class="form-group">
    <label class="col-sm-3 control-label">答辩组名称</label>
    <div class="col-sm-6">
        <input class="form-control" id="focusedInput" type="text" name="name"  placeholder="该输入答辩组名称" required>
    </div>
    <label class="col-sm-3 control-label"></label>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">答辩组地点</label>
    <div class="col-sm-6">
        <input class="form-control" id="focusedInput" type="text" name="place" placeholder="该输入答辩组地点" required>
    </div>
    <label class="col-sm-3 control-label"></label>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">答辩组日期</label>
    <div class="col-sm-4">
        <input class="form-control" id="focusedInput" type="text" name="dtime" placeholder="该输入答辩组日期" required>
    </div>
    <label class="col-sm-3 control-label"><div style="float:left;color: red;">例：2017/05/05 8:30-17:30</div></label>
  </div>
   <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div  >
     使用说明：在以下输入框中输入教师工号、姓名或在选项卡中选中某个学院，然后在名单中<b>单击选中</b>即可添加或者删除该成员。
    </div>
    <label class="col-sm-3 control-label"></label>
  </div>
   <div class="form-group">
    <label class="col-sm-3 control-label">请选择学院：</label>
    <div class="col-sm-2">
      <select class="form-control" name="" id="college" onchange="teacher('college')">
          
          <option value="">请选择学院</option>
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["dep_id"]); ?>"><?php echo ($vo["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
    <label class="col-sm-1 control-label">查询：</label>
    <div class="col-sm-3">
        <input type="text" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label"></label>
    
    <label class="col-sm-3 control-label"></label>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
    	<div style="float: left;margin-right: 30px;">
    		<div class="bsxys">待选答辩组教师</div>
			<div class="lxuankuang" id="weixuan" >
				
	      	</div>
    	</div>
      <div style="float: left;">
    		<div class="bsxys">已选的答辩组教师</div>
			<div class="lxuankuang" >
				<div id="stb">
				</div>
	      	</div>
    	</div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">答辩组长</label>
    <div class="col-sm-2">
        <select name="zz_number" id="selet" class="form-control" onchange="zz('selet')" required>
      	<option value="">请选择答辩组长</option>
      </select>
    </div>
    <label class="col-sm-3 control-label"></label>
  </div>
    <div class="form-group">
    <label class="col-sm-6 control-label"></label>
    <div class="col-sm-6">
        
    <input type="hidden" id="zz_name" name="zz_name" >
    <input type="hidden" name="dep_id" value="<?php echo ($dep); ?>"> 
     <button type="submit" class="btn btn-primary">提交</button> <button type="button" onclick="window.history.go(-1)" class="btn btn-primary">返回</button>
    </div>
  </div>
</form>
</div>
</body>

 <script>
$(document).ready(function(){
  $("#weixuan").on('click','.opti',function(){
	  var name = $(this).children(".name1").text();
	  var hao = $(this).children(".hao").text();			  
	  var nav1 = '<div class="yixuan"><span class="glyphicon glyphicon-remove-circle red"></span><span class="na">'+name+'</span><span>('+hao+')</span><input type="hidden" value="'+hao+'" name="hao[]"></div>';
	  $("#stb").append(nav1);
	  var sel = '<option id="'+hao+'" value="'+hao+'">'+name+'</option>';
	  $("#selet").append(sel);
	  $(this).remove();
  });
  $("#stb").on('click','.yixuan',function(){
  	//alert("jkfgjgjjg")
  	 var name = $(this).children(".na").text();
	 var hao = $(this).children("input").val();
	 var nav1 = '<div><span  class="glyphicon glyphicon-plus-sign opti"><span class="name1">'+name+'</span>(<span class="hao">'+hao+'</span>)</span></div>';
	  $("#weixuan").append(nav1);
	  $(this).remove();
	  $('#'+hao).remove();
  });

});

/**
     * 
     * @param {type} obj
     * @returns {undefined}获得班级
     */
    function teacher(obj){
           var val=jQuery("#"+obj).val();
            $.ajax({
            url:"<?php echo U('/Director/Ajax/Teacher');?>",//这里指向的就不再是页面了，而是一个方法。
            data:{'dep':val},
            type:"POST",
            dataType:"JSON",
            success: function(data){
                //alert(data[0].code);//这里要用索引，使用eq读取不出来数据。
                var str='';
                //alert(data);//alert(data[1].dep_id)
                $(data).each(function (i) { 
                    //alert(data[i].dep_name);
                   str += '<div><span  class="glyphicon glyphicon-plus-sign opti"><span class="name1">'+data[i].n+'</span>(<span class="hao">'+data[i].d+'</span>)</span></div>';
                     //"<option value='"++"'>""</option>";
                });
                //alert(str);
                $('#weixuan').empty();
                $('#weixuan').append(str);
            }
        });
    }
    
    function zz(obj){
        //$("#"+obj).find("option:selected").text();
        var val= $("#"+obj).find("option:selected").text();//jQuery("#"+obj).text();
        $('#zz_name').val(val);
    }
    /**
     * 获得学生
     */
     function stu(obj){
           var val=jQuery("#"+obj).val();
           //alert(val)
            $.ajax({
            url:"<?php echo U('/Teacher/Ajax/AjaxStu');?>",//这里指向的就不再是页面了，而是一个方法。
            data:{'dep':val},
            type:"POST",
            dataType:"JSON",
            success: function(data){
                //alert(data[0].code);//这里要用索引，使用eq读取不出来数据。
                var str='<option value="">请选择学生</option>';
                //alert(data);//alert(data[1].dep_id)
                $(data).each(function (i) { 
                    //alert(data[i].dep_name);
                    str += "<option value='"+data[i].d+"'>"+data[i].n+"("+data[i].d+")</option>";
                });
                $('#student').empty();
                $('#student').append(str);
            }
        });
    }
</script>
</html>