<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    
    
<link rel="stylesheet" href="/graduation/static/css/common.css">
<link rel="stylesheet" href="/graduation/static/css/download_index.css">
<link rel="shortcut icon" href="/graduation/static/images/icon.ico" />
    
    
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/graduation/static/css/nav.css">
    <script src="/graduation/static/js/jquery.min.js"></script>
    <script src="/graduation/static/js/bootstrap.min.js"></script>  
    <title></title>
    <style>
        dl {
    margin-top: 0;
    margin-bottom: 0px;
}
    </style>

</head>
<body>
    <fieldset>
        <legend>校内公告</legend>
        <div class="container">
            <div class="resouces_tab_shows tab_nav J_tabSwitch">
                <div class="tab_con_box">
                    <div class="tab_page tab1_con">
                        <div class="album_detail_wrap">
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class="album_detail_list clearfix">
                                    <dt><a target="_blank" href="/graduation/Home/Gonggao/Index/id/<?php echo ($vo["id"]); ?>"><img src="/graduation/static/images/gong.jpg" alt="img"></a></dt>
                                    <dd><a target="_blank" href="/graduation/Home/Gonggao/Index/id/<?php echo ($vo["id"]); ?>" class="album_detail_title"><?php echo ($vo["title"]); ?></a>
                                        <div class="album_detail_bot clearfix">
                                            <label><span>发布时间：</span><em class="upl_time"><?php echo ($vo["publish"]); ?></em></label>
                                        </div>
                                    </dd>
                                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
        <fieldset>
        <legend>院内公告</legend>
        <div class="container">
  <div class="resouces_tab_shows tab_nav J_tabSwitch">
    <div class="tab_con_box">
      <div class="tab_page tab1_con">
        <div class="album_detail_wrap">
        <?php if(is_array($yuan)): $i = 0; $__LIST__ = $yuan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class="album_detail_list clearfix">
            <dt><a target="_blank" href="/graduation/Home/Gonggao/College/id/<?php echo ($vo["id"]); ?>"><img src="/graduation/static/images/gong.jpg" alt="img"></a></dt>
            <dd><a target="_blank" href="/graduation/Home/Gonggao/College/id/<?php echo ($vo["id"]); ?>" class="album_detail_title"><?php echo ($vo["title"]); ?></a>
              <div class="album_detail_bot clearfix">
                <label><span>发布时间：</span><em class="upl_time"><?php echo ($vo["publish"]); ?></em></label>
              </div>
            </dd>
          </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
    </fieldset>
</body>
</html>