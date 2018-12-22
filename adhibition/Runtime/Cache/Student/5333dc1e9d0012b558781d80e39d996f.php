<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/graduation/static/css/bootstrap.min.css">  
        <link rel="stylesheet" href="/graduation/static/css/nav.css"> 
        <script src="/graduation/static/js/jquery.min.js"></script>
        <script src="/graduation/static/js/bootstrap.min.js"></script> 
        <title>学生查看自己的课题</title>
    </head>
    <body>
        <table class="table panel-info" >
            <thead>
                <!--			<tr>
                                                <th colspan="7">
                                                        <div class="smiddle">
                                                                课题名称：
                                                                <input type="text">
                                                        </div>
                                                </th>
                                        </tr>-->
                <tr class="success">
                    <th>任务书</th>
                    <th>开题报告</th>
                    <th>中期检查</th>
                    <th>指导老师评语</th>
                    <th>评阅老师评语</th>
                    <th>答辩小组评语</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="/graduation/Student/Word/Assignment.html">查看</a></td>
                    <td><a href="/graduation/Student/Report/Look.html">查看</a></td>
                    <td><a href="/graduation/Student/Inspect/Look.html">查看</a></td>
                    <td><a href="/graduation/Student/Word/Teacher.html">查看</a></td>
                    <td><a href="/graduation/Student/Word/Pingyu.html">查看</a></td>
                    <td><a href="/graduation/Student/Word/Dabian.html">查看</a></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>