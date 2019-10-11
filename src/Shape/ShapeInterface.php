<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/11
 * Time: 2:17 PM
 */

namespace BudWebSlide\Shape;

interface ShapeInterface
{

    public static function fromPpt2Web(&$currentSlide, $item);

    /**
     * @param \PhpOffice\PhpPresentation\Slide $currentSlide
     * @param $item
     * @return mixed
     */
    public static function fromWeb2Ppt(&$currentSlide, $item);

}