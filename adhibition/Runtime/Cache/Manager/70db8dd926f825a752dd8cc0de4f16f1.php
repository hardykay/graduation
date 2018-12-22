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
  <div class="panel-head"><strong><span class="icon-key"></span> 批量导入教师</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/graduation/Manager/Teacher/Add.html" enctype="multipart/form-data">
     
      <div class="form-group">
        <div class="label">
          <label for="sitename">学院：</label>
        </div>
        <div class="field">
            <select name="dep" class="input w50">
                <option value="">请选择学院</option>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["dep_id"]); ?>"><?php echo ($v["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">导入名单：</label>
        </div>
        <div class="field">
          <input type="file"  name="photo"  />         
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
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="label-block">
            <label>导入说明：导入Excel表格符合以下要求，其中，教师账号及密码都为教师工号。</label>
        </div>
      </div>
        
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="label-block">
            <img src="/graduation/static/images/drjs.jpg" />
        </div>
      </div>
    </form>
      
  </div>
</div>
</body></html>