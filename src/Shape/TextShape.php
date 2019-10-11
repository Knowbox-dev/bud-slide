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

class TextShape implements ShapeInterface
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
        $shape = $currentSlide->createRichTextShape()
            ->setHeight($item['style']['height'])
            ->setWidth($item['style']['width'])
            ->setOffsetX($item['style']['left'])
            ->setOffsetY($item['style']['top']);

        if (isset($item['style']['textAlign'])) {
            $align = self::$textAligns[$item['style']['textAlign']] ?? Alignment::HORIZONTAL_GENERAL;
            $shape->getActiveParagraph()->getAlignment()->setHorizontal($align);

        }
        $content = trim(preg_replace('/\<br(\s*)?\/?\>/i', PHP_EOL, $item['content']));
        if (empty($content)) {
            return null;
        }
        $textRun = $shape->createTextRun($content);
        if (isset($item['style']['color'])) {
            $color = ltrim($item['style']['color'], '#');

            $textRun->getFont()->setColor(new Color($color));
        }
        if (isset($item['style']['fontWeight'])) {
            $textRun->getFont()->setBold($item['style']['fontWeight'] == 'Bold' ?: false);
        }
        if (isset($item['style']['color'])) {
            $textRun->getFont()->setSize((int)$item['style']['fontSize']);
        }

        return $shape;
    }
}