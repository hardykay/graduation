<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>系主任-将学生分配的评阅老师</title>
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
        <form action="<?php echo U('RandomAllotReview/addTeacher');?>" method="post">
            <!--<div class="maofu" >-->
            <input type="hidden" name="id" value="<?php echo ($id); ?>">
            <table class="table panel-info bshadow" >
                <thead>
                    <tr class="success">
                        <th><button type="button" onclick="xuan()">全选</button></th>
                        <th>编号</th>
                        <th>工号</th>
                        <th>教师姓名</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><input type="checkbox" name="checkbox[]" value="<?php echo ($vo["tea_number"]); ?>"></td>
                        <td><?php echo ($i); ?></td>
                        <td><?php echo ($vo["tea_number"]); ?></td>
                        <td><?php echo ($vo["name"]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>

                <tfoot>
                    <tr class="active">
                        <td colspan="9">
                            <div class="left">
                                <i class="i"></i>
                                <input type="submit" value="分配选中的老师" class="btn btn-success"><i class="i"></i>
                                <a  class="btn btn-success" href="/graduation/Director/RandomAllotReview/Index" >返回</a>
                            </div>
                            <?php echo ($page); ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <!--</div>-->
        </form>
    </body>
</html>