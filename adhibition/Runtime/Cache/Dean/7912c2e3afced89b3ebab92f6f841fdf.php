<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>评阅教师评阅论文</title>
    <link rel="stylesheet" href="/graduation/static/css/nav.css">
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
   <script src="/graduation/static/js/jquery.min.js"></script>
   <script src="/graduation/static/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<form action="">
<div class="container" >
    <table class="table panel-info bshadow" >
        <thead>
            <tr class="success">
                <th>编号</th>
                <th>专业名称</th>
                <th>所属学院</th>
                <th>专业学生数</th>
                <th>有效学生数</th>
                <th>答辩完结</th>
                <th>未答辩</th>
                <th>已发布</th>
                <th>优秀</th>
                <th>良好</th>
                <th>中等</th>
                <th>及格</th>
                <th>不及格</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($i); ?></td>
                <td><?php echo ($vo["dep_name"]); ?></td>
                <td><?php echo ($vo["college"]); ?></td>
                <td><?php echo ($vo["student"]); ?></td>
                <td><?php echo ($vo["zong"]); ?></td>
                <td><?php echo ($vo["dabian"]); ?></td>
                <td><?php echo ($vo["wdabian"]); ?></td>
                <td><?php echo ($vo["rele"]); ?></td>
                <td><?php echo ($vo["excellent"]); ?></td>
                <td><?php echo ($vo["find"]); ?></td>
                <td><?php echo ($vo["medium"]); ?></td>
                <td><?php echo ($vo["pass"]); ?></td>
                <td><?php echo ($vo["flunk"]); ?></td>
                <td><a href="/graduation/Dean/Score/Details/dep/<?php echo ($vo["dep_id"]); ?>">进入</a> <span class="red"></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
           
        </tbody>

        <tfoot>
            <tr class="active">
                <td colspan="14">
                   &nbsp;
                </td>
            </tr>
        </tfoot>
    </table>
</div>
</form>
</body>
</html>