<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/11
 * Time: 12:45 PM
 */

namespace BudWebSlide;

use PhpOffice\PhpPresentation\Slide\Transition;
use \PhpOffice\PhpPresentation\Style\Color as StyleColor;
use PhpOffice\PhpPresentation\Slide\Background\Color;
use PhpOffice\PhpPresentation\Slide\Background\Image;

class Slide
{
    static $animates = [
        'fade' => ['In' => 'fadeIn', 'Out' => 'fadeOut'], //渐隐渐显
        'slideInEW' => ['In' => 'slideInLeft', 'Out' => 'slideOutRight'], //左右推移
        'slideInSN' => ['In' => 'slideInDown', 'Out' => 'slideOutDown'], //上下推移
        'flipY' => ['In' => 'flipInY', 'Out' => 'flipOutY'], //左右翻页
        'flipX' => ['In' => 'flipInX', 'Out' => 'flipOutX'], //上下翻页
    ];

    static $animatesInPpt = [
        'fade' => Transition::TRANSITION_FADE,
        'slideInEW' => Transition::TRANSITION_PUSH_RIGHT,
        'slideInSN' => Transition::TRANSITION_PUSH_DOWN,
        'flipY' => Transition::TRANSITION_SPLIT_OUT_VERTICAL,
        'flipX' => Transition::TRANSITION_SPLIT_OUT_HORIZONTAL,
    ];

    /**
     * @param \PhpOffice\PhpPresentation\Slide $slide
     * @param $data
     */
    public static function setBackground(&$slide, $data, $index)
    {
        if ($data['isSetBackgroundAllPage']) {
            self::setBackGroundOnData($slide, $data);
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
            return true;
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

    public static function setTransition(&$slide, $data, $index)
    {
        if ($data['isSetAnimationAllPage']) {
            self::setTransitionOnData($slide, $data);
        }

        return self::setTransitionOnData($slide, $data['pages'][$index]);
    }

    /**
     * @param \PhpOffice\PhpPresentation\Slide $slide
     * @param $data
     */
    public static function setTransitionOnData(&$slide, $data)
    {
        if ($data['animateType'] != 1) {
            return null;
        }
        if ($data['animateType'] == 1 && ! empty($data['animateName'])) {
            $type = self::checkTransitionType($data['animateName']);
            if ($type) {
                $t = new Transition();
                $t->setSpeed(Transition::SPEED_FAST);
                $t->setTransitionType($type);
                return $slide->setTransition($t);
            }
            return null;
        }

    }
    public static function checkTransitionType($data)
    {
        $key = array_search($data, self::$animates);
        if ($key) {
            return self::$animatesInPpt[$key];
        }
        return null;
    }
    public static function hexColor($color)
    {
        return dechex(($color[0] << 16) | ($color[1] << 8) | $color[2]);
    }
}