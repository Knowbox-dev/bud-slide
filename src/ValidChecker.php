<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2019/10/11
 * Time: 12:45 PM
 */

namespace BudWebSlide;


class ValidChecker
{
    protected $errCode;
    protected $errMessage;

    public function handle($data)
    {
        if(count($data['EditData']) == count($data['SlidePageData']['nodes']) && count($data['SlidePageData']['pages']) == count($data['SlidePageData']['nodes'])) {
            return true;
        }
        $this->error('解析数据异常，页数不匹配');
    }

    public function error($message, $code = -999)
    {
        $this->errCode = $code;
        $this->errMessage = $message;
        throw new \Exception($message, $code);
    }
}