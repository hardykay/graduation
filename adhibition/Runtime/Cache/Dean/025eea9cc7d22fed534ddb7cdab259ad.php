<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
<link rel="stylesheet" href="/graduation/static/css/public.style.css"> 
<link rel="stylesheet" href="/graduation/static/css/ApplyFor.css"> 
<script src="/graduation/static/js/jquery.min.js"></script>
<script src="/graduation/static/js/bootstrap.min.js"></script> 
    <title>大学生毕业设计课题申请表</title>  
        
        <link rel="stylesheet" type="text/css" href="/graduation/static/Redactor/css/style.css" /> 	
	<script type="text/javascript" src="/graduation/static/Redactor/lib/jquery-1.7.min.js"></script>	
	<link rel="stylesheet" href="/graduation/static/Redactor/redactor/css/redactor.css" />
	<script src="/graduation/static/Redactor/redactor/redactor.js"></script>
	
	<script type="text/javascript">
	$(document).ready(
		function()
		{
			 $('#redactor').redactor({
                            lang: "zh_cn",
                            wym: true,
                            air: true,
                        });
		}
	);
	</script>
</head>  
<body>
<h2>大学生毕业设计课题申请表</h1>  

<form action="<?php echo U('Team/Post1');?>" method="post" enctype="multipart/form-data" >
<div class="container">
	<table  class="table table-bordered" align="center" >
            <tr>  
                <td width="140" height="50" class="col-sm-2">课题名称</td>  
                <td width="470" colspan="6"><?php echo ($data["name"]); ?></td>  
            </tr> 
            <tr>  
                <td height="40">题目类型</td>  
                <td class="bcolor"  colspan="6"> <?php echo ($data["genre"]); ?>
                </td>
            </tr>
            <tr>  
                <td height="40">结合科研</td>  
                <td class="bcolor"  colspan="6"> <?php echo ($data["seientific"]); ?>
                </td>
            </tr> 
            <tr>  
                <td height="40">结合生产实践和社会实际</td>  
                <td class="bcolor"  colspan="6"> <?php echo ($data["practice"]); ?>
                </td>
            </tr>
            <tr>  
                <td height="65" >主要研究内容及要求(分工)</td>
                <td width="470" colspan="6"><?php echo (htmlspecialchars_decode($data["content"])); ?></td> 
            </tr>  
            <tr>  
                <td height="70">课题模式</td>
                <td class="bcolor"  colspan="6"  height="40"> 
                    团队课题
                </td>
            </tr>
            <tr>  
                <td height="65" >学生</td>
                <td width="470" colspan="6">
          <?php if(is_array($stu)): $i = 0; $__LIST__ = $stu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="margin-top: 10px;">（<?php echo ($i); ?>）学院：<?php echo ($vo["college"]); ?>; 专业：<?php echo ($vo["specialty"]); ?>; 班级：<?php echo ($vo["class"]); ?>; 姓名：<?php echo ($vo["name"]); ?>; 学号：<?php echo ($vo["stu_number"]); ?><br> </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </td> 
            </tr> 
            <tr>  
                <td height="60">附件</td>  
                <td colspan="6" >
            <?php if(empty($data["url"])): ?>无<?php else: ?><a href="/graduation/<?php echo ($data["url"]); ?>">附件下载</a><?php endif; ?>
                </td> 
            </tr>  
            
            <tr>  
                <td height="40">审核结果</td>  
                <td class="bcolor"  colspan="6">
                    <select name="audit" class="input-lg">
                        <option value="">请选择</option>
                        <option value="1" <?php if(($data["audit"]) == "1"): ?>selected<?php endif; ?>>同意</option>
                        <option value="2" <?php if(($data["audit"]) == "2"): ?>selected<?php endif; ?>>退回修改</option>
                    </select>
                </td>
            </tr>
            <tr>  
                <td height="65" >教学院长审核的意见</td>
                <td width="470" colspan="6"><textarea id="redactor" class="input2" name="advice"><?php echo (htmlspecialchars_decode($data["advice"])); ?></textarea></td> 
            </tr> 
        </table>
</div>
          <br>
         <div style="width: 100px;margin: 0 auto;">
            <input value="<?php echo ($data["top_id"]); ?>" type="hidden" name="top_id">
            <button type="submit" class="btn btn-primary" >提交</button>
        </div>
        <br><br><br>
</form>
        <div style="width:610px;margin:0 auto;">  
            <p style="float: left;">注：1、以上内容要求申请人填写完整</p>  
            <p style="text-indent:2em;float: left;">2、本表解释权归学校所有</p>  
        </div>  
 
</body>  
</html>