<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>完善个人信息</title>
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/graduation/static/css/public.style.css"> 
        <link rel="shortcut icon" href="/graduation/static/images/logon.ico" />
</head>
<body>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-7">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">请完善个人信息</h3>
				</div>
				<div class="panel-body">
                        <form action="/graduation/Home/Complete/Teacher" role="form" class="form-horizontal" method="post">
						<div class="form-group">
							<label for="firstname" class="col-sm-3 control-label">姓名(<i style="color: red">必填</i>)</label>
							<div class="col-sm-6">
                                <input type="text" class="form-control" id="firstname" name="name" required placeholder="请输入姓名"  value="<?php echo (session('name')); ?>">
							</div>
                                <label for="lastname" class="col-sm-3 control-label red"><?php echo ($errorInfo["name"]); ?></label>
						</div>

						<div class="form-group">
							<label for="lastname" class="col-sm-3 control-label">常用邮箱(<i style="color: red">必填</i>)</label>
							<div class="col-sm-6">
                                <input type="email" name="email" class="form-control" required placeholder="请输入常用邮箱" >
							</div>
                            <label for="lastname" class="col-sm-3 control-label red"><?php echo ($errorInfo["email"]); ?></label>
						</div>
						
						<div class="form-group">
							<label for="lastname" class="col-sm-3 control-label">手机号码</label>
							<div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" placeholder="请输入手机号码"  pattern="1\d{10}" title="请输入您的手机号">
							</div>
                                <label for="lastname" class="col-sm-3 control-label red"><?php echo ($errorInfo["phone"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-3 control-label">QQ\微信</label>
							<div class="col-sm-6">
                                <input type="text" class="form-control" name="qq" placeholder="QQ\微信">
							</div>
                            <label for="lastname" class="col-sm-3 control-label red"><?php echo ($errorInfo["qq"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-3 control-label">职称</label>
							<div class="col-sm-6">
                               <input type="text" class="form-control" name="title" placeholder="请输入职称">
							</div>
                            <label for="lastname" class="col-sm-3 control-label red"><?php echo ($errorInfo["title"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-3 control-label">学历</label>
							<div class="col-sm-6">
                                <input type="text" class="form-control" name="education" placeholder="请输入学历">
							</div>
                            <label for="lastname" class="col-sm-3 control-label red"><?php echo ($errorInfo["education"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-3 control-label">职务</label>
							<div class="col-sm-6">
                                <input step="1" min="0" max="100" type="text" name="post1" class="form-control" placeholder="请输入职务"  >
							</div>
                            <label for="lastname" class="col-sm-3 control-label red"><?php echo ($errorInfo["post1"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-3 control-label">学术专长</label>
							<div class="col-sm-6">
                                <input step="1" min="0" max="100" type="text" name="acaspe" class="form-control" placeholder="请输入学术专长"  >
							</div>
                            <label for="lastname" class="col-sm-3 control-label red"><?php echo ($errorInfo["acaspe"]); ?></label>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-3 control-label">所在单位</label>
							<div class="col-sm-6">
                                <input step="1" min="0" max="100" type="text" name="belong" class="form-control" placeholder="请输入所在单位"  >
							</div>
                            <label for="lastname" class="col-sm-3 control-label red"><?php echo ($errorInfo["belong"]); ?></label>
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