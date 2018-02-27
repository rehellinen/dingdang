<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/2/27
 * Time: 16:27
 */

namespace app\common\exception;


class BannerException extends BaseException
{
    public $httpCode = 200;
    public $message = '获取轮播图失败';
    public $status= 10001;
}