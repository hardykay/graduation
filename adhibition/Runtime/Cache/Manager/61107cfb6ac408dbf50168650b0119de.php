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
<script src="/graduation/static/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 添加老师账号</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/graduation/Manager/Teacher/Addone">
      
        
      <div class="form-group">
        <div class="label">
          <label for="number">账号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="mpass" name="tea_number" size="50" placeholder="请输入老师账号" data-validate="required:请输入老师账号" />       
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="name">姓名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name" size="50" placeholder="请输入老师姓名" data-validate="required:请输入老师姓名" />         
        </div>
      </div>
     <div class="form-group">
        <div class="label">
          <label for="name">学院：</label>
        </div>
        <div class="field">
          <select name="dep_id">  
  <option value="">--请选择--</option>  
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data["dep_id"]); ?>"><?php echo ($data["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>         
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
</body></html>