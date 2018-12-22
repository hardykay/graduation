<?php
namespace Manager\Controller;
use Think\Controller;
class BakController extends Controller {

    public function index($maofu=0) {
        obtain();
        $DataDir = "661ea2223ddb0150f2eef05b7b79faa5/";
        mkdir($DataDir);
        if (!empty($_GET['Action']) || $maofu==1) {
            import("Common.Org.MySQLReback");
            $config = array(
                'host' => C('DB_HOST'),
                'port' => C('DB_PORT'),
                'userName' => C('DB_USER'),
                'userPassword' => C('DB_PWD'),
                'dbprefix' => C('DB_PREFIX'),
                'charset' => 'UTF8',
                'path' => $DataDir,
                'isCompress' => 0, //是否开启gzip压缩
                'isDownload' => 0
            );
            $mr = new MySQLReback($config);
            $mr->setDBName(C('DB_NAME'));
            if ($_GET['Action'] == 'backup' || $maofu==1) {
                $mr->backup();
                if($maofu==1){
                    return 0;
                }
                echo "<script>document.location.href='" . U("Bak/index") . "'</script>";
//                $this->success( '数据库备份成功！');
            } elseif ($_GET['Action'] == 'RL') {
                $mr->recover($_GET['File']);
                echo "<script>document.location.href='" . U("Bak/index") . "'</script>";
//                $this->success( '数据库还原成功！');
            } elseif ($_GET['Action'] == 'Del') {
                if (@unlink($DataDir . $_GET['File'])) {
                    // $this->success('删除成功！');
                    echo "<script>document.location.href='" . U("Bak/index") . "'</script>";
                } else {
                    $this->error('删除失败！');
                }
            }
            if ($_GET['Action'] == 'download') {

                function DownloadFile($fileName) {
                    ob_end_clean();
                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Length: ' . filesize($fileName));
                    header('Content-Disposition: attachment; filename=' . basename($fileName));
                    readfile($fileName);
                }
                DownloadFile($DataDir . $_GET['file']);
                exit();
            }
        }
        $lists = $this->MyScandir('661ea2223ddb0150f2eef05b7b79faa5/');
        $this->assign("datadir",$DataDir);
        $this->assign("lists", $lists);
        $this->display('Bak/index');
    }

    private function MyScandir($FilePath = './', $Order = 0) {
        $FilePath = opendir($FilePath);
        while (false !== ($filename = readdir($FilePath))) {
            $FileAndFolderAyy[] = $filename;
        }
        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }

}

?>