<?php

namespace Manager\Controller;

use Think\Controller;

class StudentController extends Controller {

    /**
     * 显示所有学院
     */
    public function index() {
        //$this->display();
        $Model = M();
        //查学院
        $college = $Model->table('tp_college')->select();
        foreach ($college as $key => $value) {
            //专业
            $college[$key]['zy'] = $Model->table('tp_specialty')->where('dep_father=' . $value['dep_id'])->count();
            //班级
            $sql = $Model->table('tp_specialty')->field('dep_id')->where('dep_father=' . $value['dep_id'])->buildSql();
            $college[$key]['bj'] = $Model->table('tp_class')->where('dep_father in ' . $sql)->count();
            //学生
            $college[$key]['xs'] = $Model->table('tp_student')->where('dep_college=' . $value['dep_id'])->count();
        }
        $this->assign('list', $college);
        $this->display();
    }

    /**
     * 显示专业
     */
    public function specialty($dep) {
        $Model = M();
        $college = $Model->table('tp_specialty')->where(array('dep_father' => $dep))->select();
        foreach ($college as $key => $value) {
            $college[$key]['bj'] = $Model->table('tp_class')->where('dep_father=' . $value['dep_id'])->count();
            //学生
            $college[$key]['xs'] = $Model->table('tp_student')->where('dep_major=' . $value['dep_id'])->count();
        }
        $this->assign('list', $college);
        $this->display();
    }

    /**
     * 显示班级
     */
    public function banji($dep, $name) {
        $Model = M();
        $college = $Model->table('tp_class')->where(array('dep_father' => $dep))->select();
        //p($college);
        foreach ($college as $key => $value) {
            //学生
            $college[$key]['xs'] = $Model->table('tp_student')->where('dep_class=' . $value['dep_id'])->count();
        }
        $name = base64_decode($name);
        $this->assign('zy', $name);
        $this->assign('list', $college);
        $this->display('Class');
    }

    /**
     * 显示学生
     */
    public function student($dep, $zy, $bj, $page = 0) {
        $count = M('Student')->where(array('dep_class' => $dep))->count();
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        $college = M('Student')->where(array('dep_class' => $dep))->limit($pagenum, 10)->order('stu_number asc')->select();
        $this->assign('zy', array('zy' => $zy, 'bj' => $bj));
        $this->assign('list', $college);
        $page = getPageHtml($page, $count, __ROOT__ . "/Manager/Student/Student/dep/{$dep}/zy/{$zy}/bj/{$bj}");
        $this->assign('page', $page);
        $this->display();
    }

    /**
     * 单个添加学生
     */
    public function Addone() {
        $re = M('college')->select();
        $this->assign('list', $re);
        $this->display();
    }

    public function Addones() {
        $_POST['pwd'] = encrypt($_POST['stu_number']);
        $student = new \Manager\Model\StudentModel();
        $y = $student->create();
        if (!$y) {
            $this->error($student->getError());
        } else {
            if ($student->add($y)) {
                $this->success('导入成功!');
            } else {
                $this->error('导入失败');
            }
        }
    }

    /**
     * 批量添加学生
     */
    public function add() {
        if (empty($_POST)) {
            $M = M('College')->select();
            $this->assign('list', $M);
            $this->display();
            exit;
        }
        ini_set('memory_limit', '1024M');
        if (!empty($_FILES)) {
            $college = filter_input(INPUT_POST, 'college'); //学院
            $specialty = filter_input(INPUT_POST, 'specialty'); //专业
            $cla = filter_input(INPUT_POST, 'class'); //班级
            (empty($college) || empty($specialty) || empty($cla)) ? $this->error('学院、专业、班级都不能为空') : 1;
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
                    'stu_number' => (String)$objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue(),
                    'name' => (String)$objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue(),
                    'pwd' => encrypt((String)$objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue()),
                    'dep_college' => $college,
                    'dep_major' => $specialty,
                    'dep_class' => $cla
                );
            }
            if ($i = M('Student')->addAll($data)) {
                $this->success('导入成功' . $i . '名学生!');
            } else {
                $this->error('失败');
            }
        } else {
            $this->error("请选择上传的文件");
        }
    }

}
