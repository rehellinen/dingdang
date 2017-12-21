<?php

/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/7
 * Time: 15:17
 */

namespace app\common\exception;

use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    private $httpCode;
    private $message;
    private $status;

    public function render(\Exception $e)
    {
        if($e instanceof BaseException){
            //如果是自定义的异常
            $this->httpCode = $e->httpCode;
            $this->message = $e->message;
            $this->status = $e->status;
        }else{
            if(config('app_debug')){
                return parent::render($e);
            }else{
                $this->httpCode = 500;
                $this->message = '服务器内部错误';
                $this->status = 99999;
                $this->recordErrorLog($e);
            }
        }

        //获取请求URL
        $url = Request::instance()->url();

        $result = [
            'status' => $this->status,
            'message' => $this->message,
            'data' => ['request_url' => $url]
        ];
        return json($result, $this->httpCode);
    }

    private function recordErrorLog(\Exception $e)
    {
        Log::init([
           'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(), 'error');
    }
}