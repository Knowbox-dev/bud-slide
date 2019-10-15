<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/11
 * Time: 10:57 AM
 */
set_time_limit(0);
//error_reporting(0);
ini_set('memory_limit', '2G');
include __DIR__ . "/../vendor/autoload.php";

$pptxFile = __DIR__ . '/xcoutput.pptx';

$outputFile = __DIR__ . '/xc.json';

$data = json_decode(file_get_contents($outputFile), true);

$result = new \BudWebSlide\PptConvert();
$type = 'pptx';
$data = $result->webToPpt($data, $type, $pptxFile);

