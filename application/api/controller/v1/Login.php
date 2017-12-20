<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/18
 * Time: 20:48
 */

namespace app\api\controller\v1;


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
            return show(1,'登录成功', ['token' => $token]);
        }

        return show(0,'登录失败', ['token' => '']);

    }
}