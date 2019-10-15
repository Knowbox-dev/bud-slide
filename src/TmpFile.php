<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/11
 * Time: 12:45 PM
 */

namespace BudWebSlide;


class TmpFile
{

    static $instance = null;
    static $tmpFilePath = '/tmp/budppt/';

    public function __construct($tmpFilePath = '/tmp/budppt/')
    {
        self::$tmpFilePath = $tmpFilePath;
        if (! @mkdir(self::$tmpFilePath, 0777, true) && ! is_dir(self::$tmpFilePath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', self::$tmpFilePath));
        }
    }

    public static function getInstance($tmpFilePath = '/tmp/budppt/')
    {
        if (empty(self::$instance)) {
            self::$instance = new self($tmpFilePath);
        }

        return self::$instance;

    }

    public function getFileName($url)
    {
        $tmpfileName = md5($url);

        $imageFilePath = self::$tmpFilePath . DIRECTORY_SEPARATOR . $tmpfileName . '.png';
        if (! file_exists($imageFilePath) || filesize($imageFilePath) < 1) {
            $content = file_get_contents($url);
            file_put_contents($imageFilePath, $content);
        }

        return $imageFilePath;
    }

    public function __destruct()
    {
        @unlink(self::$tmpFilePath);
    }

}