<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>学生</title>  
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/nav.css">
        <script src="/graduation/static/js/jquery.min.js"></script>
        <script src="/graduation/static/js/bootstrap.min.js"></script>   

    </head>
    <body>
        <br>
        <table class="table panel-info bshadow" >
            <thead>
                <tr class="success">
                    <th>编号</th>
                    <th>课题名称</th>
                    <th>课题类型</th>
                    <th>指导老师</th>
                    <th>本次共选人数</th>
                    <th>有效被选人数</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($i); ?></td>
                    <td class="twidth">
                        <div class="ttext" >
                            <a href="/graduation/Home/Topic/Index/top/<?php echo ($vo["top_id"]); ?>" title="<?php echo ($vo["name"]); ?>">
                                <?php echo ($vo["name"]); ?>
                            </a>
                        </div>
                    </td>
                    <td><?php echo ($vo["genre"]); ?></td>
                    <td><a href="/graduation/Home/Teacher/Teacher/tea/<?php echo ($vo["tea_number"]); ?>"><?php echo ($vo["tea_name"]); ?></a></td>
                    <td><?php echo ($vo["number"]); ?></td>
                    <td><?php echo ($vo["youxiao"]); ?></td>
                    <td><a href="/graduation/Student/Topic/Choose/top/<?php echo ($vo["top_id"]); ?>/xuan/<?php echo ($xuan); ?>">选择</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>	
        </tbody>

        <tfoot>
            <tr class="active">
                <td colspan="9">
                    <?php echo ($page); ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>