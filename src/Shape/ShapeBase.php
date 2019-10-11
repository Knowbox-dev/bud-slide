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

class ShapeBase implements ShapeInterface
{
    public static function setShapeBasic($shape, $item)
    {
        return  $shape
            ->setHeight($item['style']['height'])
            ->setWidth($item['style']['width'])
            ->setOffsetX($item['style']['left'])
            ->setOffsetY($item['style']['top']);
    }

    public static function fromPpt2Web(&$currentSlide, $item)
    {
        // TODO: Implement fromPpt2Web() method.
    }

    public static function fromWeb2Ppt(&$currentSlide, $item)
    {
        // TODO: Implement fromWeb2Ppt() method.
    }

}