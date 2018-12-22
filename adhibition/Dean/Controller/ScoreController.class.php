<?php
namespace Dean\Controller;
use Think\Controller;

class ScoreController extends Controller {
    public function index(){
        obtain();
        $dep = session('dep_id');
        $Model = M('View_col_spe');
        $stu = M('Student');
        $ove = M('Overall');
        $array = $Model->where('dep_father='.$dep)->select();
        //p($array);
        foreach ($array as $key => $value) {
            $array[$key]['student'] = $stu->where('dep_major='.$value['dep_id'])->count();
            $re = $ove->field('count(*) as zong,sum(case when score>89 then 1 else 0 end) as excellent,sum(case when (score<90 and score>79 ) then 1 else 0 end) as find,sum(case when (score<80 and score>69 ) then 1 else 0 end) as medium,sum(case when (score<70 and score>59 ) then 1 else 0 end) as pass,sum(case when score<60 then 1 else 0 end) as flunk,sum(case when rele=1 then 1 else 0 end) as rele,sum(case when dabian=1 then 1 else 0 end) as dabian,sum(case when dabian!=1 then 1 else 0 end) as wdabian')
                    ->where('z_id='.$value['dep_id'])->find();
            
           // p($re);
            $array[$key]['rele']        =   (int)$re['rele'];
            $array[$key]['dabian']   =   (int)$re['dabian'];
            $array[$key]['wdabian']   =   (int)$re['wdabian'];
            $array[$key]['zong']        =   (int)$re['zong'];
            $array[$key]['excellent']   =   (int)$re['excellent'];
            $array[$key]['find']        =   (int)$re['find'];
            $array[$key]['medium']      =   (int)$re['medium'];
            $array[$key]['pass']        =   (int)$re['pass'];
            $array[$key]['flunk']       =   (int)$re['flunk'];

        }
        $this->assign('list',$array);
        $this->display();
    }
    public function details($dep,$page=0){
        obtain();
        is_numeric($dep)?1:exit;
        $dep_father = session('dep_id');
        M('Specialty')->field('dep_id')->where(array('dep_id'=>$dep,'dep_father'=>$dep_father))->count()?1:$this->error('错误');
        $ove = M('Overall');
        ////统计该专业人数
        $count = $ove->where('dabian=1 and rele=0 and z_id='. $dep)->count();
        echo $count;
        //分页
        $pagenum = ($page < 2 || (($page-1)*10)>$count)?0:($page-1)*10;
        ////获取十条记录
        $redult  = $ove->field('stu_number,stu_name,top_id,top_name,grade,zdgrade,pingyuegrade,dabiangrade,score,genera')
                ->where('dabian=1 and rele=0 and z_id='. $dep)->limit($pagenum,10)->select();// 查询已发布，可以选择，并且通过审核的课题，其实已经发布就可以了
        $this->assign('list',$redult);
        
        //设置页码
        $page = getPageHtml($page,$count,__ROOT__.'/Dean/Score/Details/dep/'.$dep);
        $this->assign('page',$page);
        //
        //p($count);
        $this->display();
    }
    /**
     * 发布成绩
     */
    public function sub(){
        $arr = filter_input_array(INPUT_POST);
        $stu = implode(',', $arr['checkbox']);
        if(M('Overall')->where("stu_number in({$stu})")->save(array('rele'=>1))){
            $this->success('成功');
        }
    }
}