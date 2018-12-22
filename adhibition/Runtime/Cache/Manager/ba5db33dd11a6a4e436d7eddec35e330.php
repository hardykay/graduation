<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>演示：Thinkphp数据库在线备份下载和还原</title>
        <meta name="keywords" content="Thinkphp数据库备份,数据库操作" />
        <meta name="description" content="本文以实例演示了Thinkphp数据库备份、下载和还原，你也可以简单的改成不基于Thinkphp的框架的PHP代码，很方便的应用到你的后台数据库管理应用中。" />
        <link rel="stylesheet" type="text/css" href="/graduation/static/bak/common.css" />
    </head>
    <body style="padding-left: 20px;padding-right: 20px;">
                <table class="table_parameters" border="0" cellSpacing="0" cellPadding="0" width="100%">
                    <tbody>
                        <tr class="tr_head">
                            <th width="40px">序号</th>
                            <th>文件名</th>
                            <th width="150px">备份时间</th>
                            <th width="130px">文件大小</th>
                            <th width="100px">操作</th>

                        </tr>
                        <?php if(!empty($lists)): if(is_array($lists)): foreach($lists as $key=>$row): if($key > 1): ?><tr>
                                        <td><?php echo ($key-1); ?></td>
                                        <td style="text-align: left"><a href="<?php echo U('Bak/index',array('Action'=>'download','file'=>$row));?>"><?php echo ($row); ?></a></td>
                                        <td><?php echo (getfiletime($row,$datadir)); ?></td>
                                        <td><?php echo (getfilesize($row,$datadir)); ?></td>
                                        <td>
                                            <a href="<?php echo U('Bak/index',array('Action'=>'download','file'=>$row));?>">下载</a>
                                            <a onclick="return confirm('确定将数据库还原到当前备份吗？')"href="<?php echo U('Bak/index',array('Action'=>'RL','File'=>$row));?>">还原</a>
                                            <a onclick="return confirm('确定删除该备份文件吗？')"href="<?php echo U('Bak/index',array('Action'=>'Del','File'=>$row));?>">删除</a>
                                        </td>
                                    </tr><?php endif; endforeach; endif; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="7">没有找到相关数据。</td>
                            </tr><?php endif; ?>
                    </tbody>
                </table>
                <p>     
                    <a style="margin-right: 100px;" class="btn" type="button" onClick="location.href = '/graduation/Manager/Bak/index/Action/backup'">备份添加</a>
                    <a class="btn" type="button" onClick="confirm('请确认本届学生毕业设计及答辩已经结束，或者刚刚开始！')?location.href = '/graduation/Manager/Backup/vacumup':0" >备份及初始化</a>
                </p>
        <p>注意：备份的数据库无法添加触发器（能力有限），请需要恢复备份数据的老师及同学手动添加触发器，这些触发器是系统必须，否则无法正常运行，建议备份及恢复数据都进行手动，以免造成数据丢失。谢谢合作！
            <br>触发器的内容：<a href="/graduation/Manager/Bak/trigger">查看</a>
                <br>
                    "毕设初始化"将会清空除教师、学院、公告等以外的数据表，即清空与学生相关的所有信息，请领导们确认毕业设计已经结束，方可进行此操作。<br>
                        <b style="color:red">特别注意：非必须，莫要启用还原功能，切记切记。</b>
        </p>
    </body>
</html>