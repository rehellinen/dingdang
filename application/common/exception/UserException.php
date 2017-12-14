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
    // HTTP 状态码 404, 200
    public $code = 403;

    //具体错误信息
    public $msg = '用户不存在';

    //自定义的错误码
    public $status = 60000;
}