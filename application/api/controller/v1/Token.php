<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/2/26
 * Time: 22:45
 */

namespace app\api\controller\v1;


use app\common\exception\SuccessException;
use app\common\exception\TokenException;
use think\Cache;
use think\Controller;
use think\Request;
use \app\common\service\Token as TokenService;

class Token extends Controller
{
    public function getToken($code = '')
    {
        $token = (new TokenService($code))->get();
        throw new SuccessException([
            'message' => '获取令牌成功',
            'data' => [
                'token' => $token
            ]
        ]);
    }

    public function checkToken()
    {
        $token = Request::instance()->header('token');
        $res = Cache::get($token);
        if(!$res){
            throw new TokenException();
        }else{
            throw new SuccessException([
                'message' => 'Token未过期'
            ]);
        }
    }
}