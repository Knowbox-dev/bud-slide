<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/11
 * Time: 2:17 PM
 */

namespace BudWebSlide\Shape;

use BudWebSlide\TmpFile;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Color;

class ImageShape implements ShapeInterface
{
    public static function fromPpt2Web(&$currentSlide, $item)
    {
        // TODO: Implement fromPpt2Web() method.
    }

    public static function fromWeb2Ppt(&$currentSlide, $item)
    {
        $imageFilePath = TmpFile::getInstance()->getFileName($item['img_url']);
        // Create a shape (text)
        $shape = $currentSlide->createDrawingShape()
        ->setName($item['name'])
            ->setDescription($item['content'])
            ->setPath($imageFilePath);

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