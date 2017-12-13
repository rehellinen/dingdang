<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/16
 * Time: 16:25
 */

namespace app\common\exception;


class TokenException extends BaseException
{
    // HTTP 状态码 404, 200
    public $code = 400;

    //具体错误信息
    public $msg = 'Token已过期或无效Token';

    //自定义的错误码
    public $errorCode = 10004;
}