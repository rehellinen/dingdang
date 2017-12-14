<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/16
 * Time: 11:36
 */
namespace app\common\service;

use app\common\exception\UserException;
use think\Loader;

class Login
{
    public function check($data)
    {
        $telephone = $data['telephone'];

        $user = Loader::model('User')->getLoginUser($telephone, 1);

        if(!$user) {
            throw new UserException();
        }

        $res = $this->comparePassword($user, $data['password']);

        if(!$res) {
            throw new UserException([
                'msg' => '密码错误',
                'status' => '60001'
            ]);
        }

        return $user;
    }

    public function checkCMS($data)
    {
        $telephone = $data['telephone'];

        $user = Loader::model('User')->getLoginUser($telephone, 2);

        if(!$user) {
            throw new UserException();
        }

        $res = $this->comparePassword($user, $data['password']);

        if(!$res) {
            throw new UserException([
                'msg' => '密码错误',
                'status' => '60001'
            ]);
        }

        return $user;
    }

    private function comparePassword($user, $appPassword)
    {
        $md5Password = md5(config('setting.md5_pre') . $appPassword . $user['salt']);

        if($md5Password == $user['password']) {
            return true;
        } else {
            return false;
        }
    }
}