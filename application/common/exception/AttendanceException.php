<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/2/27
 * Time: 16:23
 */

namespace app\common\exception;


class AttendanceException extends BaseException
{
    public $httpCode = 400;
    public $message = '签到失败';
    public $status= 80000;
}