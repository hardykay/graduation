<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title></title>
<link rel="stylesheet" href="/graduation/static/css/pintuer.css">
    <link rel="stylesheet" href="/graduation/static/css/admin.css">
<script src="/graduation/static/js/jquery.min.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 添加学生账号</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/graduation/Manager/Student/Addones" enctype="multipart/form-data">
     
      <div class="form-group">
        <div class="label">
          <label for="sitename">请选择：</label>
        </div>
        <div class="field">
            <select name="dep_college" class="input-sm" id="xueyuan" onchange="spe()">
                <option value="">请选择学院</option>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["dep_id"]); ?>"><?php echo ($v["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <select name="dep_major" class="input-sm" id="spec" onchange="shuchu()">
                <option value="">请选择专业</option>
            </select>
            <select name="dep_class" class="input-sm" id="banji">
                <option value="">请选择班级</option>
            </select>
        </div>
      </div>      
      
      <div class="form-group">
        <div class="label">
          <label for="stu_number">账号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="mpass" name="stu_number" size="50" placeholder="请输入学生账号" data-validate="required:请输入学生账号" />       
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="name">姓名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name" size="50" placeholder="请输入学生姓名" data-validate="required:请输入学生姓名" />         
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>   
        </div>
      </div>    
        
        
     
    </form>
  </div>
</div>
</body>

<script type="text/javascript">
    /**
     * 
     * @param {type} obj
     * @returns {undefined}获得班级
     */
 function spe(){
           var val=jQuery("#xueyuan").val();
            $.ajax({
            url:"<?php echo U('Ajax/Specialty');?>",//这里指向的就不再是页面了，而是一个方法。
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
    /**
     * 班级
     */
      function shuchu(){
           var val=jQuery("#spec").val();
            $.ajax({
            url:"<?php echo U('Ajax/banji');?>",//这里指向的就不再是页面了，而是一个方法。
            data:{dep:val},
            type:"POST",
            dataType:"JSON",
            success: function(data){
                //alert(data[0].code);//这里要用索引，使用eq读取不出来数据。
                var str='<option value="">请选择班级</option>';
                //alert(data);//alert(data[1].dep_id)
                $(data).each(function (i) { 
                    //alert(data[i].dep_name);
                    str += "<option value='"+data[i].d+"'>"+data[i].n+"</option>";
                });
                $('#banji').empty();
                $('#banji').append(str);
            }
        });
    }

</script>
</html>