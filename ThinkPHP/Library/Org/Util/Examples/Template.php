<?php
require_once '../PHPWord.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('ddd.docx');
$dd = '_mars.jpg';
$document->setValue('Value1', 'sdsd');
$document->setValue('Value2', 'dsd');
$document->setValue('Value3', $dd);
$document->setValue('Value4', '丿殇叮叮');

$document->save('Solarsystem.docx');
?>