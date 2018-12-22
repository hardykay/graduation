<?php
/*
**@function Out put the word into Public/Word
**@need PHPWord Class in Include/Library/Org/Util/PHPWord
**@author zdx
**@date the last modified time 2017-2-20
**@bug fixs by zdx 2017-2-22 除去导出中出现的辅助测项和应实时运行仪器数与实际值不匹配
*/
namespace Home\Controller;
use Think\Controller;
ini_set('memory_limit','1024M');
ini_set('max_execution_time','86400');
class OutWordController extends Controller{
    public function index(){
        header('Content-Type:text/html; charset=utf8');
        import('Org.Util.PHPWord');
        import('Org.Util.PHPWord.IOFactory');
        // New Word Document
        if(IS_POST){
        $param_latitude=I('post.lat','','htmlspecialchars');
        $param_longitude=I('post.lng','','htmlspecialchars');
        $param_distance=I('post.radius','','htmlspecialchars');
        }
        $distance=$param_distance*100;
//$PHPWord = new PHPWord();
$PHPWord = new \PHPWord();
// New portrait section
$section = $PHPWord->createSection();
//Get time stamp
$year = date("Y");
$month = date("m");
$day = date("d");
$hour = date("G");
$minute = date("i");

// Add header
$header = $section->createHeader();
$table = $header->addTable();
$table->addRow();
$table->addCell(4500)->addText($year.'年'.$month.'月'.$day.'日');
$table->addCell(4500)->addText('测试版',null,array('align'=>'right'));

// Add listitem elements
$PHPWord->addFontStyle('myOwnStyle', array('name'=>'FangSong', 'size'=>'14'));
$PHPWord->addParagraphStyle('P-Style', array('spaceAfter'=>95));
$listStyle = array('listType'=>\PHPWord_Style_ListItem::TYPE_NUMBER_NESTED);
$section->addListItem('数据质量评估情况', 0, 'myOwnStyle', $listStyle, 'P-Style');

// Prepare the score from SearchAllItems()
$score_count =$this->SearchAllItems();
$HighScore = $score_count['xb_HighScore']+$score_count['lt_HighScore']+$score_count['dc_HighScore']+$score_count['ddc_HighScore']+$score_count['ddz_HighScore'];
$MediumScore = $score_count['xb_MediumScore']+$score_count['lt_MediumScore']+$score_count['dc_MediumScore']+$score_count['ddc_MediumScore']+$score_count['ddz_MediumScore'];
$LowScore = $score_count['xb_LowScore']+$score_count['lt_LowScore']+$score_count['dc_LowScore']+$score_count['ddc_LowScore']+$score_count['ddz_LowScore'];
$FlunkScore = $score_count['xb_FlunkScore']+$score_count['lt_FlunkScore']+$score_count['dc_FlunkScore']+$score_count['ddc_FlunkScore']+$score_count['ddz_FlunkScore'];
$electHighScore = $score_count['dc_HighScore']+$score_count['ddc_HighScore']+$score_count['ddz_HighScore'];
$electMediumScore = $score_count['dc_MediumScore']+$score_count['ddc_MediumScore']+$score_count['ddz_MediumScore'];
$electLowScore = $score_count['dc_LowScore']+$score_count['ddc_LowScore']+$score_count['ddz_LowScore'];
$electFlunkScore = $score_count['dc_FlunkScore']+$score_count['ddc_FlunkScore']+$score_count['ddz_FlunkScore'];
$ele_shouldcounts = $score_count['ddz_shouldRuning']+$score_count['ddc_shouldRuning']+$score_count['dc_shouldRuning']+$electHighScore+$electMediumScore+$electLowScore+$electFlunkScore;
$xb_shouldcounts = $score_count['xb_shouldRuning']+$score_count['xb_HighScore']+$score_count['xb_MediumScore']+$score_count['xb_LowScore']+$score_count['xb_FlunkScore'];
$lt_shouldcounts = $score_count['lt_shouldRuning']+$score_count['lt_HighScore']+$score_count['lt_MediumScore']+$score_count['lt_LowScore']+$score_count['lt_FlunkScore'];
$ItemCount = $ele_shouldcounts+$xb_shouldcounts+$lt_shouldcounts;
//Null assignment of data to zero
if ($score_count['xb_HighScore']==null) {
    $score_count['xb_HighScore'] = 0;
}
if ($score_count['xb_MediumScore']==null) {
    $score_count['xb_MediumScore'] = 0;
}
if ($score_count['xb_LowScore']==null ){
    $score_count['xb_LowScore'] = 0;
}
if ($score_count['xb_FlunkScore']==null ){
    $score_count['xb_FlunkScore'] = 0;
}
if ($score_count['lt_HighScore']==null) {
    $score_count['lt_HighScore'] = 0;
}
if ($score_count['lt_MediumScore']==null) {
   $score_count['lt_MediumScore'] = 0;
}
if ($score_count['lt_LowScore']==null) {
    $score_count['lt_LowScore'] = 0;
}
if ($score_count['lt_FlunkScore']==null) {
    $score_count['lt_FlunkScore'] = 0;
}
// Add the main text elements
$PHPWord->addFontStyle('rmStyle', array('bold'=>false, 'name'=>'FangSong', 'size'=>'14'));
$PHPWord->addParagraphStyle('pmStyle', array('align'=>'left','spacing'=>150, 'spaceAfter'=>100,'spaceBefore'=>50));
$section->addText(' 震中距离'.$distance.'km范围内，共检测到'.$ItemCount.'台项主观测数据,检测预报效能得分为90~100的有'.$HighScore.'项，75~90的有'.$MediumScore.'项，60~75的有'.$LowScore.'项,60分以下的有'.$FlunkScore.'项(附件1)。', 'rmStyle', 'pmStyle');
$section->addTextBreak(2);

// Define the  first table style arrays
$styleTable = array('alignMent' => 'center','borderTopSize'=>16, 'borderTopColor'=>'434343','borderBottomSize'=>16,'borderBottomColor'=>'434343', 'cellMargin'=>80,'borderLeftColor'=>'ffffff','borderRightColor'=>'ffffff','borderInsideVColor'=>'ffffff');
$styleFirstRow = array('borderBottomSize'=>16, 'borderBottomColor'=>'434343', 'bgColor'=>'ffffff');

// Define cell style arrays
$styleCell = array('valign'=>'center');
$styleCellBTLR = array('valign'=>'center', 'textDirection'=>\PHPWord_Style_Cell::TEXT_DIR_BTLR);

// Define font style for first row
$fontStyle = array('bold'=>true, 'align'=>'center');
$PHPWord->addParagraphStyle('pStyle', array('bold'=>true,'align'=>'center'));
// Add the  first table style
$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

// Add table
$table = $section->addTable('myOwnTableStyle');

// Add row
$table->addRow(450);

// Add cells
$table->addCell(2100, $styleCell)->addText('监测预报效能自动评估得分', $fontStyle,'pStyle');
$table->addCell(2100, $styleCell)->addText('形变学科', $fontStyle,'pStyle');
$table->addCell(2100, $styleCell)->addText('电磁学科', $fontStyle,'pStyle');
$table->addCell(2100, $styleCell)->addText('流体学科', $fontStyle,'pStyle');


// Add more rows / cells
$styleCellColor = array('bgColor'=>'cccccc');
    $table->addRow();
    $table->addCell(2100,$styleCellColor)->addText("90-100",null,array('align'=>'center'));
    $table->addCell(2100,$styleCellColor)->addText($score_count['xb_HighScore'].'('.$xb_shouldcounts.')',null,array('align'=>'center'));
    $table->addCell(2100,$styleCellColor)->addText($electHighScore.'('.$ele_shouldcounts.')',null,array('align'=>'center'));
    $table->addCell(2100,$styleCellColor)->addText($score_count['lt_HighScore'].'('.$lt_shouldcounts.')',null,array('align'=>'center'));
    $table->addRow();
    $table->addCell(2100)->addText("75-90",null,array('align'=>'center'));
    $table->addCell(2100)->addText($score_count['xb_MediumScore'].'('.$xb_shouldcounts.')',null,array('align'=>'center'));
    $table->addCell(2100)->addText($electMediumScore.'('.$ele_shouldcounts.')',null,array('align'=>'center'));
    $table->addCell(2100)->addText($score_count['lt_MediumScore'].'('.$lt_shouldcounts.')',null,array('align'=>'center'));
    $table->addRow();
    $table->addCell(2100,$styleCellColor)->addText("60-75",null,array('align'=>'center'));
    $table->addCell(2100,$styleCellColor)->addText($score_count['xb_LowScore'].'('.$xb_shouldcounts.')',null,array('align'=>'center'));
    $table->addCell(2100,$styleCellColor)->addText($electLowScore.'('.$ele_shouldcounts.')',null,array('align'=>'center'));
    $table->addCell(2100,$styleCellColor)->addText($score_count['lt_LowScore'].'('.$lt_shouldcounts.')',null,array('align'=>'center'));
    $table->addRow();
    $table->addCell(2100)->addText("<60",null,array('align'=>'center'));
    $table->addCell(2100)->addText($score_count['xb_FlunkScore'].'('.$xb_shouldcounts.')',null,array('align'=>'center'));
    $table->addCell(2100)->addText($electFlunkScore.'('.$ele_shouldcounts.')',null,array('align'=>'center'));
    $table->addCell(2100)->addText($score_count['lt_FlunkScore'].'('.$lt_shouldcounts.')',null,array('align'=>'center'));

//Add the second conent
$PHPWord->addFontStyle('r2Style', array('bold'=>false, 'name'=>'FangSong', 'size'=>'10.5'));
$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));
$section->addText('注：括号内为应实时运行的仪器数，括号外为实时运行的仪器数', 'r2Style', 'pStyle');
$section->addTextBreak(2);

//Add the third conent
$PHPWord->addFontStyle('r3Style', array('bold'=>false, 'name'=>'FangSong', 'size'=>'14'));
$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));
$section->addText('附表：'.$distance.'km范围内台项监测预报效能自动评估结果（'.date("Y-m-d").'）', 'r3Style', 'pStyle');
$section->addTextBreak(0);

// Define the second table style arrays
$styleTable = array('alignMent' => 'center','borderTopSize'=>16, 'borderTopColor'=>'434343','borderBottomSize'=>16,'borderBottomColor'=>'434343', 'cellMargin'=>80,'borderLeftColor'=>'ffffff','borderRightColor'=>'ffffff','borderInsideVColor'=>'ffffff');
$styleFirstRow = array('borderBottomSize'=>16, 'borderBottomColor'=>'434343', 'bgColor'=>'ffffff');

$styleCell = array('valign'=>'center');
$styleCellBTLR = array('valign'=>'center', 'textDirection'=>\PHPWord_Style_Cell::TEXT_DIR_BTLR);

$fontStyle = array('bold'=>true, 'align'=>'center');
$PHPWord->addParagraphStyle('pStyle', array('bold'=>true,'align'=>'center'));

$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

$table = $section->addTable('myOwnTableStyle');

$table->addRow(600);

$table->addCell(1000, $styleCell)->addText('台站代码', $fontStyle,'pStyle');
$table->addCell(1000, $styleCell)->addText('台站名', $fontStyle,'pStyle');
$table->addCell(1000, $styleCell)->addText('经度', $fontStyle,'pStyle');
$table->addCell(1000, $styleCell)->addText('纬度', $fontStyle,'pStyle');
$table->addCell(1000, $styleCell)->addText('震中距(km)', $fontStyle,'pStyle');
$table->addCell(1000, $styleCell)->addText('测项代码', $fontStyle,'pStyle');
$table->addCell(6000, $styleCell)->addText('测项名称', $fontStyle,'pStyle');
$table->addCell(1000, $styleCell)->addText('观测系统评分', $fontStyle,'pStyle');
$table->addCell(4000, $styleCell)->addText('数据质量得分', $fontStyle,'pStyle');
$table->addCell(1000, $styleCell)->addText('跟踪应用得分', $fontStyle,'pStyle');
$table->addCell(1000, $styleCell)->addText('总分', $fontStyle,'pStyle');
$table->addCell(1000, $styleCell)->addText('备注', $fontStyle,'pStyle');
$item_stations = $this->return_eachitems();
for ($i=0; $i <count($item_stations) ; $i++) { 
    # code...
    for ($j=0; $j <count($item_stations[$i]) ; $j++) { 
        //获得距离
        $distance = $this->getDistance($item_stations[$i][$j]['LATITUDE'], $item_stations[$i][$j]['LONGITUDE'], $param_latitude,$param_longitude);
        if (substr($item_stations[$i][$j]['ITEMID'], 0,1)=='2') {
            $sub='_XB_';
        }
        elseif(substr($item_stations[$i][$j]['ITEMID'], 0,1)=='4') {
            $sub='_LT_';
        }
        elseif(substr($item_stations[$i][$j]['ITEMID'], 0,2)=='31') {
            $sub='_DC_';
        }
        elseif(substr($item_stations[$i][$j]['ITEMID'], 0,2)=='32') {
            $sub='_DDZ_';
        }
        elseif(substr($item_stations[$i][$j]['ITEMID'], 0,2)=='34') {
            $sub='_DDC_';
        }
        elseif(substr($item_stations[$i][$j]['ITEMID'], 0,2)=='91') {
            $sub='_FZ_';
        }
        $item_info=M('','','CONFIG_JC_MANAGEGRADE');
        switch ($sub) {
                    case '_XB_':
                        $eachItems_sql ='SELECT DISTINCT a.ITEMSNAME,a.SYS_EVALUATION,a.DATA_EVALUATION,a.TRA_EVALUATION,a.SUM_GRADE FROM JC_MANAGEGRADE.MG_CP_XB_FINALSCORE a WHERE a.ITEMSID = '.'\''.$item_stations[$i][$j]['ITEMID'].'\''.'  AND a.POINTID='.'\''.$item_stations[$i][$j]['POINTID'].'\''.' AND a.STATIONID='.'\''.$item_stations[$i][$j]['STATIONID'].'\''.' AND ISLASTEST = 1';
                        $items_XB = $item_info->query($eachItems_sql);
                        $table->addRow();
                        $style = array('bgColor'=>'cccccc');
                        $styleCellColor = ($j % 2 == 0) ? $style : '';
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['STATIONID'],null,array('align'=>'center'));
                        $table->addCell(3000,$styleCellColor)->addText($item_stations[$i][$j]['STATIONNAME'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['LATITUDE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['LONGITUDE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($distance,null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['ITEMID'].$item_stations[$i][$j]['POINTID'],null,array('align'=>'center'));
                        $table->addCell(4000,$styleCellColor)->addText($items_XB[0]['ITEMSNAME'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_XB[0]['SYS_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_XB[0]['DATA_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_XB[0]['TRA_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_XB[0]['SUM_GRADE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText(" ",null,array('align'=>'center'));
                        break;
                    case '_LT_':
                        $eachItems_sql='SELECT DISTINCT a.ITEMSNAME,a.SYS_EVALUATION,a.DATA_EVALUATION,a.TRA_EVALUATION,a.SUM_GRADE FROM JC_MANAGEGRADE.MG_CP_LT_FINALSCORE a WHERE a.ITEMID = '.'\''.$item_stations[$i][$j]['ITEMID'].'\''.'  AND a.POINTID='.'\''.$item_stations[$i][$j]['POINTID'].'\''.' AND a.STATIONID='.'\''.$item_stations[$i][$j]['STATIONID'].'\''.' AND ISLASTEST = 1 ';
                        $items_LT = $item_info->query($eachItems_sql);
                        $table->addRow();
                        $style = array('bgColor'=>'cccccc');
                        $styleCellColor = ($j % 2 == 0) ? $style : '';
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['STATIONID'],null,array('align'=>'center'));
                        $table->addCell(3000,$styleCellColor)->addText($item_stations[$i][$j]['STATIONNAME'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['LATITUDE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['LONGITUDE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($distance,null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['ITEMID'].$item_stations[$i][$j]['POINTID'],null,array('align'=>'center'));
                        $table->addCell(4000,$styleCellColor)->addText($items_LT[0]['ITEMSNAME'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_LT[0]['SYS_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_LT[0]['DATA_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_LT[0]['TRA_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_LT[0]['SUM_GRADE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText(" ",null,array('align'=>'center'));
                        break;
                    case '_DC_':
                        $eachItems_sql='SELECT DISTINCT a.ITEMSNAME,a.SYS_EVALUATION,a.DATA_EVALUATION,a.TRA_EVALUATION,a.SUM_GRADE FROM JC_MANAGEGRADE.MG_CP_DC_FINALSCORE a WHERE a.ITEMID =  '.'\''.$item_stations[$i][$j]['ITEMID'].'\''.'  AND a.POINTID='.'\''.$item_stations[$i][$j]['POINTID'].'\''.' AND a.STATIONID='.'\''.$item_stations[$i][$j]['STATIONID'].'\''.' AND ISLASTEST = 1 ';
                        $items_DC = $item_info->query($eachItems_sql);
                        $table->addRow();
                        $style = array('bgColor'=>'cccccc');
                        $styleCellColor = ($j % 2 == 0) ? $style : '';
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['STATIONID'],null,array('align'=>'center'));
                        $table->addCell(3000,$styleCellColor)->addText($item_stations[$i][$j]['STATIONNAME'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['LATITUDE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['LONGITUDE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($distance,null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['ITEMID'].$item_stations[$i][$j]['POINTID'],null,array('align'=>'center'));
                        $table->addCell(4000,$styleCellColor)->addText($items_DC[0]['ITEMSNAME'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DC[0]['SYS_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DC[0]['DATA_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DC[0]['TRA_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DC[0]['SUM_GRADE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText(" ",null,array('align'=>'center'));
                        break;
                    case '_DDZ_':
                        $eachItems_sql='SELECT DISTINCT a.ITEMSNAME,a.SYS_EVALUATION,a.DATA_EVALUATION,a.TRA_EVALUATION,a.SUM_GRADE FROM JC_MANAGEGRADE.MG_CP_DDZ_FINALSCORE a WHERE a.ITEMID = '.'\''.$item_stations[$i][$j]['ITEMID'].'\''.'  AND a.POINTID='.'\''.$item_stations[$i][$j]['POINTID'].'\''.' AND a.STATIONID='.'\''.$item_stations[$i][$j]['STATIONID'].'\''.' AND ISLASTEST = 1 ';
                        $items_DDZ = $item_info->query($eachItems_sql);
                        $table->addRow();
                        $style = array('bgColor'=>'cccccc');
                        $styleCellColor = ($j % 2 == 0) ? $style : '';
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['STATIONID'],null,array('align'=>'center'));
                        $table->addCell(3000,$styleCellColor)->addText($item_stations[$i][$j]['STATIONNAME'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['LATITUDE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['LONGITUDE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($distance,null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['ITEMID'].$item_stations[$i][$j]['POINTID'],null,array('align'=>'center'));
                        $table->addCell(4000,$styleCellColor)->addText($items_DDZ[0]['ITEMSNAME'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DDZ[0]['SYS_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DDZ[0]['DATA_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DDZ[0]['TRA_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DDZ[0]['SUM_GRADE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText(" ",null,array('align'=>'center'));
                        break;
                    case '_DDC_':
                        $eachItems_sql='SELECT DISTINCT a.ITEMSNAME,a.SYS_EVALUATION,a.DATA_EVALUATION,a.TRA_EVALUATION,a.SUM_GRADE FROM JC_MANAGEGRADE.MG_CP_DDC_FINALSCORE a WHERE a.ITEMID = '.'\''.$item_stations[$i][$j]['ITEMID'].'\''.'  AND a.POINTID='.'\''.$item_stations[$i][$j]['POINTID'].'\''.' AND a.STATIONID='.'\''.$item_stations[$i][$j]['STATIONID'].'\''.' AND ISLASTEST = 1';                        
                        $items_DDC = $item_info->query($eachItems_sql);
                        $table->addRow();
                        $style = array('bgColor'=>'cccccc');
                        $styleCellColor = ($j % 2 == 0) ? $style : '';
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['STATIONID'],null,array('align'=>'center'));
                        $table->addCell(3000,$styleCellColor)->addText($item_stations[$i][$j]['STATIONNAME'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['LATITUDE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['LONGITUDE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($distance,null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($item_stations[$i][$j]['ITEMID'].$item_stations[$i][$j]['POINTID'],null,array('align'=>'center'));
                        $table->addCell(4000,$styleCellColor)->addText($items_DDC[0]['ITEMSNAME'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DDC[0]['SYS_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DDC[0]['DATA_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DDC[0]['TRA_EVALUATION'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText($items_DDC[0]['SUM_GRADE'],null,array('align'=>'center'));
                        $table->addCell(1000,$styleCellColor)->addText(" ",null,array('align'=>'center'));
                        break;
                    case '_FZ_':

                        break;
                }

    }

    }
$section->addTextBreak(2);

//Add the fourth conent
$PHPWord->addFontStyle('r4Style', array('bold'=>false, 'name'=>'FangSong', 'size'=>'14'));
$PHPWord->addParagraphStyle('p4Style', array('align'=>'left', 'spaceAfter'=>100));
$section->addText('空间展示功能', 'r4Style', 'p4Style');
$section->addTextBreak(0);  

// Save File
$objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $date = date('Ymdhis');
        $stationID =$this->SearchCenterStation();
        $savefile = './public/Word/'.$date.'.docx';
        $objWriter->save($savefile);
        echo $savefile;

    }

    /*
    **Query all stations in the 500km range
    **@param $lat $lon
    **@author zdx
    **@date 2017-2-18
    */
    public function SearchAllStations($lat,$lon,$dis){
        //$lat=39.92;
        //$lon=116;
        $mode=M('','','CONFIG_QZDATA');
        $sql="select STATIONID from QZDATA.QZ_DICT_STATIONS where latitude > '".$lat."'-'".$dis."' and latitude < '".$lat."'+'".$dis."' and longitude > '".$lon."'-'".$dis."' and longitude < '".$lon."'+'".$dis."' order by ACOS(SIN(('".$lat."' * 3.1415) / 180 ) *SIN((latitude * 3.1415) / 180 ) +COS(('".$lat."' * 3.1415) / 180 ) * COS((latitude * 3.1415) / 180 ) *COS(('".$lon."'* 3.1415) / 180 - (longitude * 3.1415) / 180 ) ) * 6380";       
        //Check out all stations
        $result = $mode->query($sql);
        //Number of stations
        $station_counts = count($result);
        return $result;
    }
    /*
    **The query returns to the main items grades 
    */
    public function SearchAllItems(){
            //Returns a fractional array
            $score_count = array();
            //Define the number of the main test items
            $item_counts = 0;
            //Get the station within the range
        header("Content-Type: text/html; charset=utf-8");
        if(IS_POST){
        $param_latitude=I('post.lat','','htmlspecialchars');
        $param_longitude=I('post.lng','','htmlspecialchars');
        $param_distance=I('post.radius','','htmlspecialchars');
        }

            $result = $this->SearchAllStations($param_latitude,$param_longitude,$param_distance);

            //Traverse the range of stations ID
            for ($i=0; $i <count($result) ; $i++) { 
            $mode=M('','','CONFIG_QZDATA');
            $item_sql="select distinct a.stationid, a.stationname,b.ITEMID,b.POINTID from qzdata.qz_dict_stations a,qzdata.qz_dict_stationitems b where a.stationid=b.stationid and a.STATIONID='".$result[$i]['STATIONID']."'";
            //Check out the main items in the range station
            $item_result=$mode->query($item_sql);

            /*This cycle is to add up the number of points in each subject
             according to the main items in the range of stations*/
            for ($j=0; $j <count($item_result) ; $j++) { 
                $yy++;
                $stationid=$item_result[$j][STATIONID];
                $itemid=$item_result[$j][ITEMID];
                $pointid=$item_result[$j][POINTID];
                $item_grade=M('','','CONFIG_JC_MANAGEGRADE');
                if (substr($itemid, 0,1)=='2') {
                    $sub='_XB_';
                }
                if (substr($itemid, 0,1)=='4') {
                    $sub='_LT_';
                }
                if (substr($itemid, 0,2)=='31') {
                    $sub='_DC_';
                }
                if (substr($itemid, 0,2)=='32') {
                    $sub='_DDZ_';
                }
                if (substr($itemid, 0,2)=='34') {
                    $sub='_DDC_';
                }
                if (substr($itemid, 0,2)=='91') {
                    $sub='_FZ_';
                }
                switch ($sub) {
                    case '_XB_':
                        $score_sql="SELECT DISTINCT SUM_GRADE FROM JC_MANAGEGRADE.MG_CP_XB_FINALSCORE WHERE ITEMSID = '".$itemid."'  AND POINTID='".$pointid."' AND STATIONID='".$stationid."' AND ISLASTEST = 1";
                        $grade = $item_grade->query($score_sql);
                        if ($grade[0][SUM_GRADE]>=90&&$grade[0][SUM_GRADE]<=100) {
                            $xb_HighScore++;
                        }elseif ($grade[0][SUM_GRADE]>0&&$grade[0][SUM_GRADE]<60) {
                            $xb_FlunkScore++;
                        }elseif ($grade[0][SUM_GRADE]>=60&&$grade[0][SUM_GRADE]<75) {
                            $xb_LowScore++;
                        }elseif ($grade[0][SUM_GRADE]>=75&&$grade[0][SUM_GRADE]<90) {
                            $xb_MediumScore++;
                        }elseif ($grade[0][SUM_GRADE]<=0||$grade[0][SUM_GRADE]>100||$grade[0][SUM_GRADE]==null) {
                            $xb_shouldRuning++;
                        }
                        break;

                    case '_LT_':
                        $score_sql="SELECT DISTINCT SUM_GRADE FROM JC_MANAGEGRADE.MG_CP_LT_FINALSCORE WHERE ITEMID = '".$itemid."'  AND POINTID='".$pointid."' AND STATIONID='".$stationid."' AND ISLASTEST = 1";
                        //var_dump($score_sql);
                        $grade = $item_grade->query($score_sql);
                        //var_dump($grade[0][SUM_GRADE]);
                        if ($grade[0][SUM_GRADE]>=90&&$grade[0][SUM_GRADE]<=100) {
                            $lt_HighScore++;
                        }elseif ($grade[0][SUM_GRADE]>0&&$grade[0][SUM_GRADE]<60) {
                            $lt_FlunkScore++;
                        }elseif ($grade[0][SUM_GRADE]>=60&&$grade[0][SUM_GRADE]<75) {
                            $lt_LowScore++;
                        }elseif ($grade[0][SUM_GRADE]>=75&&$grade[0][SUM_GRADE]<90) {
                            $lt_MediumScore++;
                        }elseif ($grade[0][SUM_GRADE]<=0||$grade[0][SUM_GRADE]>100||$grade[0][SUM_GRADE]==null) {
                            $lt_shouldRuning++;
                        }

                        break;
                    case '_DC_':
                        $score_sql="SELECT DISTINCT SUM_GRADE FROM JC_MANAGEGRADE.MG_CP_DC_FINALSCORE WHERE ITEMID = '".$itemid."'  AND POINTID='".$pointid."' AND STATIONID='".$stationid."' AND ISLASTEST = 1";
                        //var_dump($score_sql);
                        $grade = $item_grade->query($score_sql);
                        if ($grade[0][SUM_GRADE]>=90&&$grade[0][SUM_GRADE]<=100) {
                            $dc_HighScore++;
                        }elseif ($grade[0][SUM_GRADE]>0&&$grade[0][SUM_GRADE]<60) {
                            $dc_FlunkScore++;
                        }elseif ($grade[0][SUM_GRADE]>=60&&$grade[0][SUM_GRADE]<75) {
                            $dc_LowScore++;
                        }elseif ($grade[0][SUM_GRADE]>=75&&$grade[0][SUM_GRADE]<90) {
                            $dc_MediumScore++;
                        }elseif ($grade[0][SUM_GRADE]<=0||$grade[0][SUM_GRADE]>100||$grade[0][SUM_GRADE]==null) {
                            $dc_shouldRuning++;
                        }


                        break;
                    case '_DDZ_':
                        $score_sql="SELECT DISTINCT SUM_GRADE FROM JC_MANAGEGRADE.MG_CP_DDZ_FINALSCORE WHERE ITEMID = '".$itemid."'  AND POINTID='".$pointid."' AND STATIONID='".$stationid."' AND ISLASTEST = 1";
                        //var_dump($score_sql);
                        $grade = $item_grade->query($score_sql); 
                        if ($grade[0][SUM_GRADE]>=90&&$grade[0][SUM_GRADE]<=100) {
                            $ddz_HighScore++;
                        }elseif ($grade[0][SUM_GRADE]>0&&$grade[0][SUM_GRADE]<60) {
                            $ddz_FlunkScore++;
                        }elseif ($grade[0][SUM_GRADE]>=60&&$grade[0][SUM_GRADE]<75) {
                            $ddz_LowScore++;
                        }elseif ($grade[0][SUM_GRADE]>=75&&$grade[0][SUM_GRADE]<90) {
                            $ddz_MediumScore++;
                        }elseif ($grade[0][SUM_GRADE]<=0||$grade[0][SUM_GRADE]>100||$grade[0][SUM_GRADE]==null) {
                            $ddz_shouldRuning++;
                        }

                        break;
                    case '_DDC_':
                        $score_sql="SELECT DISTINCT SUM_GRADE FROM JC_MANAGEGRADE.MG_CP_DDC_FINALSCORE WHERE ITEMID = '".$itemid."'  AND POINTID='".$pointid."' AND STATIONID='".$stationid."'AND ISLASTEST = 1";
                        $grade = $item_grade->query($score_sql);
                        if ($grade[0][SUM_GRADE]>=90&&$grade[0][SUM_GRADE]<=100) {
                            $ddc_HighScore++;
                        }elseif ($grade[0][SUM_GRADE]>0&&$grade[0][SUM_GRADE]<60) {
                            $ddc_FlunkScore++;
                        }elseif ($grade[0][SUM_GRADE]>=60&&$grade[0][SUM_GRADE]<75) {
                            $ddc_LowScore++;
                        }elseif ($grade[0][SUM_GRADE]>=75&&$grade[0][SUM_GRADE]<90) {
                            $ddc_MediumScore++;
                        }elseif ($grade[0][SUM_GRADE]<=0||$grade[0][SUM_GRADE]>100||$grade[0][SUM_GRADE]==null) {
                            $ddc_shouldRuning++;
                        }

                        break;
                    case '_FZ_':

                        break;


                }
            }
            $item_counts += count($item_result);


           }
        //The grades are stored and returned in the array
        $score_count['xb_shouldRuning'] = $xb_shouldRuning;
        $score_count['lt_shouldRuning'] = $lt_shouldRuning;
        $score_count['ddz_shouldRuning'] = $ddz_shouldRuning;
        $score_count['ddc_shouldRuning'] = $ddc_shouldRuning;
        $score_count['dc_shouldRuning'] = $dc_shouldRuning;
        $score_count['xb_MediumScore'] = $xb_MediumScore;
        $score_count['xb_LowScore'] = $xb_LowScore;
        $score_count['xb_FlunkScore'] = $xb_FlunkScore;
        $score_count['xb_HighScore'] = $xb_HighScore;
        $score_count['lt_MediumScore'] = $lt_MediumScore;
        $score_count['lt_LowScore'] = $lt_LowScore;
        $score_count['lt_FlunkScore'] = $lt_FlunkScore;
        $score_count['lt_HighScore'] = $lt_HighScore;
        $score_count['dc_MediumScore'] = $dc_MediumScore;
        $score_count['dc_LowScore'] = $dc_LowScore;
        $score_count['dc_FlunkScore'] = $dc_FlunkScore;
        $score_count['dc_HighScore'] = $dc_HighScore;
        $score_count['ddc_MediumScore'] = $ddc_MediumScore;
        $score_count['ddc_LowScore'] = $ddc_LowScore;
        $score_count['ddc_FlunkScore'] = $ddc_FlunkScore;
        $score_count['ddc_HighScore'] = $ddc_HighScore;
        $score_count['ddz_MediumScore'] = $ddz_MediumScore;
        $score_count['ddz_LowScore'] = $ddz_LowScore;
        $score_count['ddz_FlunkScore'] = $ddz_FlunkScore;
        $score_count['ddz_HighScore'] = $ddz_HighScore;
        //Number of the main  items
        $score_count['counts'] = $item_counts;
        return $score_count;

    }
    /*
    **返回测点信息
    */
    public function return_eachitems(){
        header("Content-Type: text/html; charset=utf-8");
        if(IS_POST){
        $param_latitude=I('post.lat','','htmlspecialchars');
        $param_longitude=I('post.lng','','htmlspecialchars');
        $param_distance=I('post.radius','','htmlspecialchars');
        }
        $result = $this->SearchAllStations($param_latitude,$param_longitude,$param_distance);
        static $item_result_each = array();
        //Traverse the range of stations ID
        for ($i=0; $i <count($result) ; $i++) { 
        $mode=M('','','CONFIG_QZDATA');
        $item_sql="select distinct a.stationid, a.stationname,a.latitude,a.longitude,b.ITEMID,b.POINTID from qzdata.qz_dict_stations a,qzdata.qz_dict_stationitems b where a.stationid=b.stationid and a.STATIONID='".$result[$i]['STATIONID']."'";
        //Check out the main items in the range station
        $item_result=$mode->query($item_sql);  
        //var_dump($item_result);
        $item_result_each[]=$item_result;
        }
        //var_dump($item_result_each);
        //echo (count($item_result_each));
        return $item_result_each;
    }

    /* 
    * * @desc 根据两点间的经纬度计算距离 
    * * @param float $lat 纬度值 
    * * @param float $lng 经度值 
    */ 
public function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {  
    $theta = $longitude1 - $longitude2;  
    $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));  
    $miles = acos($miles);  
    $miles = rad2deg($miles);  
    $miles = $miles * 60 * 1.1515;   
    $kilometers = $miles * 1.609344;   
    return round($kilometers,2);  
}
    /* 
    * * @desc 输出浏览器端 
    */ 
    public function sefile(){  
        $data = $_GET[info];  
        $filename = $data;    
        header('Content-Type: application/octet-stream');       
        header('content-disposition:attachment;filename='.basename($filename));
        header('content-length:'.filesize($filename));
        readfile($filename);
        unlink($filename);
    }


}