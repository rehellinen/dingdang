<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/18
 * Time: 20:48
 */

namespace app\api\controller\v1;


use app\common\exception\SuccessException;
use app\common\exception\UserException;
use think\Controller;
use app\common\validate\Api;
use app\common\service\Login as LoginService;
use app\common\service\Token as TokenService;
use app\admin\controller\Token;

class Login extends Controller
{
    public function appLogin()
    {
        (new Api())->goCheck('appLogin');
        $data = (new Api())->getDataByScene('appLogin');

        // 判断用户是否存在、密码是否正确
        $loginService = new LoginService();
        $user = $loginService->check($data);

        // app发放令牌
        $token =  (new TokenService())->get($user['id']);

        if($data && $token) {
            throw new SuccessException([
                'message' => '登录成功',
                'data' => $token
            ]);
        }

        throw new UserException([
            'status' => 0,
            'message' => '登录失败',
        ]);
    }
}