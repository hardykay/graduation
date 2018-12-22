<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>中国石油大学胜利学院-毕业设计管理系统</title>
<link href="/graduation/static/index/css/owl.carousel.css" rel="stylesheet">
<link href="/graduation/static/index/css/owl.theme.default.min.css"  rel="stylesheet">
<link href="/graduation/static/index/css/animate.css" rel="stylesheet">
<link href="/graduation/static/index/css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="/graduation/static/images/icon.ico" />
<link href="/graduation/static/css/bootstrap.min.css" rel="stylesheet">
<script src="/graduation/static/js/jquery.min.js"></script> 
<script src="/graduation/static/js/bootstrap.min.js"></script> 
<style>
		.daohan{
			width: 100px;
			height: 100px;
			background-color: rgba(0,0,0,0.01);
			font-size: 50px;
			margin-left: 10px;
			margin-right: 10px;
			top:50%;
			margin-top: -50px;
			border-radius: 50%;
			line-height: 100px;
			display: none;
		}
		#myCarousel:hover .daohan{
			display: block;
		}
		.daohan:hover{
			background-color: #e5e5e5;
		}
	</style>
</head>
<body id="page-top">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
                    <a class="navbar-brand page-scroll" href="#page-top"><img style="height: 50px;" src="/graduation/static/images/logon.gif" alt="Sanza theme logo"></a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="hidden">
					<a href="#page-top"></a>
				</li>
<!--				<li>
					<a class="page-scroll" href="#page-top">首页</a>
				</li>-->

     <?php if(($_SESSION['tea_number']!= null) OR ($_SESSION['stu_number']!= null) ): ?><li><a href="<?php echo U('/Home/Index/Jinru');?>"> 进入系统</a></li>
         <li><a href="<?php echo U('/Home/Login/DropOut');?>"> 注销</a></li>
    <?php else: ?> 
    <li><a class="page-scroll" href="/graduation/Home/Index/Login.html">立即登录</a></li><?php endif; ?>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>

<div style="height: 81px;width: 100%"></div>
        <div>
            <div id="myCarousel" class="carousel slide">
                <!-- 轮播（Carousel）指标 -->
                
                
                <ol class="carousel-indicators">
                    <?php if(is_array($lun)): $i = 0; $__LIST__ = $lun;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($i) == "1"): ?><li data-target="#myCarousel" data-slide-to="<?php echo ($i-1); ?>" class="active"></li>
                        <?php else: ?>
                            <li data-target="#myCarousel" data-slide-to="<?php echo ($i-1); ?>"></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ol>   
                <!-- 轮播（Carousel）项目 -->
                <div class="carousel-inner">
                    <?php if(is_array($lun)): $i = 0; $__LIST__ = $lun;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($i) == "1"): ?><div class="item active">
                                <img style="width:100%" src="/graduation<?php echo ($vo["img"]); ?>" alt="First slide">
                            </div>
                        <?php else: ?>
                            <div class="item">
                                <img style="width:100%" src="/graduation<?php echo ($vo["img"]); ?>" alt="First slide">
                            </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <!-- 轮播（Carousel）导航 -->
                <!-- 轮播（Carousel）导航 -->
                <a class="carousel-control left daohan" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a  class="carousel-control right daohan" href="#myCarousel" data-slide="next">&rsaquo;
                </a>
            </div> 
        </div>

<section id="about" class="light-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="section-title">
					<h2>规定/模板</h2>
                                </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 text-center">
				<div class="mz-module">
					<div class="mz-module-about"  style="text-align: left;">
						 <?php if(is_array($gui)): $i = 0; $__LIST__ = $gui;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$w): $mod = ($i % 2 );++$i;?><p><span class="glyphicon glyphicon-play" style="color:#8A3D19"></span><a href="/graduation/Home/Gonggao/Govern/id/<?php echo ($w["id"]); ?>"><?php echo ($w["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </div>
					<a href="<?php echo U('/Home/Gonggao/Duogo');?>" class="mz-module-button">管理规定</a>
				</div>
			</div>
			<div class="col-md-6 text-center">
				<div class="mz-module">
                                    <div class="mz-module-about" style="text-align: left;">
                                        <?php if(is_array($word)): $i = 0; $__LIST__ = $word;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$w): $mod = ($i % 2 );++$i;?><p><span class="glyphicon glyphicon-play" style="color:#8A3D19"></span><a href="/graduation/Home/Index/dow/file/<?php echo (base64_encode($w["url"])); ?>"><?php echo ($w["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
					<a href="<?php echo U('/Home/Gonggao/Word');?>" class="mz-module-button">更多模板/表格</a>
                                        
				</div>
			</div>
			<!-- end about module -->
		</div>
	</div>
	<!-- /.container -->
</section>

<section id="features" class="section-features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="section-title">
					<h2>公告通知</h2>
				</div>
			</div>
		</div>
		<div class="row row-gutter">
			<div class="col-md-4 col-gutter">
                            <?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="featured-item">
					<div class="featured-text">
                                            <a href="/graduation/Home/Gonggao/Index/id/<?php echo ($vo["id"]); ?>"><h4><?php echo ($vo["title"]); ?></h4></a>
						<p><?php echo ($vo["publish"]); ?></p>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="col-md-4 col-gutter">
                            <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="featured-item">
					<div class="featured-text">
                                            <a href="/graduation/Home/Gonggao/Index/id/<?php echo ($vo["id"]); ?>"><h4><?php echo ($vo["title"]); ?></h4></a>
						<p><?php echo ($vo["publish"]); ?></p>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="col-md-4 col-gutter">
                            <?php if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="featured-item">
					<div class="featured-text">
                                            <a href="/graduation/Home/Gonggao/Index/id/<?php echo ($vo["id"]); ?>"><h4><?php echo ($vo["title"]); ?></h4></a>
						<p><?php echo ($vo["publish"]); ?></p>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
                    <div class="col-md-10 col-gutter"></div><a href="<?php echo U('/Home/Gonggao/Gong');?>"><div class="col-md-2 col-gutter">更多公告 &gt;&gt;&gt; </div></a>
		</div>
	</div>
</section>


<footer>
	<div class="container text-center">
		<p>版权所有:<a href="http://www.slcupc.edu.cn" target="_blank" title="中国石油大学胜利学院">中国石油大学胜利学院</a></p>
	</div>
</footer>
<script src="<?php echo '/graduation/static/index/';?>js/jquery.min.js"></script>
<script src="<?php echo '/graduation/static/index/';?>js/jquery.easing.min.js"></script>
<script src="<?php echo '/graduation/static/index/';?>js/bootstrap.min.js"></script>
<script src="<?php echo '/graduation/static/index/';?>js/owl.carousel.min.js"></script>
<script src="<?php echo '/graduation/static/index/';?>js/cbpAnimatedHeader.js"></script>
<script src="<?php echo '/graduation/static/index/';?>js/jquery.appear.js"></script>
<script src="<?php echo '/graduation/static/index/';?>js/SmoothScroll.min.js"></script>
</body>
</html>