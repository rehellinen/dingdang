<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/16
 * Time: 11:51
 */

namespace app\common\exception;


class UserException extends BaseException
{
    public $httpCode = 200;
    public $message = '用户不存在';
    public $status= 60000;
}