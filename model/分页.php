<?php


//     college 
function chooseSubjects($xuan,$page=0){
        if($xuan != 1 && $xuan != 2 && $xuan != 3){
            $this->error(C('error_talk'),C('error_go'));
            exit();
        }
        //非盲选学生不能进入
        $type   =   session('stu_type');
        if($type != 0 && $type != 1){
            $this->error(C('error_talk'),C('error_go'));
            exit();
        }
        $dep    =   session('zhuanye');
        //$stu    =   session('stu_number');
        $User = M('view_topic'); // 实例化view_topic对象      
        //满足记录的条件：1、可选 2、已发布 3、通过系主任的审核 4、盲选课题 5、该课题可以给该专业选取 
        $count      = $User->where('opt= 1 and rele=1 and zy_audit=1 and top_type=1 and zy='. $dep)->count();// 查询满足要求的总记录数
        //分页
        $pagenum = ($page < 2 || (($page-1)*10)>$count)?0:($page-1)*10;
        //p($pagenum);
        $redult  =   $User->field('top_id,name,tea_number,tea_name,genre,number,youxiao')->where('opt= 1 and rele=1 and zy_audit=1 and top_type=1 and zy='. $dep)
                ->limit($pagenum,10)->select();// 查询已发布，可以选择，并且通过审核的课题，其实已经发布就可以了
        //p($redult);
//        p($count);
        
        $this->assign('list',$redult);
        $this->assign('xuan',$xuan);
        //$this->assign('list', $result);
        $pageView = getPageHtml($page,$count,__ROOT__.'/Student/Topic/chooseSubjects/xuan/'.$xuan);
        $this->assign('page',$pageView);
        $this->display();
    }

