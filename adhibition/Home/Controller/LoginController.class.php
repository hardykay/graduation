<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 学生、教师登录认证
 */
class LoginController extends Controller {
    
    public function index(){
        $this->display('Index/Login');
    }
    /**
     * 认证学生登录信息
     */
    
    public function student(){
        //验证码
        if(!empty($_POST)){
            cookie('name', filter_input(INPUT_POST,'hao')); 
            cookie('pwd', filter_input(INPUT_POST,'pwd')); 
            $very = new \Think\Verify();
            if(!$very->check(filter_input(INPUT_POST,'code'))){//需要验证码
            //if($very->check(filter_input(INPUT_POST,'code'))){//不需要验证码
                $this->success('验证码错误');
            }else{
                $data['stu_number'] = filter_input(INPUT_POST,'hao');
                $data['pwd'] = encrypt(filter_input(INPUT_POST,'pwd'));
                if(!empty($data['stu_number'])){
                   $Model = M('Student');
                   $Model->where($data)->find();
                   $result = $Model->data();
                   //dump($result);
                   //session($p);
                   if(is_array($result) && !empty($result['stu_number'])){
                       session('stu_number',$result['stu_number']);
                       session('name',$result['name']);
                       if(empty($result['dep_college'])){
                           //$this->error('您不是本校学生',C('error_go')); 
                            exit();
                        }
                       //session('xueyuan',$result['dep_college']);//学院
                       session('dep_id',$result['dep_college']);//学院
                       if(empty($result['dep_major'])){
                           //$this->error('您不是本校学生',C('error_go')); 
                            exit();
                        }
                       session('zhuanye',$result['dep_major']);//专业
                       if(empty($result['dep_class'])){
                           //$this->error('您不是本校学生',C('error_go')); 
                            exit();
                        }
                       session('banji',$result['dep_class']);//班级
                       if(empty($result['stu_type'])){
                           session('stu_type',0);
                       }else{
                           session('stu_type',$result['stu_type']);
                       }
                       //session('rank',10);
                       if(!empty($result['email'])){
                           $this->redirect('Student/Index/Index');
                          //echo U('Student/Index/Index');
                       }else{
                           $this->success('个人信息未完善，请完善个人信息！','../Complete/Index');
                       }
                   }else{
                      $this->success('学号或密码错误,请认真填写.'); 
                   }
                }else{
                   $this->error('您的输入错误，请认真填写');
                }   
            }
        }else{
            $this->error(C('error_talk'),C('error_go'));
        }
        
    }
    /**
     * 教师登录，
     */
    public function teacher(){
        //验证码
        if(!empty($_POST)){
            cookie('name', filter_input(INPUT_POST,'hao')); 
            cookie('pwd', filter_input(INPUT_POST,'pwd')); 
            $very = new \Think\Verify();
            if(!$very->check(filter_input(INPUT_POST,'code'))){//需要验证码
            //if($very->check(filter_input(INPUT_POST,'code'))){//不用输入验证码
                $this->success('验证码错误');
            }else{
                $data['tea_number'] = filter_input(INPUT_POST,'hao');
                $data['pwd'] = filter_input(INPUT_POST,'pwd');
                
                if(!empty($data['tea_number']) && !empty($data['pwd'])){
                   $Model = M('Teacher');
                   $data['pwd'] = encrypt($data['pwd']);
                   $Model->where($data)->find();
                   $result = $Model->data();
                  //dump($result);
                   //session($p);
                   if(is_array($result) && !empty($result['tea_number'])){
                        session('tea_number',$result['tea_number']);
                        session('name',$result['name']);
//                        if(empty($result['dep_id'])){
//                            $this->error('您不是本校教师',C('error_go')); 
//                        }
                        session('dep_id',$result['dep_id']);
                        
                       //身份赋值，教师默认身份认定（rank），1管理员（教务处），2教学院长，3系主任，4指导老师，特别注意，学生的身份是10，以此作为判断条件
                        if($result['admin'] == 1){
                            session('rank',1);
                        }elseif ($result['dean'] == 1) {
                            session('rank',2);
                        }elseif ($result['specialty'] == 1) {//系主任因其可能负责多个专业，所以，要处理一下
                            session('rank',3);
                            $T= session('tea_number');
                            // dump(session('tea_number'));
                            $User = M('Teacher_specialty');
                            $list = $User->field('dep_id')->where("tea_number='$T'")->select();
                            //dump($list);
                            if(!empty($list)){
                                 $i = 0;
                                foreach ($list as $val){
                                       $arr[$i] = $val['dep_id'];
                                       $i++;
                                }
                                session('dep',implode(',', $arr));//系主任所管辖的专业
                            }else{
                                session('dep',0);//系主任所管辖的专业
                            }
                           
                            //echo session('dep');
                        }elseif ($result['adviser'] == 1) {
                            session('rank',4);
                        }else{
                            //没有身份的
                            $this->error('您的身份未明，请联系教务处或教学院长',C('error_go')); 
                        }
                       if(!empty($result['email'])){
                           switch (session('rank')){
                               case 1:$this->redirect('Manager/Index/Index');break;//管理员
                               case 2:$this->redirect('Dean/Index/Index');break;//教学院长
                               case 3:$this->redirect('Director/Index/Index');break;//系主任
                               case 4:$this->redirect('Teacher/Index/Index');break;//指导老师
                               default :$this->error('您的身份未明，请联系教务处或教学院长',C('error_go'));
                           }
                          //echo U('Student/Index/Index');
                       }else{
                           $this->success('个人信息未完善，请完善个人信息！','../Complete/Index');
                       }
                   }else{
                      $this->success('教师工号或密码错误，请认真填写.'); 
                   }
                }else{
                   $this->error('您的输入错误，请认真填写');
                }   
            }
        }else{
           $this->error(C('error_talk'),C('error_go'));
           // dump($_POST);
        }
    }
    /**
     * 退出 
     */
    public function dropOut(){
        session(null);
        $this->redirect('Home/Index/index');
    }
    /**
    * 找回密码
    */
    public function retrieve(){
         $arr = filter_input_array(INPUT_POST);
         if(empty($arr['hao'])){
             $this->ajaxReturn(2);
             exit();
         }
         $t = new \Tool\Code($arr['hao'],$arr['email'],$arr['i']);
         $i = $t->flow();
         $this->ajaxReturn($i);
    }
    /**
    * 教师找回密码
    */
    public function alterTeaWd(){
         $arr = filter_input_array(INPUT_POST);
         empty($arr['hao'])?exit:1;
         if(!(session('email') == $arr['code'])) {
             $this->error ('验证码错误');
         }
         $data['pwd'] = encrypt($arr['pwd1']);
         $arr['tea_number'] = $arr['hao'];
         $Model = M('Teacher');
         $t = $Model->create($arr);
         if($Model->where($t)->save($data)) {
            $this->success ('修改成功');
         }else{
             $this->error('未修改');
         }
    }
    /**
    * 学生修改密码，
    */
    public function alterStuWd(){
         $arr = filter_input_array(INPUT_POST);
         empty($arr['hao'])?exit:1;
         if(!(session('email') == $arr['code'])) {
             $this->error ('验证码错误');
         }
         $data['pwd'] = encrypt($arr['pwd1']);
         $arr['stu_number'] = $arr['hao'];
         $Model = M('Student');
         $t = $Model->create($arr);
         
         if($Model->where($t)->save($data)) {
            $this->success ('修改成功');
         }else{
             $this->error('未修改');
         }
         
         
    }
    
}