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
				<th>愿次</th>
				<th>课题名称</th>
				<th>题目类型</th>
				<th>指导老师</th>
				<th>进入选题</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td class="twidth">
					<div class="ttext" >
	    				<a href="/graduation/Home/Topic/Index/top/<?php echo ($list1["top_id"]); ?>" title="<?php echo ($list1["name"]); ?>">
	    					<?php echo ($list1["name"]); ?>
	    				</a>
					</div>
				</td>
				<td><?php echo ($list1["genre"]); ?></td>
				<td><a href="/graduation/Home/Teacher/Teacher/tea/<?php echo ($list1["tea_number"]); ?>"><?php echo ($list1["tea_name"]); ?></a></td>
                                <td>
                                     <?php if(($list1["top_id"]) == ""): ?><a href="/graduation/Student/Topic/ChooseSubjects/xuan/1">进入选题</a>
                                        <?php else: ?>
                                        <a href="/graduation/Student/Topic/Cancel/xuan/1/top/<?php echo ($list1["top_id"]); ?>">取消</a><?php endif; ?>
                                </td>
			</tr>
			<tr>
				<td>2</td>
				<td class="twidth">
					<div class="ttext" >
	    				<a href="/graduation/Home/Topic/Index/top/<?php echo ($list2["top_id"]); ?>" title="<?php echo ($list2["name"]); ?>">
	    					<?php echo ($list2["name"]); ?>
	    				</a>
					</div>
				</td>
				<td><?php echo ($list2["genre"]); ?></td>
				<td><a href="/graduation/Home/Teacher/Teacher/tea/<?php echo ($list2["tea_number"]); ?>"><?php echo ($list2["tea_name"]); ?></a></td>
                                <td>
                                     <?php if(($list2["top_id"]) == ""): ?><a href="/graduation/Student/Topic/ChooseSubjects/xuan/2">进入选题</a>
                                        <?php else: ?>
                                        <a href="/graduation/Student/Topic/Cancel/xuan/2/top/<?php echo ($list2["top_id"]); ?>">取消</a><?php endif; ?>
                                </td>
			</tr>
			<tr>
				<td>3</td>
				<td class="twidth">
					<div class="ttext" >
	    				<a href="/graduation/Home/Topic/Index/top/<?php echo ($list3["top_id"]); ?>" title="<?php echo ($list3["name"]); ?>">
	    					<?php echo ($list3["name"]); ?>
	    				</a>
					</div>
				</td>
				<td><?php echo ($list3["genre"]); ?></td>
				<td><a href="/graduation/Home/Teacher/Teacher/tea/<?php echo ($list3["tea_number"]); ?>"><?php echo ($list3["tea_name"]); ?></a></td>
				<td>
                                     <?php if(($list3["top_id"]) == ""): ?><a href="/graduation/Student/Topic/ChooseSubjects/xuan/3">进入选题</a>
                                        <?php else: ?>
                                        <a href="/graduation/Student/Topic/Cancel/xuan/3/top/<?php echo ($list3["top_id"]); ?>">取消</a><?php endif; ?>
                                    
                                </td>
			</tr>
		</tbody>
	</table>
    	<fieldset>
        <legend>相关提示</legend>
        <div style="margin: 0 auto;width: 80%">
            <h3>参与选题的各位同学注意一下几点：</h3>
            <p>一、1，2，3志愿，不是老师选择你的顺序，而仅仅是你有三个选择的权利，因此，请同时选择三个自愿的同学慎重考虑，以免被导师误选。（最后没有选择课题的同学，系统会以志愿次序作为主要分配依据。）</p>
            <p>二、这不是抢课题，而是双选，即师生双方选择。因此，同学生不要着急，同时请时时关注，以免三个志愿都未被选上，未被选上的志愿，又可以重新选择课题，直到选题时间结束。
            </p>
            <p>  三、未被选上的同学，请及时联系系主任。</p>            
        </div>
      
    </fieldset>
</body>
</html>