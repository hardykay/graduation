<?php

namespace Tool;

/**
 * 将HTML界面转化为word
 * 
 */
class PHPExcel {

    /**
     * 
     * @param array $letter 表格的列 $letter = array('A', 'B', 'C', 'D', 'E', 'F', 'F', 'G');
     * @param array $tableheader 表头，即为第一行 $tableheader = array('学号', '姓名', '性别', '年龄', '班级');
     * @param array $data 数据 为二维数组  $data = array(
     *      array('1', '小王', '男', '20', '100'),
     *       array('2', '小李', '男', '20', '101'),
     *       array('3', '小张', '女', '20', '102'),
     *       array('4', '小赵', '女', '20', '103')
     *   );
     * @param String $filename 文件名，用于下载的命名
     */
    static function excel($letter, $tableheader, $data, $filename) {
        //创建对象
        import('Org.Util.PHPExcel');
        //$test = new \UserTest();
        $excel = new \PHPExcel();
        //填充表头信息
        for ($i = 0; $i < count($tableheader); $i++) {
            $excel->getActiveSheet()->setCellValue("$letter[$i]", "$tableheader[$i]");
        }
        //填充表格信息
        for ($i = 2; $i <= count($data) + 1; $i++) {
            $j = 0;
            foreach ($data[$i - 2] as $value) {
                $excel->getActiveSheet()->setCellValue((string)"$letter[$j]$i", "$value");
                $j++;
            }
        }
        //创建Excel输入对象
        import('Org.Util.PHPExcel.Writer');
        $write = new \PHPExcel_Writer_Excel5($excel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header('Content-Disposition:attachment;filename="' . $filename . '.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');
    }

}
