<?php

namespace Tool;

/**
 * 将HTML界面转化为word
 * 
 */
class CreateWord {

    private $url;       //html界面链接地址
    private $saveDir;  //文件保存的目录
    private $file;     //文件名
    private $code;      //验证码
    private $fileURL;     //文件路径
    /**
     * 
     */

    function __construct($url) {
        $this->url = $url;
        //echo  $this->url.'flhgkflhg';
    }

    /**
     * 生成文件路径
     */
    private function dir() {
        $this->saveDir = 'Public/Rubbish/' . date('Y-m-d') . '/';
        if (!is_dir($this->saveDir))
            mkdir($this->saveDir, 0777, true);
        $this->file = rand(1, 1000) . time() . '.doc';
    }

    //put your code here
    /**
     * 验证身份
     */
    public function word() {
        $this->dir();
        $content = file_get_contents($this->url);
        $fileContent = $this->getWordDocument($content, 'http://localhost/graduation/');
        $fp = fopen($this->saveDir . $this->file, 'w');
        fwrite($fp, $fileContent);
        fclose($fp);
        $this->fileURL = $this->saveDir . $this->file;
        //return $this->fileURL;
    }

    /**
     * 根据HTML代码获取word文档内容
     * 创建一个本质为mht的文档，该函数会分析文件内容并从远程下载页面中的图片资源
     * 该函数依赖于类MhtFileMaker
     * 该函数会分析img标签，提取src的属性值。但是，src的属性值必须被引号包围，否则不能提取
     * 
     * @param string $content HTML内容
     * @param string $absolutePath 网页的绝对路径。如果HTML内容里的图片路径为相对路径，那么就需要填写这个参数，来让该函数自动填补成绝对路径。这个参数最后需要以/结束
     * @param bool $isEraseLink 是否去掉HTML内容中的链接
     */
    public function getWordDocument($content, $absolutePath = "", $isEraseLink = true) {
        $mht = new \Tool\MhtFileMaker();
        if ($isEraseLink)
            $content = preg_replace('/<a\s*.*?\s*>(\s*.*?\s*)<\/a>/i', '$1', $content);   //去掉链接

        $images = array();
        $files = array();
        $matches = array();
        //这个算法要求src后的属性值必须使用引号括起来
        if (preg_match_all('/<img[.\n]*?src\s*?=\s*?[\"\'](.*?)[\"\'](.*?)\/>/i', $content, $matches)) {
            $arrPath = $matches[1];
            for ($i = 0; $i < count($arrPath); $i++) {
                $path = $arrPath[$i];
                $imgPath = trim($path);
                if ($imgPath != "") {
                    $files[] = $imgPath;
                    if (substr($imgPath, 0, 7) == 'http://') {
                        //绝对链接，不加前缀
                    } else {
                        $imgPath = $absolutePath . $imgPath;
                    }
                    $images[] = $imgPath;
                }
            }
        }
        $mht->AddContents("tmp.html", $mht->GetMimeType("tmp.html"), $content);

        for ($i = 0; $i < count($images); $i++) {
            $image = $images[$i];
            if (@fopen($image, 'r')) {
                $imgcontent = @file_get_contents($image);
                if ($content)
                    $mht->AddContents($files[$i], $mht->GetMimeType($image), $imgcontent);
            }
            else {
                echo "file:" . $image . " not exist!<br />";
            }
        }

        return $mht->GetFile();
    }
    /**
     * 
     * @param type $file_dir
     * @param type $name
     */
    public function download($name = '',$file_dir = './') {
        if (empty($name)) {
            $name = end(explode('/', $this->fileURL));
        } else {
            $name = $name . '.' . end(explode('.', $this->fileURL));
        }
        //检查文件是否存在    
        if (!file_exists($file_dir . $this->fileURL)) {
            echo "文件找不到";
            exit();
        } else {
            //打开文件    
            $file = fopen($file_dir . $this->fileURL, "r");
            //输入文件标签     
            //header("Content-type: text/html; charset=utf-8"); 
            Header("Content-type: application/octet-stream");
            Header("Accept-Ranges: bytes");
            Header("Accept-Length: " . filesize($file_dir . $this->fileURL));
            Header("Content-Disposition: attachment; filename=" . iconv("utf-8", "gbk//IGNORE", $name));
            //输出文件内容     
            //读取文件内容并直接输出到浏览器    
            echo fread($file, filesize($file_dir . $this->fileURL));
            fclose($file);
        }
    }

}
