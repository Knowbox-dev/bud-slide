<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/11
 * Time: 10:57 AM
 */
set_time_limit(0);
ini_set('memory_limit','2G');
include __DIR__ . "/../vendor/autoload.php";

$pptxFile = __DIR__ . '/xcoutput.pptx';
$outputFile = __DIR__ . '/output.json';

$result = new \BudWebSlide\PptConvert();
$type = 'pptx';

$json = $result->pptToWeb($pptxFile, $type, '/tmp');

file_put_contents($outputFile, json_encode($json));
