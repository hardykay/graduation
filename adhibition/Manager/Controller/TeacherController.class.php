<?php
namespace Manager\Controller;
use Think\Controller;

class TeacherController extends Controller {
    /**
     * 显示所有学院
     */
    public function index(){
        $Model = M();
        $Count      = $Model->table('tp_teacher')->field('dep_id,count(*) as xs')->group('dep_id')->buildSql();
        $result     = $Model->table("tp_college c,($Count) p ")->field('c.dep_id,c.dep_name,p.xs')->where('c.dep_id=p.dep_id')->select();
        $this->assign('list', $result);
        $this->display();
    }
    /**
     * 显示学院的老师，以及给其分配特权
     */
    public function teacher($dep,$name,$page=0){
        $Model = M('Teacher');
        $count = $Model->where(array('dep_id' => $dep))->count();
        $pagenum = ($page < 2 || (($page-1)*10)>$count)?0:($page-1)*10;
        $college = $Model->where(array('dep_id' => $dep))->limit($pagenum,10)->order('tea_number asc')->select();
        $this->assign('zy', $name);
        $this->assign('list', $college);
        $page = getPageHtml($page,$count,__ROOT__."/Manager/Teacher/Teacher/dep/{$dep}/name/{$name}");
        $this->assign('page',$page);
        $re = M('Specialty')->where(array('dep_father' => $dep))->select();
        $this->assign('dep',$re);
       // p($re);
        $this->display();
        
    }
    public function add(){
        if(empty($_POST)){
            $M = M('College')->select();
            $this->assign('list', $M);
            $this->display();
            exit;
        }
        ini_set('memory_limit', '1024M');
        if (!empty($_FILES)) {
            $dep = filter_input(INPUT_POST, 'dep');
            empty($dep)?$this->error('请选择学院'):1;
            $config = array(
                'exts' => array('xlsx', 'xls'),
                'maxSize' => 3145728000,
                'rootPath' => "./Public/",
                'savePath' => 'Uploads/',
                'subName' => array('date', 'Ymd'),
            );
            $upload = new \Think\Upload($config);
            if (!$info = $upload->upload()) {
                $this->error($upload->getError());
            }
            import("Org.Util.PHPExcel");
            import("Org.Util.PHPExcel.IOFactory");
            $file_name = $upload->rootPath . $info['photo']['savepath'] . $info['photo']['savename'];
            $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); //判断导入表格后缀格式
            if ($extension == 'xlsx') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
                $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
            } else if ($extension == 'xls') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
            }
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow(); //取得总行数
            $highestColumn = $sheet->getHighestColumn(); //取得总列数
            
            for ($i = 2; $i <= $highestRow; $i++) {
            //看这里看这里,前面小写的a是表中的字段名，后面的大写A是excel中位置
            if(empty((String)$objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue())){
                    continue;
                }
                $data[] = array(
                    'tea_number'    =>  (String)$objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue(),
                    'name'          =>  (String)$objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue(),
                    'pwd'           =>  encrypt((String)$objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue()),
                    'dep_id'        =>  $dep,
                    );
            }
            if(M('Teacher')->addAll($data)){
                $this->success('导入成功!');
            }  else {
                $this->error('失败');
            }
            
        } else {
            $this->error("请选择上传的文件");
        }
    }
    public function addone() {
        obtain();
        $_POST['pwd'] = encrypt($_POST['tea_number']);
        $teacher = M('teacher');
        $teacher->create();
        if ($teacher->where("tea_number='%s'", $data['tea_number'])->count()) {
            $this->error('用户已存在');
        } else {
            if ($teacher->add()) {
                $this->success('导入成功!');
            } else {
                $this->error('失败');
            }
        }
    }
    public function spe(){
        $arr = filter_input_array(INPUT_POST);
        empty($arr)?$this->error('不好意思'):1;
        $dep = implode(',', $arr['dep']);
        echo $dep;
        $data = array();
        foreach ($arr['dep'] as $value) {
            $data[] = array(
                'dep_id'=>$value,
                'tea_number'=>$arr['tea']
             );
        }
        $M = M('Teacher_specialty');
        $M->where("dep_id in({$dep})")->delete();
        if($M->addAll($data)){
            $da['specialty'] = 1;
            $t = M('Teacher')->where(array('tea_number'=>$arr['tea']))->save($da);
           // p($t);
            $this->success('设置成功！');
        }else{
            $this->error('设置失败');
        }
        
    }
    public function Reduce(){
        $list = M('College')->select();
        $this->assign('list',$list);
        $this->display("Reduce");
    }
}
