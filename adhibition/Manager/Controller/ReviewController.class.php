<?php
namespace Manager\Controller;
use Think\Controller;
use Think\Model;

class ReviewController extends Controller {
      public function college() {
        obtain();
        $Model = M();
        $Count      = $Model->table('tp_teacher')->field('dep_id,count(*) as number')->group('dep_id')->buildSql();
        $result     = $Model->table("tp_college c,($Count) p ")->field('c.dep_id,c.dep_name,p.number')->where('c.dep_id=p.dep_id')->select();
        $this->assign('list', $result);
        $this->display('College');
    }
    public function index($dep){
        // obtain();
        // $review     = M('Review')->field('dep_id,count(*) as review_count')->group('dep_id')->buildSql();
        // $student    = M('Student')->field('dep_major,count(*) as student_count')->group('dep_major')->buildSql();
        // $sql = array("LEFT JOIN ({$student}) s ON s.dep_major = specialty.dep_id","LEFT JOIN $review  r ON r.dep_id = specialty.dep_id");
        // $result     = M('specialty')->join($sql)->select();
        // // $result     = M()->table("({$review}) r,({$student}) s,tp_specialty p")->field('p.dep_id,p.dep_name as name,r.review_count,s.student_count,(s.student_count-r.review_count) as undistibute')
        // //                   ->where('r.dep_id=p.dep_id and s.dep_major=p.dep_id and p.dep_father='.$dep)->select();
        // p($result);
        // $this->assign('list', $result);
        // $this->assign('college', $dep);
        // $this->display();
          obtain();
        //echo session('dep');

        $college = M('specialty')->field('dep_id')->where('dep_father='.$dep)->select();
        //p($dep);
        $r = M('Review');
        $s = M('Student');
        $d = M('specialty');
        foreach ($college as $key => $val ){
            //统计专业学生人数
            //p( $val['dep_id']);
            $data[$key]['dep'] = $val['dep_id'];
            $data[$key]['review_count'] = $r->where('dep_id='.$val['dep_id'])->count('stu_number');
            $data[$key]['student_count'] = $s->where('dep_major='.$val['dep_id'])->count('stu_number');
            $name = $d->field('dep_name')->where('dep_id='.$val['dep_id'])->find();
            $data[$key]['name'] = $name['dep_name'];
            $data[$key]['undistribute'] = $data[$key]['zz'] - $data[$key]['fz'];
        }
        //p($data);
        $this->assign('list', $data);
        $this->assign('college',$dep);
        $this->display();
    }
    
    /**
     * 从专业进来，就看到这个学院的教师，及分配给其的学生的人数
     * @param type $dep
     * @param type $page
     */
    public function teacher($dep,$college,$page=0){//$dep专业
        obtain();
        $dep_id = $college;
        $dep = is_numeric($dep)?$dep:$this->error('请求超时.'); 
        $T = M('Teacher');
        $count = $T->where('dep_id='.$dep_id)->count();
        //分页
        $pagenum = ($page < 2 || (($page-1)*10)>$count)?0:($page-1)*10;
        $result = $T->field('tea_number,name')->where('dep_id='.$dep_id)->order('tea_number asc')->limit($pagenum,10)->select();
        if(!$result){
            echo '不好意思，没查到相关教师信息';
            exit;
        }
        $R  = M('review');
        foreach ($result as $key => $value) {
           // p($value);
            $result[$key]['cou'] = $R->where('tea_number=\''.$value['tea_number'].'\'')->count();
        }
        //p($result);
        $this->assign('dep',$dep);
        $this->assign('list', $result);
        $page = getPageHtml($page,$count,__ROOT__."/Manager/Review/Teacher/dep/{$dep}/college/{$college}");
        $this->assign('page',$page);
        $this->display();
    }
    /**
     * 给指导老师分配学生
     * @param type $dep专业
     * @param type $page页码
     */
     public function student($dep,$tea,$name,$num,$page=0){//$dep专业
         obtain();
         $college = session('dep_id');
         $dep = is_numeric($dep)?$dep:$this->error('请求超时.'); 
         
         //$d = M('specialty')->field('dep_name')->where('dep_id='.$dep)->find();
         //专业及教师信息
         $data['dep_id'] = $dep;
         $data['tea'] = $tea;
         $data['name'] = base64_decode($name);
         $data['num'] = $num;
         //$data['dep_name'] = $d['dep_name'];
         //去课题表找到指导老师所带的课题
         $sqltop = M('Topic')->field('top_id')->where('tea_number=\''.$tea.'\'')->buildSql();
         //再去选题表找学生，出去教师自己带的学生
         $sqlstu = M('stu_topic')->field('stu_number')->where('top_id in'.$sqltop)->buildSql();
         
         $sql = M('review')->field('stu_number')->where('dep_id='.$dep)->buildSql();
         $m = M('Student');
         $count =$m ->where('dep_major='.$dep.' and dep_college='.$college.' and stu_number not in'.$sql.' and stu_number not in'.$sqlstu)
                 ->count();
        //分页
     
        $pagenum = ($page < 2 || (($page-1)*10)>$count)?0:($page-1)*10;
        //$result = $T->field('tea_number,name')->where('adviser=1 and dep_id='.$dep_id)->limit($pagenum,10)->select();
        //班级 专业 学生
         $res = $m->table('tp_specialty d,tp_student s,tp_class c')
                 ->field('d.dep_name,s.name,s.stu_number,c.dep_name as cname')
                 ->where('c.dep_id=s.dep_class and s.dep_major=d.dep_id and  s.dep_major='.$dep.' and s.dep_college='.$college.' and s.stu_number not in'.$sql.' and stu_number not in'.$sqlstu)
                 ->order('s.stu_number asc')->limit($pagenum,10)->select();
         empty($res)?$this->error('该专业的学生已分配完全，或者剩余的学生是该教师所带学生'):1;
         $this->assign('data', $data);
         $this->assign('list', $res);
         //($dep,$tea,$name,$num,$page=0)
         $page = getPageHtml($page,$count,__ROOT__."/Manager/Review/Student/dep/{$dep}/tea/{$tea}/name/{$name}/num/{$num}");
         $this->assign('page',$page);
         $this->display();
     }
     public  function fenpei(){
         obtain();
         $arr = filter_input_array(INPUT_POST);
         empty($arr)?$this->error('请求超时'):0;
          //$data[] = array();
         foreach ($arr['checkbox'] as $value) {
             $data[] = array('tea_number'=>$arr['tea_number'],'dep_id'=>$arr['dep_id'],'stu_number'=>$value);
         }
         $Model = M('review');
         if($Model->addAll($data)){
             $this->success('分配成功',U('Review/Index'));
         }else{
             $this->error($Model->getError());
         }
     }
       //view_review_teacher_student_topic
    public function reviewView($dep,$page=0) {
        obtain();
        $User = M('view_review_teacher_student_topic');
        $count = $User->where('dep_id=' . $dep)->count(); // 查询满足要求的总记录数
        //分页
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        //p($pagenum);
        $result = $User->where('dep_id=' . $dep)->order('stu_number')
                        ->limit($pagenum, 10)->select(); // 查询已发布，可以选择，并且通过审核的课题，其实已经发布就可以了
        
        //$result = M('view_review_teacher_student_topic')->where('dep_id=' . $dep)->order('stu_number')->select();
        //p($result);
        $this->assign('list', $result);
        $pageView = getPageHtml($page, $count, __CONTROLLER__ . '/ReviewView/dep/' . $dep);
        $this->assign('page', $pageView);
        $this->display('ReviewView');
    }
    public function deleteReview($stu){
        obtain();
        $data['stu_number'] = $stu;
        if(M('overall')->where("stu_number='{$stu}' and pingyuegrade is not null")->find()){
            $this->error('移除失败，该学生的成绩已被评阅老师评阅！');
        }
        if(M('Review')->where($data)->delete()){
            $this->success('成功移除！');
        }else{
            $this->error('移除失败');
        }
    }
}
