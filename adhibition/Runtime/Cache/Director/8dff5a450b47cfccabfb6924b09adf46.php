<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>选择课题</title>
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/graduation/static/css/nav.css">
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script>
    <script > 
    function xuan(){
            //获取name值
            var qcheck=document.getElementsByName("checkbox[]");
                for(var i=0;i<=qcheck.length;i++){
                    qcheck[i].checked=true;
                }
            }
    </script>
</head>
<body>
<!--<br>
--><form action="/graduation/Director/Topic/Pichuli.html" method="POST">
    <table class="table panel-info bshadow" >
        <thead>
<!--                <tr>
                    <th colspan="8" >课程名称：<input type="text">申报教师：<input type="text"> 状态：<select  name="select" id=""><option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select><input type="submit" name="submit" value="查询">
                        </th>
                </tr>-->
                <tr>
                    <th colspan="8" ><a href="/graduation/Director/Topic/Look">查看已审核的课题</a></th>
                </tr>
                <tr>
                    <th><button type="button" onclick="xuan()">全选</button></th>
                    <th>课题名称</th>
                    <th>课题类型</th>
                    <th>申报教师</th>
                    <th>选题方式</th>
                    <th>信息操作</th>
                    <th>状态</th>
                </tr>
            </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><input type="checkbox" name="checkbox[]" value="<?php echo ($vo["top_id"]); ?>"></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["genre"]); ?></td>
                    <td><?php echo ($vo["tea_name"]); ?>[工号:<?php echo ($vo["tea_number"]); ?>]</td>
                    <td>
                        <?php switch($vo["top_type"]): case "1": ?>盲选<?php break;?>
                            <?php case "2": ?>指定选<?php break;?>
                            <?php case "3": ?>团队课题<?php break;?>
                            <?php case "4": ?>外出毕设<?php break;?>
                            <?php default: ?>类型未知<?php endswitch;?>
                    </td>
                    
                    <td><a href="/graduation/Director/Topic/ReviewProcess2/top/<?php echo ($vo["top_id"]); ?>/i/<?php echo ($vo["top_type"]); ?>" >立即审核</a><span class="red"> | </span><a href="/graduation/Director/Topic/Word/top/<?php echo ($vo["top_id"]); ?>/tea/<?php echo (base64_encode($vo["tea_name"])); ?>/name/<?php echo (base64_encode($vo["name"])); ?>" target="_blank">导出</a></td>
                    <td>未审核</td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>   
            </tbody>

        <tfoot>
            <tr class="active">
                    
                <td colspan="9">
                    <button style="float: left;margin-right: 20px;margin-top: 15px;" value="1" name="submit" class="btn btn-success">批量通过</button><button style="float: left;margin-top: 15px;" class="btn btn-success" value="2" name="submit">批量退回</button>
                    <?php echo ($page); ?>
                </td>
            </tr>
        </tfoot>
    </table>
</form>

</body>
</html>