<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/2/27
 * Time: 13:30
 */

namespace app\common\exception;


class EnrollException extends BaseException
{
    public $httpCode = 200;
    public $message = '报名失败';
    public $status= 70000;
}