<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/16
 * Time: 17:48
 */

namespace app\common\exception;


class LectureException extends BaseException
{

    public $httpCode = 404;
    public $message = '获取讲座信息失败';
    public $status= 30000;
}