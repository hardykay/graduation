<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>系主任-查看评阅老师信息</title>
        <link rel="stylesheet" href="../">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script type="text/javascript" src="/graduation/static/js/jquery.min.js"></script>
        <script type="text/javascript" src="/graduation/static/js/bootstrap.min.js"></script>
        <script >
            function xuan() {
                //获取name值
                var qcheck = document.getElementsByName("checkbox[]");
                for (var i = 0; i <= qcheck.length; i++) {
                    qcheck[i].checked = true;
                }
            }
        </script>
    </head>
    <body>

        <!--<div class="maofu" >-->
        <table class="table panel-info bshadow" >
            <thead>
                <!--			<tr>
                                                <th colspan="9">
                                                        <div class="smiddle">
                                                                教师工号：
                                                                <input type="text">
                                                                <i class="i"></i>
                                                                教师姓名：<input type="text">
                                                        </div>
                                                </th>
                                        </tr>-->
                <tr class="success">
                    <th>编号</th>
                    <th>课题名称</th>
                    <th>课题类型</th>
                    <th>教师</th>
                    <th>已选人数</th>
                    <th>操作</th>
                    <th>分配</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($i); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td>
                        <?php switch($vo["top_type"]): case "1": ?><b class="langse">盲选</b><?php break;?>
                            <?php case "2": ?><b class="red">指定选</b><?php break;?>
                            <?php case "3": ?><b class="red">团队课题</b><?php break;?>
                            <?php case "4": ?><b class="red">外出毕设</b><?php break; endswitch;?>
                </td>
                <td><?php echo ($vo["tea_name"]); ?></td>
                <td><?php echo ($vo["yixuan"]); ?></td>
                <td><a  href="/graduation/Director/Allocation/Look/top/<?php echo ($vo["top_id"]); ?>">查看</a></td>
                <td><a  href="/graduation/Director/Allocation/fen/top/<?php echo ($vo["top_id"]); ?>/stu/<?php echo ($stu); ?>">选择</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <!--</div>-->
</body>
</html>