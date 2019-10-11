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
#打开 ppt
$readers = [
    'odp' => 'ODPresentation',
    'ppt' => 'PowerPoint97',
    'pptx' => 'PowerPoint2007',
    'phppt' => 'Serialized',
];
$data = json_decode(file_get_contents($outputFile), true);
$SlidePageData = $data['SlidePageData'];
$isSetAnimationAllPage = $data['SlidePageData']['isSetAnimationAllPage'];
$isSetBackgroundAllPage = $data['SlidePageData']['isSetBackgroundAllPage'];
$backgroundType = $data['SlidePageData']['backgroundType'];
$backgroundColor = $data['SlidePageData']['backgroundColor'];
$backgroundImage = $data['SlidePageData']['backgroundImage'];

$objPHPPresentation = new \PhpOffice\PhpPresentation\PhpPresentation();
$valid = new \BudWebSlide\ValidChecker();
$valid->handle($data);
$i = 0;
$count  = count($data['EditData']);
for ($i = 0; $i < $count; $i++) {
    $Page = $data['EditData'][$i];
    // Create slide
    if ($i == 0) {
        $currentSlide = $objPHPPresentation->getActiveSlide();

    } else {
        $currentSlide = $objPHPPresentation->createSlide();
    }
    \BudWebSlide\Slide::setBackground($currentSlide, $data['SlidePageData'], $i);
    foreach ($Page as $item) {
        if ($item['type'] == 'img') {
            \BudWebSlide\Shape\ImageShape::fromWeb2Ppt($currentSlide, $item);
        }

        if ($item['type'] == 'word') {
            \BudWebSlide\Shape\TextShape::fromWeb2Ppt($currentSlide, $item);
        }
    }
}

//    echo count($objPHPPresentation->getAllSlides());exit;
$oWriterPPTX = \PhpOffice\PhpPresentation\IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');
@unlink($pptxFile);
$oWriterPPTX->save($pptxFile);
