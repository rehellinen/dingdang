<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/10
 * Time: 23:58
 */
namespace app\admin\controller;

use app\common\service\Login as LoginService;
use think\Controller;
Use app\common\validate\User;
use think\Session;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function check()
    {
        $validate = (new User());
        if(!$validate->goCheck('login')){
            return show(0, $validate->getError());
        }
        $data = $validate->getDataByScene('login');

        // 判断用户是否存在、密码是否正确
        $loginService = new LoginService();
        $user = $loginService->checkCMS($data);

        if($user) {
            Session::set('loginUser', $user, 'admin');
            return show(1,'登录成功');
        }
        return show(0,'登录失败');
    }



    public function logOut()
    {
        Session::set('loginUser', null, 'admin');
        $this->redirect('admin/login/index');
    }
}