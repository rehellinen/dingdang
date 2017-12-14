<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/7
 * Time: 16:03
 */

namespace app\common\exception;


use think\Exception;
use Throwable;

class BaseException extends Exception
{
    // HTTP 状态码 404, 200
    public $code = 400;

    //具体错误信息
    public $msg = '参数错误';

    //自定义的错误码
    public $status = 10000;

    public function __construct($params = [])
    {
        if(!is_array($params)){
            return ;
        }

        if(array_key_exists('code', $params)){
            $this->code = $params['code'];
        }
        if(array_key_exists('msg', $params)){
            $this->msg = $params['msg'];
        }
        if(array_key_exists('errorCode', $params)){
            $this->status = $params['status'];
        }
    }
}