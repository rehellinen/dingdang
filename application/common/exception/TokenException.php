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
    public $httpCode = 400;
    public $message = 'Token已过期或无效Token';
    public $status= 10004;
}