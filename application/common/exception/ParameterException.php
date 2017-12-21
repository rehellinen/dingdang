<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/7
 * Time: 18:25
 */

namespace app\common\exception;


class ParameterException extends BaseException
{
    public $httpCode = 400;
    public $message = '参数错误';
    public $status= 10000;
}