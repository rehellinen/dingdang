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
    // HTTP 状态码 404, 200
    public $code = 400;

    //具体错误信息
    public $msg = '获取讲座信息失败';

    //自定义的错误码
    public $errorCode = 30000;
}