<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/10
 * Time: 23:58
 */
namespace app\admin\controller;

use app\common\service\Login as LoginService;
use app\common\validate\Api;
use think\Controller;
use think\Request;
use think\Session;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function check()
    {
        (new Api())->goCheck('appLogin');
        $data = (new Api())->getDataByScene('appLogin');

        // 判断用户是否存在、密码是否正确
        $loginService = new LoginService();
        $user = $loginService->checkCMS($data);

        if($user) {
            Session::set('loginSeller', $user, 'admin');
            return show(1,'登录成功');
        }
        return show(0,'登录失败');
    }



    public function logOut()
    {
        Session::set('loginSeller', null, 'admin');
        $this->redirect('admin/login/index');
    }
}