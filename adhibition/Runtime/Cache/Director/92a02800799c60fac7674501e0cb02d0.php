<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>审核课题-详细</title>
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/nav.css">
        <link rel="stylesheet" href="/graduation/static/css/7.2.style.css">
        <script src="/graduation/static/js/bootstrap.min.js"></script>
        
        <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="/graduation/static/Redactor/css/style.css" /> 	
	<script type="text/javascript" src="/graduation/static/Redactor/lib/jquery-1.7.min.js"></script>	
	<link rel="stylesheet" href="/graduation/static/Redactor/redactor/css/redactor.css" />
	<script src="/graduation/static/Redactor/redactor/redactor.js"></script>
	
	<script type="text/javascript">
	$(document).ready(
		function()
		{
			 $('#redactor').redactor({
                            fixed: true,
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
		}
	);
	</script>
    </head>
    <body>
        <div class="row">
            <div class="col-xs-12 col-sm-1" ></div>
            <div class="col-xs-12 col-sm-10" >
                <h2>大学生毕业设计课题申请表</h2>  
                <table border="1"  class="table panel-info" >  
                    <thead>
                        <tr>
                            <th class="col-sm-2">名称</th>
                            <th class="col-sm-10">内容</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr>  
                            <td width="140" height="50" align="center">课题名称</td>  
                            <td width="470"><?php echo ($topic["name"]); ?></td>  
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
                            <td width="470" style="text-align:left"><?php echo (htmlspecialchars_decode($topic["content"])); ?></td> 
                        </tr>  
                        <tr>  
                            <td>指导教师</td>
                            <td ><?php echo ($topic["tea_name"]); ?>（<?php echo ($topic["tea_number"]); ?>）<br></td>
                        </tr>  
                    <?php if(empty($stu["stu_number"])): else: ?>
                        <tr>  
                            <td>学生</td>
                            <td ><b>专业：</b><?php echo ($stu["dep_name"]); ?><i class="i"></i><i class="i"></i><b>姓名：</b><?php echo ($stu["name"]); ?> <i class="i"></i><i class="i"></i><b>学号：</b><?php echo ($stu["stu_number"]); ?></td>
                        </tr><?php endif; ?>
                    <tr>  
                        <td>选课适合的专业</td>

                        <td> 
                    <?php if(is_array($zhuanye)): $i = 0; $__LIST__ = $zhuanye;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["dep_name"]); ?> <br><?php endforeach; endif; else: echo "" ;endif; ?>   
                    </td>
                    </tr>
                    <tr>  
                        <td>附件</td>  
                        <td >
                    <?php if(empty($topic["url"])): ?><b class="huise">无</b>
                        <?php else: ?>
                        <a href="/graduation/Home/Index/Download/url/<?php echo (base64_encode($topic["url"])); ?>/name/<?php echo (base64_encode($topic["name"])); ?>/tea/<?php echo (base64_encode($topic["tea_name"])); ?>">附件下载</a><?php endif; ?>

                    </td> 
                    </tr>  
                    </tbody>
                </table>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-1" ></div>
            <div class="col-xs-12 col-sm-10" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">审核课题</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo U('Topic/ReviewProcess3');?>" enctype="multipart/form-data" method="post">
                            <input name="top" type="hidden" value="<?php echo ($topic["top_id"]); ?>">

                            <?php switch($topic["audit"]): case "0": ?><div class="form-group">
                                    <label for="name">评语【<span class="red">可以为空</span>】</label>
                                    <textarea class="form-control" rows="15" id="redactor" name="advice"></textarea>
                                </div>
                                <div style="clear:both;width: 100%;">
                                    <div class="shjg">
                                        <label class="red ">
                                            审核结果：
                                        </label>
                                        <select name="audit" >
                                            <option selected = "selected"  value="1" name="audit">通过</option>
                                            <option value="2">未通过</option>
                                        </select>
                                    </div>
                                    <div class="file" >
                                        上传附件【<span class="red">可选</span>】
                                        <input class="right" type="file" name="file">
                                    </div>
                                </div><?php break;?>
                            <?php case "1": ?><input name="i" type="hidden" value="1">
                                <div>
                                    <label class="red ">
                                        审核结果：
                                    </label>
                                    <select name="audit" >
                                        <option selected = "selected"  value="1" name="audit">同意</option>
                                        <option value="0">不同意</option>
                                    </select>
                                </div><?php break;?>
                            <?php default: ?>该课题不能审核<?php endswitch;?>
                            <h1>&nbsp;</h1>
                            <div>
                                <input type="button"  class="btn btn-success col-sm-offset-4 col-sm-1" onclick="window.history.go(-1)" value="返回" >
                                <input type="submit" id="fat-btn" class="btn btn-success col-sm-offset-1  col-sm-1" value="提交" > 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>