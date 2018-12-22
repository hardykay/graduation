<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class TopicController extends Controller {
    /**
     * 课题的公共文件，可以用于任何身份查看课题
     * 
     */
    public function index($top){
        obtain();
        $Model = M('topic');
        $result = $Model->field('name,tea_number,tea_name,genre,seientific,practice,content,top_type,audit,advice,url,check_url')->where(array('top_id'=>$top))->find();
        //p($result);
        if($result){
            $sql = $Model->table('tp_topic_f')->field('dep_id')->where(array('top_id'=>$top))->buildSql();
            $zhunaye = $Model->table('tp_specialty')->where('dep_id in'.$sql)->select();
            $this->assign('zhuanye',$zhunaye);
            $this->assign('topic',$result);
            $sql = M('Stu_topic')->field('stu_number')->where(array('top_id'=>$top))->buildSql();
            $stu = M('Student')->field('name,stu_number')->where('stu_number in '.$sql)->select();
            $this->assign('stu',$stu);
            $this->display();
        }else{
            $this->error(C('error_talk'),C('error_go'));
        }
    }
    /**
     * 将课题打印出来
     * @param type $top
     */
    public function word($top){
        //obtain();
        //$dep = session('?dep_id')?session('dep_id'):0;
        $Model = M('topic');
        $result = $Model->where(array('top_id'=>$top))->find();
        if($result){
            $Model = new Model();
            $sql = 'select dep_name from tp_specialty where dep_id in(select dep_id from tp_topic_f where top_id='.$top.' group by dep_id) ';
            //echo $sql;
            $zhunaye = $Model->query($sql);
            if($result['url']){
                $result['url'] = '<a href="'.__ROOT__.$result['url'].'">'.$result['name'].'</a>';
            }else{
                $result['url'] = '无';
            }
            $this->assign('zhuanye',$zhunaye);
            $this->assign('topic',$result);
            $this->display();
        }else{
            exit('不存在');
        }
        
    }
    
}
