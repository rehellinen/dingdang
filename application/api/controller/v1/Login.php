<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/18
 * Time: 20:48
 */

namespace app\api\controller\v1;


use app\common\exception\SuccessException;
use think\Controller;
use app\common\validate\Api;
use app\common\service\Login as LoginService;
use app\common\service\Token as TokenService;
use app\common\validate\User;

class Login extends Controller
{
    public function appLogin()
    {
        (new User())->goCheck('login');
        $data = (new User())->getDataByScene('login');

        // 判断用户是否存在、密码是否正确
        $loginService = new LoginService();
        $user = $loginService->check($data);

        // app发放令牌
        $token =  (new TokenService())->get($user['id']);

        if($user && $token) {
            throw new SuccessException([
                'message' => '登录成功',
                'data' => $token
            ]);
        }
    }
}