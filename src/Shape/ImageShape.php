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

class ImageShape extends ShapeBase implements ShapeInterface
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

        $shape = self::setShapeBasic($shape, $item);

        return $shape;
    }
}