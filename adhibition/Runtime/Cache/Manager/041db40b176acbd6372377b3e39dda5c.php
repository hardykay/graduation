<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<title></title>
<link rel="stylesheet" href="/graduation/static/css/pintuer.css">
<link rel="stylesheet" href="/graduation/static/css/admin.css">
<script src="/graduation/static/js/jquery.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"></div>
  <div class="padding border-bottom">  
  <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加内容</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">ID</th>
      <th width="20%">图片</th>
      <th width="15%">名称</th>
      <th width="20%">描述</th>
      <th width="15%">操作</th>
    </tr>
    <?php if(is_array($lun)): $i = 0; $__LIST__ = $lun;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($i); ?></td>     
      <td><img src="/graduation<?php echo ($vo["img"]); ?>" alt="" width="120" height="50" /></td>     
      <td><?php echo ($vo["head"]); ?></td>
      <td><?php echo ($vo["body"]); ?></td>
      <td><div class="button-group">
              <a class="button border-main" href="#add" onclick="$('#bianhao').val(<?php echo ($vo["id"]); ?>)"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="/graduation/Manager/Adv/Del/id/<?php echo ($vo["id"]); ?>" onclick="return confirm('您确定要删除吗?')"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加内容</strong></div>
  <div class="body-content">
      <form method="post" class="form-x" action="<?php echo U('Adv/add');?>" enctype="multipart/form-data">    
       <input type="hidden" value="" name="id" id="bianhao"/>
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="head" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>URL：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="url" value=""  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
            <input type="file" name="file"/>
          <h4 >图片尺寸：948*633</h4>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input" name="body" style="height:50px;" value=""></textarea>
          <div class="tips"></div>
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