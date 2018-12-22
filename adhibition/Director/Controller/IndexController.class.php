<?php
namespace Director\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
    /**
     * 实例化检测session是否存在
     */
    public function index(){
        $tea = obtain();
        $sf = M('Teacher')->field('admin,dean,specialty,adviser')->where('tea_number=\''.$tea.'\'')->find();
        $this->assign('sf', $sf);
        $this->display();
    }
    /**
     * 设置系主任负责的专业的时间
     */
    public function tsetting($dep_id){
        obtain();
        $cond['dep_id'] = $dep_id;
        $cond['tea_number'] = session('tea_number');
        $Model = M('teacher_specialty');
        $list = $Model->where($cond)->find();
        if(is_array($list)){
            //$list['name'] = iconv("utf-8","gbk",$dep_name);  
           if(!empty($list['topic_strat'])){
               $arr = explode(' ',$list['topic_strat']);
               $list['topic_strat_y'] = $arr[0];
               $list['topic_strat_m'] = $arr[1];
           }
           if(!empty($list['topic_close'])){
               $arr = explode(' ',$list['topic_close']);
               $list['topic_close_y'] = $arr[0];
               $list['topic_close_m'] = $arr[1];
           }
           if(!empty($list['choice_strat'])){
               $arr = explode(' ',$list['choice_strat']);
               $list['choice_strat_y'] = $arr[0];
               $list['choice_strat_m'] = $arr[1];
           }
           if(!empty($list['choice_close'])){
               $arr = explode(' ',$list['choice_close']);
               $list['choice_close_y'] = $arr[0];
               $list['choice_close_m'] = $arr[1];
           }
           if(!empty($list['teacher_strat'])){
               $arr = explode(' ',$list['teacher_strat']);
               $list['teacher_strat_y'] = $arr[0];
               $list['teacher_strat_m'] = $arr[1];
           }
           if(!empty($list['teacher_close'])){
               $arr = explode(' ',$list['teacher_close']);
               $list['teacher_close_y'] = $arr[0];
               $list['teacher_close_m'] = $arr[1];
           }
           if(!empty($list['paper_close'])){
               $arr = explode(' ',$list['paper_close']);
               $list['paper_close_y'] = $arr[0];
               $list['paper_close_m'] = $arr[1];
           }
           
           //dump($list);
           $this->assign('list',$list);
           $this->display();
        }else{
            $this->error('请求超时！');
        }
    }
    /**
     * alterSettig修改专业设置数据
     */
    public function alterSettig(){
        obtain();
        //dump($_POST);
        $m = new \Director\Model\Teacher_specialtyModel();
        $data = $m->create();
        $i = false;
        if($data){
            $result = $m->save($data);
            if($result !== false){
                $this->success('修改成功',__CONTROLLER__.'/SettingList');
                $i = true;
            }
        }
        if($i != true){
            $list = $_POST;
             if(!empty($list['topic_strat'])){
                $arr = explode(' ',$list['topic_strat']);
                $list['topic_strat_y'] = $arr[0];
                $list['topic_strat_m'] = $arr[1];
            }
            if(!empty($list['topic_close'])){
                $arr = explode(' ',$list['topic_close']);
                $list['topic_close_y'] = $arr[0];
                $list['topic_close_m'] = $arr[1];
            }
            if(!empty($list['choice_strat'])){
                $arr = explode(' ',$list['choice_strat']);
                $list['choice_strat_y'] = $arr[0];
                $list['choice_strat_m'] = $arr[1];
            }
            if(!empty($list['choice_close'])){
                $arr = explode(' ',$list['choice_close']);
                $list['choice_close_y'] = $arr[0];
                $list['choice_close_m'] = $arr[1];
            }
            if(!empty($list['teacher_strat'])){
                $arr = explode(' ',$list['teacher_strat']);
                $list['teacher_strat_y'] = $arr[0];
                $list['teacher_strat_m'] = $arr[1];
            }
            if(!empty($list['teacher_close'])){
                $arr = explode(' ',$list['teacher_close']);
                $list['teacher_close_y'] = $arr[0];
                $list['teacher_close_m'] = $arr[1];
            }
            if(!empty($list['paper_close'])){
                $arr = explode(' ',$list['paper_close']);
                $list['paper_close_y'] = $arr[0];
                $list['paper_close_m'] = $arr[1];
             }
             $this->assign('list', $list);
             $this->assign('errorInfo',$m->getError());
             $this->display('Tsetting');
        }
            
        //dump($m->getError());
        
    }
    /**
     * 获取专业设置列表
     */
    public function settingList(){
        obtain();
        $Model = new Model();
        //$tea = session('tea_number');
        $dep = session('dep');
        $sql = "select dep_id,dep_name from tp_specialty where dep_id in($dep)";
        $list = $Model->query($sql);
        $this->assign('list', $list);
        $this->display();
    }
}
