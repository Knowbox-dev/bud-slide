<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/11
 * Time: 10:57 AM
 */
set_time_limit(0);
error_reporting(0);
ini_set('memory_limit','2G');
include __DIR__ . "/../vendor/autoload.php";

$pptxFile = __DIR__ . '/shuyishu.pptx';
$outputFile = __DIR__ . '/output.json';
#打开 ppt
$readers = [
    'odp' => 'ODPresentation',
    'ppt' => 'PowerPoint97',
    'pptx' => 'PowerPoint2007',
    'phppt' => 'Serialized',
];
$oReader = \PhpOffice\PhpPresentation\IOFactory::createReader('PowerPoint2007');
$ppt = $oReader->load($pptxFile);
#文档属性
$dp = $ppt->getDocumentProperties();
$dp->getTitle();
$dp->getCreator();
$dp->getLastModifiedBy();

#ppt 属性
$pp = $ppt->getPresentationProperties();
$pp->getLastView();
$pp->getZoom();
$pp->isMarkedAsFinal();

#布局
$layout = $ppt->getLayout();
$cx = $layout->getCX();
$cy = $layout->getCY();
//print_r([$cx, $cy]);

#获取 ppt 页数
$slideCount = $ppt->getSlideCount();

$slides = $ppt->getAllSlides();
foreach ($slides as $slide)
{
    $slide->getBackground();
    $slide->getAnimations();
    $slide->getName();
    $slide->getNote();
    $sc = $slide->getShapeCollection();
    foreach ($sc->getIterator() as $sci)
    {
    }
}
#获取当前页的元素

#获取元素的样式



#打开 ppt
#获取 ppt 页数

#获取当前页的元素

#获取元素的样式
