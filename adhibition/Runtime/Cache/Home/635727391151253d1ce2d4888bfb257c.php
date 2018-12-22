<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>审核课题-详细</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <style>
        h2{
            text-align: center;
        }
        td{
            border:1px solid #000;
            padding: 10px;
        }
        tr{
            border:1px solid #000;
        }
    </style>
</head>
<body>
    <h2>大学生毕业设计课题申请表</h2>  
    <table cellspacing="0px">  
        <tbody> 
            <tr>  
                <td  width="140" height="50" align="center">课题名称</td>  
                <td width="500"><?php echo ($topic["name"]); ?></td>  
            </tr>   
            <tr>  
                <td height="40" align="center">结合科研</td>  
                <td ><?php echo ($topic["seientific"]); ?></td>
            </tr> 
            <tr>  
                <td height="40 align="center"">结合生产实践和社会实际</td>  
                <td ><?php echo ($topic["practice"]); ?></td>
            </tr>
            <tr>  
                <td height="40" align="center">题目类型</td>  
                <td > <?php echo ($topic["genre"]); ?></td>
            </tr>
            <tr>  
                <td height="65" align="center">主要研究内容及要求</td>
                <td width="470"><?php echo (htmlspecialchars_decode($topic["content"])); ?></td> 
            </tr>  
            <tr>  
                <td height="70" rowspan="1" align="center">指导教师</td>
                <td  height="40"><?php echo ($topic["tea_name"]); ?>（<?php echo ($topic["tea_number"]); ?>）<br></td>
            </tr>  
            
            <tr>  
                <td height="70" rowspan="1" align="center">选课适合的专业</td>
        
                <td   height="40"> 
        <?php if(is_array($zhuanye)): $i = 0; $__LIST__ = $zhuanye;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["dep_name"]); ?> <br><?php endforeach; endif; else: echo "" ;endif; ?>   
                </td>
            </tr>
            <tr>  
                <td height="60" align="center">附件</td>  
                <td >
                    <div style="width: 200px;margin: 0 auto;">
                        <?php echo ($topic["url"]); ?>
                    </div>
                </td> 
            </tr>  
        </tbody>
    </table>
</body>
</html>