<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系主任设置各个专业的时间控制</title>
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/public.style.css"> 
        <link rel="shortcut icon" href="/graduation/static/images/icon.ico" />
        <script type="text/javascript" src="/graduation/static/js/jquery.min.js"> </script>
</head>
<body>
<br>
<script>
    function control(str){
       var s = document.getElementById(str);
       var s1 = document.getElementById(str+'1');
       var s2 = document.getElementById(str+'2');
       s2.value = '';
       s2.value = s.value+'  '+s1.value;
//        var p= $('#'+str+'2').val();
//        p = $('#'+str).val()+' '+$('#'+str+'1').val();
    } 
//    function checkab(a,b){
//        var s = document.getElementById(a);
//        var s2 = document.getElementById(b);
//        var a1 = new Date(s.value).getTime();
//        var b1 = new Date(s2.value);
//        alert(s.value);
//        if(a1>b1){
//            alert('开始时间不能大于结束时间');
//            s.value = s2.value;
//        }
//    }
</script>
<div class="container">
	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">
			<div class="panel panel-info">
				<div class="panel-heading">
                                    <h3 class="panel-title"><span class="red"><?php echo ($list["name"]); ?></span>各个阶段时间设置</h3>
				</div>
				<div class="panel-body">
                                    <form action="/graduation/Director/Index/AlterSettig" role="form" class="form-horizontal" method="post">
						<div class="form-group">
							<label for="firstname" class="col-sm-4 control-label">申请课题开始时间</label>
							<div class="col-sm-6">
                                                            <input type="date" class="input-sm" required id="s" onchange="control('s')" value="<?php echo ($list["topic_strat_y"]); ?>">
                                                            <input type="time" class="input-sm" id="s1" onchange="control('s')"  value="<?php echo ($list["topic_strat_m"]); ?>" />
							</div>
                                                        <label for="lastname" class="col-sm-4 control-label red"><?php echo ($errorInfo["topic_strat"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">申请课题结束时间</label>
							<div class="col-sm-6">
                                                            <input type="date" class="input-sm" required id="c" onchange="control('c')" value="<?php echo ($list["topic_close_y"]); ?>">
                                                            <input type="time" class="input-sm" id="c1" onchange="control('c')" value="<?php echo ($list["topic_close_m"]); ?>">
							</div>
                                                         <label for="lastname" class="col-sm-4 control-label red"><?php echo ($errorInfo["topic_close"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">学生选题开始时间</label>
							<div class="col-sm-6">
                                                            <input type="date" class="input-sm"  id="d" onchange="control('d')" value="<?php echo ($list["choice_strat_y"]); ?>">
                                                            <input type="time" class="input-sm" id="d1" onchange="control('d')" value="<?php echo ($list["choice_strat_m"]); ?>">
                                                        </div>
                                                        <label for="lastname" class="col-sm-4 control-label red"><?php echo ($errorInfo["choice_strat"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">学生选题结束时间</label>
							<div class="col-sm-6">
                                                            <input type="date" class="input-sm" required id="e" onchange="control('e')" value="<?php echo ($list["choice_close_y"]); ?>">
                                                            <input type="time" class="input-sm" id="e1" onchange="control('e')" value="<?php echo ($list["choice_close_m"]); ?>">
                                                          </div>
                                                        <label for="lastname" class="col-sm-4 control-label red"><?php echo ($errorInfo["choice_close"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">老师选学生开始时间</label>
							<div class="col-sm-6">
                                                            <input type="date" class="input-sm" required id="f" onchange="control('f')" value="<?php echo ($list["teacher_strat_y"]); ?>">
                                                            <input type="time" class="input-sm" id="f1" onchange="control('f')" value="<?php echo ($list["teacher_strat_m"]); ?>">
                                                         </div>
                                                         <label for="lastname" class="col-sm-4 control-label red"><?php echo ($errorInfo["teacher_strat"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">老师选学生结束时间</label>
							<div class="col-sm-6">
                                                            <input type="date" class="input-sm" required id="g" onchange="control('g')" value="<?php echo ($list["teacher_close_y"]); ?>">
                                                            <input type="time" class="input-sm" id="g1" onchange="control('g')" value="<?php echo ($list["teacher_close_m"]); ?>">
                                                       </div>
                                                         <label for="lastname" class="col-sm-4 control-label red"><?php echo ($errorInfo["teacher_close"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">论文提交结束时间</label>
							<div class="col-sm-6">
                                                            <input type="date" class="input-sm" required id="h" onchange="control('h')" value="<?php echo ($list["paper_close_y"]); ?>">
                                                            <input type="time" class="input-sm" id="h1" onchange="control('h')" value="<?php echo ($list["paper_close_m"]); ?>">
                                                        </div>
                                                        <label for="lastname" class="col-sm-4 control-label red"><?php echo ($errorInfo["paper_close"]); ?></label>
						</div>
						<div class="form-group">
                                                    <input type="hidden" name="name" value="<?php echo ($list["name"]); ?>" />
                                                    <input type="hidden" name="dep_id" value="<?php echo ($list["dep_id"]); ?>" />
                                                    <input type="hidden" name="topic_strat" id="s2" onchange="//checkab('s2','c2')" value="<?php echo ($list["topic_strat"]); ?>"/>
                                                    <input type="hidden" name="topic_close" id="c2" onchange="//checkab('s2','c2')"  value="<?php echo ($list["topic_close"]); ?>"/>
                                                    <input type="hidden" name="choice_strat" id="d2" onchange="//checkab('b2','e2')"  value="<?php echo ($list["choice_strat"]); ?>"/>
                                                    <input type="hidden" name="choice_close" id="e2" onchange="//checkab('b2','e2')" value="<?php echo ($list["choice_close"]); ?>"/>
                                                    <input type="hidden" name="teacher_strat" id="f2" onchange="//checkab('f2','g2')" value="<?php echo ($list["teacher_strat"]); ?>"/>
                                                    <input type="hidden" name="teacher_close" id="g2" onchange="//checkab('f2','g2')" value="<?php echo ($list["teacher_close"]); ?>"/>
                                                    <input type="hidden" name="paper_close" id="h2" value="<?php echo ($list["paper_close"]); ?>"/> 
						</div>
						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-7">
								<button type="submit" class="btn btn-info">保 存</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

</body>	
</html>