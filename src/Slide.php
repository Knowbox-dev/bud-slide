<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/11
 * Time: 12:45 PM
 */

namespace BudWebSlide;

use \PhpOffice\PhpPresentation\Style\Color as StyleColor;
use PhpOffice\PhpPresentation\Slide\Background\Color;
use PhpOffice\PhpPresentation\Slide\Background\Image;

class Slide
{
    /**
     * @param \PhpOffice\PhpPresentation\Slide $slide
     * @param $data
     */
    public static function setBackground(&$slide, $data, $index)
    {
        if ($data['isSetBackgroundAllPage']) {
            return self::setBackGroundOnData($slide, $data);
        }

        return self::setBackGroundOnData($slide, $data['pages'][$index]);
    }

    /**
     * @param \PhpOffice\PhpPresentation\Slide $slide
     * @param $data
     */
    public static function setBackGroundOnData(&$slide, $data)
    {
        if ($data['backgroundType'] == 0) {
            return $slide->setBackground(null);
        }
        if ($data['backgroundType'] == 1) {
            $bg = new Color();
            $color = new StyleColor();

            $color->setRGB(self::hexColor($data['backgroundColor']), dechex($data['backgroundColor'][3] * 255));
            $bg->setColor($color);

            return $slide->setBackground($bg);
        }
        if ($data['backgroundType'] == 2 && ! empty($data['backgroundImage'])) {
            $bg = new Image();
            $bg->setPath(TmpFile::getInstance()->getFileName($data['backgroundImage']));

            return $slide->setBackground($bg);
        }

    }

    public static function hexColor($color)
    {
        return dechex(($color[0] << 16) | ($color[1] << 8) | $color[2]);
    }
}