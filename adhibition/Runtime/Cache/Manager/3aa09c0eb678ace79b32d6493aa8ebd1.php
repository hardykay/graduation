<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>教学院长-课题发布</title>
        <link rel="stylesheet" href="../">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script type="text/javascript" src="/graduation/static/js/jquery.min.js"></script>
    </head>
    <body>
        <a style="display: block;text-align: center;font-weight: 900;margin-bottom: 30px;margin-top: 20px;" href="/graduation/Manager/RandomAllotReview/CreateGroupView">创建评阅小组</a>
        <table class="table panel-info bshadow" >
            <thead>
                <tr class="success">
                    <th>小组名称</th>
                    <th>教师人数</th>
                    <th>添加教师</th>
                    <th>设置教师所带人数</th>
                    <th>针对专业</th>
                    <th>操作</th>
                    <th>删除</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><a href="/graduation/Manager/RandomAllotReview/TeacherView/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["number"]); ?>人</a></td>
                    <td><a href="/graduation/Manager/RandomAllotReview/CollegeView/id/<?php echo ($vo["id"]); ?>">进入</a></td>
                    <td><a href="/graduation/Manager/RandomAllotReview/setTeacherNumberView/id/<?php echo ($vo["id"]); ?>">进入</a></td>
                    <td><?php echo ($vo["specialty"]); ?></td>
                    <td><a href="/graduation/Manager/RandomAllotReview/Onekey/id/<?php echo ($vo["id"]); ?>">一键分配</a></td>
                    <td><a href="/graduation/Manager/RandomAllotReview/del/id/<?php echo ($vo["id"]); ?>" onclick="return confirm('要删除“<?php echo ($vo["name"]); ?>”小组吗？')">删除</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</body>
</html>