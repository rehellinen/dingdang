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
    // HTTP 状态码 404, 200
    public $code = 400;

    //具体错误信息
    public $msg = '参数错误';

    //自定义的错误码
    public $status = 10000;
}