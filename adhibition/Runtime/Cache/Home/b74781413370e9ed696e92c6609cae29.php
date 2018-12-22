<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>审核课题-详细</title>
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/graduation/static/css/nav.css">
    <link rel="stylesheet" href="/graduation/static/css/7.2.style.css">
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
<div class="col-xs-12 col-sm-1" ></div>
<div class="col-xs-12 col-sm-10" >
    <h2>大学生毕业设计课题申请表</h2>  
    <table border="1"  class="table panel-info" >  
        <tbody> 
            <tr>  
                <td  class="col-sm-2" align="center">课题名称</td>  
                <td class="col-sm-10"><?php echo ($topic["name"]); ?></td>  
            </tr>   
            <tr>  
                <td height="40">结合科研</td>  
                <td ><?php echo ($topic["seientific"]); ?></td>
            </tr> 
            <tr>  
                <td height="40">结合生产实践和社会实际</td>  
                <td ><?php echo ($topic["practice"]); ?></td>
            </tr>
            <tr>  
                <td height="40">题目类型</td>  
                <td > <?php echo ($topic["genre"]); ?></td>
            </tr>
            <tr>  
                <td height="65" >主要研究内容及要求</td>
                <td width="470" style="text-align: left"><?php echo (htmlspecialchars_decode($topic["content"])); ?></td> 
            </tr>  
            <tr>  
                <td height="70" rowspan="1">指导教师</td>
                <td  height="40"><?php echo ($topic["tea_name"]); ?>（<?php echo ($topic["tea_number"]); ?>）<br></td>
            </tr>  
            
            <tr>  
                <td height="70" rowspan="1">选课适合的专业</td>
        
                <td   height="40"> 
        <?php if(is_array($zhuanye)): $i = 0; $__LIST__ = $zhuanye;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["dep_name"]); ?> <br><?php endforeach; endif; else: echo "" ;endif; ?>   
                </td>
            </tr>
            
            <tr>  
                <td height="70" rowspan="1">学生</td>
        
                <td   height="40"> 
                    <?php if(is_array($stu)): $i = 0; $__LIST__ = $stu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["name"]); ?>[<?php echo ($vo["stu_number"]); ?>] <br><?php endforeach; endif; else: echo "" ;endif; ?>   
                </td>
            </tr>
            <tr>  
                <td height="60">选题模式</td>  
                <td >
                   <?php switch($topic["top_type"]): case "1": ?>盲选<?php break;?>
                      <?php case "2": ?>指定选<?php break;?>
                      <?php case "3": ?>团队课题<?php break;?>
                      <?php case "4": ?>外出毕设<?php break; endswitch;?>
                </td> 
            </tr> 
            <tr>  
                <td height="60">附件</td>  
                <td >
                    <div style="width: 200px;margin: 0 auto;">
                       <?php if(empty($topic["url"])): ?>无<?php else: ?><a href="/graduation/<?php echo ($topic["url"]); ?>">下载</a><?php endif; ?>
                    </div>
                </td> 
            </tr>  
         
        </tbody>
    </table>
   </div>
   </div>
</body>
</html>