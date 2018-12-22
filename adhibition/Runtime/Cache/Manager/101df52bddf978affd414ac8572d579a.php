<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script> 
  <title>专业毕业设计负责添加答辩小组</title>
</head>
<body>
<br>

  <table class="table panel-info" >
    <thead>
      <tr class="success">
        <th>专业名称</th>
        <th>学生总数</th>
        <th>已分组</th>
        <th>未答辩</th>
        <th>已完成</th>
        <th>二辩</th>
        <th>优秀答辩</th>
        <th>分组操作</th>
      </tr>
    </thead>
    <tbody>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vo["dep_name"]); ?></td>
        <td><?php echo ($vo["stu"]); ?></td>
        <td><?php if(empty($vo["zu"])): ?>0<?php else: echo ($vo["zu"]); endif; ?></td>
        <td><?php if(empty($vo["d0"])): ?>0<?php else: echo ($vo["d0"]); endif; ?></td>
        <td><?php if(empty($vo["d1"])): ?>0<?php else: echo ($vo["d1"]); endif; ?></td>
        <td><?php if(empty($vo["d2"])): ?>0<?php else: echo ($vo["d2"]); endif; ?></td>
        <td><?php if(empty($vo["d3"])): ?>0<?php else: echo ($vo["d3"]); endif; ?></td>
        <td><a href="/graduation/Manager/Squad/Squad/dep/<?php echo ($vo["dep_id"]); ?>">进入</a></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
  </table>
注意：未经过指导老师和评阅老师评分的同学，不能进行答辩！二辩及优秀答辩都在这里安排！
</body>
</html>