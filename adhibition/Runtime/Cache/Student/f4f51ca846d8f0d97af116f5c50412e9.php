<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 

        <script src="/graduation/static/js/bootstrap.min.js"></script>
        <title>上传周进展</title>
        <link media="all" rel="stylesheet" type="text/css" href="/graduation/static/simditor-2.0.1/styles/font-awesome.css" />
        <link media="all" rel="stylesheet" type="text/css" href="/graduation/static/simditor-2.0.1/styles/simditor.css" />

        <script type="text/javascript" src="/graduation/static/simditor-2.0.1/scripts/jquery.min.js"></script>
        <script type="text/javascript" src="/graduation/static/simditor-2.0.1/scripts/module.js"></script>
        <script type="text/javascript" src="/graduation/static/simditor-2.0.1/scripts/uploader.js"></script>
        <script type="text/javascript" src="/graduation/static/simditor-2.0.1/scripts/simditor.js"></script>

    </head>
    <body>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">填写进展报告</h3>
            </div>
            <form action="<?php echo U('/Student/Inspect/Preserve');?>" method="POST" enctype="multipart/form-data" >
                <div class="panel-body">
                    <h3 style="text-align: center">填写中期检查</h3>
                    <h3>进展情况</h3>
                    <textarea id="research" name="progress" autofocus required><?php echo (htmlspecialchars_decode($li["research"])); ?></textarea>

                    <h3>上传附件【可选】：<input type="file" name="file"> </h3>
                    <h3 style="text-align: center">
                        <input type="submit" value="提交" class="btn btn-sm btn-info">
                    </h3>
                </div>

            </form>
        </div>
    </body>
    <script type="text/javascript">
        $(function () {
            toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough',
                'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|',
                'link', 'image', 'hr', '|', 'indent', 'outdent'];
            var editor = new Simditor({
                textarea: $('#research'),
                placeholder: '这里输入研究主要内容...',
                toolbar: toolbar, //工具栏
                defaultImage: 'simditor-2.0.1/images/image.png', //编辑器插入图片时使用的默认图片
                upload: {
                    url: '/graduation/Student/Upload/index', //文件上传的接口地址
                    params: null, //键值对,指定文件上传接口的额外参数,上传的时候随文件一起提交
                    fileKey: 'file', //服务器端获取文件数据的参数名
                    connectionCount: 3,
                    leaveConfirm: '正在上传文件'
                }
            });
        })
    </script>
</html>