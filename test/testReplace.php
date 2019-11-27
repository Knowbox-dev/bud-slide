<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/11/27
 * Time: 8:14 PM
 */

$content1 = '<div sdf=sd>11</div>';
$content2 = '<div sdf=sd>11</div><div sdf=sd>22</div>';

function replaceAll($content)
{
    $content = trim(preg_replace('/\<\/div\>(\s*)?\<div.*?\>/i', PHP_EOL, $content));
    $content = preg_replace('/\<\/div\>/i', '', $content);
    $content = preg_replace('/\<div.*?\>/i', '', $content);
    return $content;
}

echo replaceAll($content2);
