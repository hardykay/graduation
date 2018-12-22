<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script src="/graduation/static/js/jquery.min.js"></script>
        <script src="/graduation/static/js/bootstrap.min.js"></script> 
        <title>答辩秘书或答辩录入员录入答辩成绩</title>
    </head>
    <body>
        <table class="table panel-info bshadow" >
            <thead>
                <tr>
                    <td style="text-align: center" colspan="12"><a href="/graduation/Teacher/Score/ImScore/id/<?php echo ($id); ?>">查看已答辩的学生</a></td>
                </tr>
                <tr class="success">
                    <th>编号</th>
                    <th>学生</th>
                    <th>课题名称</th>
                    <th>平时评分</th>
                    <th>指导评分</th>
                    <th>评阅评分</th>
                    <th>答辩评分</th>
                    <th>总成绩</th>
                    <th>总评</th>
                    <th>状态</th>
                    <th>信息操作</th>
                    <th>课题状态</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($i); ?></td>
                    <td><?php echo ($vo["stu_name"]); ?><br>(<?php echo ($vo["stu_number"]); ?>)</td>
                    <td class="twidth">
                        <div class="ttext" title="<?php echo ($vo["top_name"]); ?>">
                            <?php echo ($vo["top_name"]); ?>
                        </div>
                    </td>
                    <td><?php echo ($vo["grade"]); ?></td>
                    <td><?php echo ($vo["zdgrade"]); ?></td>
                    <td><?php echo ($vo["pingyuegrade"]); ?></td>
                    <td><?php echo ($vo["dabiangrade"]); ?></td>
                    <td><?php echo ($vo["score"]); ?></td>
                    <td><?php echo ($vo["genera"]); ?></td>
                    <td>
                <?php if(empty($vo["rele"])): ?>未发布<?php else: ?>已发布<?php endif; ?>
                </td>
                <td><a href="/graduation/Teacher/Score/Pingfen/stu/<?php echo ($vo["stu_number"]); ?>/id/<?php echo ($id); ?>">论文答辩</a></td>
                <td><?php if(empty($vo["dabian"])): ?>未录入成绩<?php else: ?>已经录入成绩<?php endif; ?>
                <br><?php if(empty($vo["rele"])): ?>等待发布成绩<?php else: ?>已发布<?php endif; ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>

        <tfoot>
            <tr class="active">
                <td colspan="12">
                    <div class="left">
                        <i class="i"></i>
                        <input type="button" value="返回" class="btn btn-success" onclick="window.history.go(-1)">
                    </div> 
                    <?php echo ($page); ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
</html>