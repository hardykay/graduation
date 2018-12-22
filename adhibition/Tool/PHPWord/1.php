<?php

require_once 'bootstrap.php';
//$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template.docx');
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Template.docx');
$templateProcessor->setValue('Name', 'John Doe');
//$templateProcessor->setValue(array('City', 'Street'), array('Detroit', '12th Street'));
$templateProcessor->saveAs('Sample_07_TemplateCloneRow.docx');

