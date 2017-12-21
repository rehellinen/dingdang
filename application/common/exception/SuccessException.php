<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/16
 * Time: 11:15
 */

namespace app\common\exception;


class SuccessException extends BaseException
{
    public $httpCode = 200;
    public $message = '成功';
    public $status= 90000;
}