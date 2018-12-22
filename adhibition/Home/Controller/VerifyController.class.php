<?php
namespace Home\Controller;
use Think\Controller;

class VerifyController extends Controller {
    public function index(){
        $cfi = array(
            'fontSize'  =>  25,              // 验证码字体大小(px)
            'imageH'    =>  50,               // 验证码图片高度
            'imageW'    =>  200,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
        );
        ob_clean(); 
        $very = new \Think\Verify($cfi);
        $very->entry();
       // echo $secode['verify_code'];
    }
}
