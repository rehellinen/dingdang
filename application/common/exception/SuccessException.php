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
    // HTTP 状态码 404, 200
    public $code = 200;

    //具体错误信息
    public $msg = '成功';

    //自定义的错误码
    public $status = 90000;
}