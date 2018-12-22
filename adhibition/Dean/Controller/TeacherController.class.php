<?php

namespace Dean\Controller;

use Think\Controller;

class TeacherController extends Controller {

    /**
     * 显示所有学院
     */
    public function index() {
        obtain();
        $Model = M();
        //查学院
        $college = $Model->table('tp_college')->select();
        foreach ($college as $key => $value) {

            //教师
            $college[$key]['xs'] = $Model->table('tp_teacher')->where('dep_id=' . $value['dep_id'])->count();
        }
        $this->assign('list', $college);
        $this->display();
    }

    /**
     * 显示学院的老师，以及给其分配特权
     */
    public function teacher($page = 0) {
        obtain();
        $dep = session('?dep_id') ? session('dep_id') : 0;
        $Model = M('Teacher');
        $count = $Model->where(array('dep_id' => $dep))->count();
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        $college = $Model->where(array('dep_id' => $dep))->limit($pagenum, 10)->order('tea_number asc')->select();
        //$this->assign('zy', $name);
        $this->assign('list', $college);
        //分页
        $page = getPageHtml($page, $count, __ROOT__ . "/Dean/Teacher/Teacher");
        $this->assign('page', $page);
        $re = M('Specialty')->where(array('dep_father' => $dep))->select();
        $this->assign('dep', $re);
        // p($re);
        $this->display();
    }

    public function add() { 
        obtain();
        
        if (empty($_POST)) {
            $M = M('College')->select();
            $this->assign('list', $M);
            $this->display();
            exit;
        }
        ini_set('memory_limit', '1024M');
        if (!empty($_FILES)) {
            $dep = filter_input(INPUT_POST, 'dep');
            empty($dep) ? $this->error('请选择学院') : 1;
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
                $data[] = array(
                    'tea_number' => $objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue(),
                    'name' => $objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue(),
                    'pwd' => encrypt($objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue()),
                    'dep_id' => $dep,
                );
            }
            if (M('Teacher')->addAll($data)) {
                $this->success('导入成功!');
            } else {
                $this->error('失败');
            }
        } else {
            $this->error("请选择上传的文件");
        }
    }

    /**
     * 设置系主任
     */
    public function spe() {
         obtain();
        $arr = filter_input_array(INPUT_POST);
        empty($arr) ? $this->error('不好意思') : 1;
        $dep = implode(',', $arr['dep']);
        //echo $dep;
        $data = array();
        //做出需要插入的多天数据
        foreach ($arr['dep'] as $value) {
            $data[] = array(
                'dep_id' => $value,
                'tea_number' => $arr['tea']
            );
        }
        $Model = M('Teacher_specialty');
        //删除前先获取的之前的系主任，作为判断条件，将teacher表中的数据清除
        $result = $Model->field('tea_number')->where("dep_id in({$dep})")->group('tea_number')->select();
        // p($result);
        //exit;
        $Model->where("dep_id in({$dep})")->delete();
        if ($Model->addAll($data)) {
            $da['specialty'] = 1;
            $Teacher = M('Teacher');
            $Teacher->where(array('tea_number' => $arr['tea']))->save($da);
            $da['specialty'] = 0;
            foreach ($result as $value) {
                if (!$Model->where($value)->count()) {
                    $Teacher->where($value)->save($da);
                }
            }
            $this->success('设置成功！');
        } else {
            $this->error('设置失败');
        }
    }

    public function number() {
         obtain();
        if (empty($_POST['number']) || !is_numeric($_POST['number'])) {
            $this->error(C('error_talk'), C('error_go'));
        }
        $dep['dep_id'] = session('dep_id');
        $data['nowadays_stu'] = $_POST['number'];
        if (M('Teacher')->where($dep)->save($data)) {
            $this->success('修改成功');
        } else {
            $this->error('未能修改');
        }
    }

}
