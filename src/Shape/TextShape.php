<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/11
 * Time: 2:17 PM
 */

namespace BudWebSlide\Shape;

use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Color;

class TextShape extends ShapeBase implements ShapeInterface
{
    public static $textAligns = [
        'left' => Alignment::HORIZONTAL_LEFT,
        'right' => Alignment::HORIZONTAL_RIGHT,
        'center' => Alignment::HORIZONTAL_CENTER,
        'justify' => Alignment::HORIZONTAL_JUSTIFY,
    ];

    public static function fromPpt2Web(&$currentSlide, $item)
    {
        // TODO: Implement fromPpt2Web() method.
    }

    public static function fromWeb2Ppt(&$currentSlide, $item)
    {
        // TODO: Implement fromWeb2Ppt() method.

        // Create a shape (text)
        $shape = $currentSlide->createRichTextShape();

        $shape = self::setShapeBasic($shape, $item);

        if (isset($item['style']['textAlign'])) {
            $align = self::$textAligns[$item['style']['textAlign']] ?? Alignment::HORIZONTAL_GENERAL;
            $shape->getActiveParagraph()->getAlignment()->setHorizontal($align);

        }
//        echo '原文本:'. $item['content']. "\r\n";
        $content = trim(preg_replace('/\<br(\s*)?\/?\>/i', PHP_EOL, $item['content']));
        if (empty($content)) {
            return null;
        }

//        echo '写入文本:'. $content. "\r\n";
        $textRun = $shape->createTextRun($content);

        if (isset($item['style']['fontFamily'])) {
//            echo '设置颜色:'. $item['style']['fontFamily']. "\r\n";
            $textRun->getFont()->setName($item['style']['fontFamily']);
        }

        if (isset($item['style']['color'])) {
            $color = 'FF' . ltrim($item['style']['color'], '#');

//            echo '设置颜色:'. $color. "\r\n";
            $textRun->getFont()->setColor(new Color($color));
        }

        if (isset($item['style']['fontWeight'])) {
            $textRun->getFont()->setBold($item['style']['fontWeight'] == 'Bold' ?: false);
        }

        if (isset($item['style']['fontSize'])) {
//            echo '设置大小:'. $item['style']['fontSize']. "\r\n";
            $textRun->getFont()->setSize((int)$item['style']['fontSize']);
        }

        return $shape;
    }
}