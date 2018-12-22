<?php
namespace Dean\Controller;
use Think\Controller;
/**
 * 抽查学生论文信息
 */
class GradeController extends Controller {
 
    /**
     * 显示该学院所有专业，及学生信息
     * @param type $dep 学院
     */
    public function index(){
        obtain();
        $dep = session('dep_id');
        $sql = M('specialty')->field('dep_id')->where('dep_father='.$dep)->buildSql();
        $ov = M('Overall')->field('z_id,z_name,count(*) as renshu,'
                . 'sum( case when score>=90 then 1 else 0 end ) as you,'
                . 'sum( case when (score>=80 and score<90) then 1 else 0 end ) as lang,'
                . 'sum( case when (score>=70 and score<80 ) then 1 else 0 end ) as zhong,'
                . 'sum( case when (score>=60 and score<70 ) then 1 else 0 end ) as jige,'
                . 'sum( case when (score>=0 and score<60 ) then 1 else 0 end ) as bujige')
                ->where('z_id in '.$sql)->group('z_id,z_name')->buildSql();
        $stud = M('Student')->field('dep_major,count(*) as zong')->group('dep_major')->buildSql();
        $result = M()->table("($ov) ov,({$stud}) s ")->field('*')->where('ov.z_id=s.dep_major')->select();
        
        //p($result);
        $this->assign('list',$result);
        $this->display();
    }
    /**
     * 
     * @param type $dep
     * @param type $name打印某个专业的成绩
     */
    public function speExcel($dep,$name){
//        obtain();
//        $m = M('view_grade');
//        $data = $m->field('stu_number,stu_name,top_name,tea_name,z_name,b_name,grade,zdgrade,pingyuegrade,dabiangrade,score,genera')
//                ->where('dep_major='.$dep)->order('stu_number asc')->select();
//        //p($data);
        $result = M('Overall')->field('stu_number,stu_name,top_name,tea_name,z_name,b_name,grade,zdgrade,pingyuegrade,dabiangrade,score,genera')
                ->where('z_id='.$dep)->order('stu_number asc')->select();
        $letter = array('A','B','C','D','E','F','G','H','I','J','K','L');
        $tableheader = array('学号','姓名','课题','指导老师','专业','班级','平时成绩','指导老师评分','评阅评分','答辩成绩','总评成绩','总评');

        $filename = base64_decode($name);
        \Tool\PHPExcel::excel($letter, $tableheader, $result, $filename);
    }
    /**
     * 打印，某个班级的成绩     
     * @param type $dep
     * @param type $name
     */
    public function claExcel($dep,$spe,$name){
//        obtain();
        $m = M('view_grade');
        $data = $m->field('stu_number,name,top_name,tea_name,z_name,b_name,grade,zdgrade,pingyuegrade,dabiangrade,score,genera')
                ->where('dep_class='.$dep)->order('stu_number asc')->select();
        //p($data);
        $letter = array('A','B','C','D','E','F','G','H','I','J','K','L');
        $tableheader = array('学号','姓名','课题','指导老师','专业','班级','平时成绩','指导老师评分','评阅评分','答辩成绩','总评成绩','总评');

        $filename = base64_decode($spe).'--'.base64_decode($name);
        \Tool\PHPExcel::excel($letter, $tableheader, $data, $filename);
    }
    /**
     * 显示该学院所有专业，及学生信息
     * @param type $dep 学院
     */
    public function classGrade($dep,$name){
        obtain();
        $spe = M('view_cla_stu_ove')->where('dep_father='.$dep)->select();
        //p($spe);
        $this->assign('list',$spe);
        $this->assign('name',$name);
        $this->display();
    }
    /**
     * 未提交的
     * @param type $dep
     * @param type $condition
     */
    public function unfinished($dep,$page=0){
        obtain();
        $Model = M('Overall');
        $sql = $Model->field('stu_number')->where(array('b_id'=>$dep))->buildSql();
        $map = array(
            'dep_class'=>$dep,
            'stu_number not in '.$sql
        );
        //$result = $Model->table('tp_student')->where($map)->select();
        //统计
        $count      = $Model->table('tp_student')->where($map)->count();// 查询满足要求的总记录数
        //分页
        $pagenum = ($page < 2 || (($page-1)*10)>$count)?0:($page-1)*10;
        //p($pagenum);
        $result  =   $Model->table('tp_student')->field('stu_number,name')->where($map)->order('stu_number asc')->limit($pagenum,10)->select();// 查询已发布，可以选择，并且通过审核的课题，其实已经发布就可以了
        
       // p($result);
        $this->assign('list',$result);
       
        //$this->assign('list', $result);
        $pageView = getPageHtml($page,$count,__ROOT__.'/Manager/Inspection/Unfinished/dep/'.$dep);
        $this->assign('page',$pageView);
        $this->display();
    }
    /**
     * 查看学生成绩及论文
     * @param type $dep
     * @param type $page
     */
    public function excellent($dep,$option,$page=0){
        obtain();
        is_numeric($dep)?1:$this->error(C('error_talk'),C('error_go'));
        $condition = null;
        switch ($option) {
            case 1:$condition = 'score>89 and score<=100 and b_id='.$dep; break;//优秀
            case 2:$condition = 'score>79 and score<90 and b_id='.$dep; break;//良好
            case 3:$condition = 'score>69 and score<80 and b_id='.$dep; break;//中等
            case 4:$condition = 'score>59 and score<70 and b_id='.$dep; break;//及格
            case 5:$condition = 'score>=0 and score<60 and b_id='.$dep; break;//不及格
            default:$this->error(C('error_talk'),C('error_go'));break;
        }
        $Model = M('Overall');
        //统计
        $count = $Model->where($condition)->count();// 查询满足要求的总记录数
        //分页
        $pagenum = ($page < 2 || (($page-1)*10)>$count)?0:($page-1)*10;
        //p($pagenum);
        // 查询
        $result  =   $Model->field('stu_number,stu_name,z_name,b_name,score,genera')->where($condition)->order('stu_number asc')->limit($pagenum,10)->select();
        //p($result);
        $this->assign('list',$result);
        //$this->assign('list', $result);
        $pageView = getPageHtml($page,$count,__ROOT__.'/Manager/Inspection/Unfinished/dep/'.$dep);
        $this->assign('page',$pageView);
        $this->display();
    }
    /**
     * 下载学生论文
     * @param type $stu
     */
    public function down($stu){
        obtain();
        $url = M('Finalize')->field('paperpath')->where(array('stu_number'=>$stu))->find();
        downfile($url['paperpath']);
    }
}
