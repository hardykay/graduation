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
        <th>所属学院</th>
        <th>专业学生数</th>
        <th>已有课题</th>
        <th>没选上的</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vo["spe_name"]); ?></td>
        <td><?php echo ($vo["college"]); ?></td>
        <td><?php echo ($vo["szong"]); ?></td>
        <td><?php echo ($vo["yifen"]); ?></td>
        <td><?php echo ($vo["wei"]); ?></td>
        <td><a href="/graduation/Dean/Allocation/Student/dep/<?php echo ($vo["dep_id"]); ?>">进入</a></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
  </table>

</body>
</html>