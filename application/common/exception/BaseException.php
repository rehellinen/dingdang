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
    public $httpCode = 200;

    // 具体错误信息
    public $message = '参数错误';

    // 自定义的错误码
    public $status = 10000;

    // 返回的数据
    public $data = [];

    public function __construct($params = [])
    {
        if(!is_array($params)){
            return ;
        }

        if(array_key_exists('httpCode', $params)){
            $this->code = $params['httpCode'];
        }
        if(array_key_exists('message', $params)){
            $this->message = $params['message'];
        }
        if(array_key_exists('status', $params)){
            $this->status = $params['status'];
        }
        if(array_key_exists('data', $params)){
            $this->data['data'] = $params['data'];
        }
    }
}