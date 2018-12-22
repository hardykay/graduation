<?php
namespace Manager\Controller;
use Think\Controller;
/**
 * 抽查学生论文信息
 */
class InspectionController extends Controller {
    /**
     * 显示所有学院
     */
    public function index(){
         //$this->display();
       obtain();
       $Model = M();
       //查学院
       $college = $Model->table('tp_college')->select();
       $this->assign('list', $college);
       $this->display();
    }
    /**
     * 显示该学院所有专业，及学生信息
     * @param type $dep 学院
     */
    public function special($dep){
        obtain();
        $spe = M('view_spe_stu_ove')->where('dep_father='.$dep)->select();
        //p($spe);
        $this->assign('list',$spe);
        $this->display();
    }
    /**
     * 显示该学院所有专业，及学生信息
     * @param type $dep 学院
     */
    public function classGrade($dep){
        obtain();
        $spe = M('view_cla_stu_ove')->where('dep_father='.$dep)->select();
        //p($spe);
        $this->assign('list',$spe);
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
        
        //p($result);
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
