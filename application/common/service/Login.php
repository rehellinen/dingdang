<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/16
 * Time: 11:36
 */
namespace app\common\service;

use app\common\exception\UserException;
use app\common\model\User;

class Login
{
    public function check($data)
    {
        $telephone = $data['telephone'];

        $user = (new User())->getLoginUser($telephone, 1);

        if(!$user) {
            throw new UserException();
        }

        $res = $this->comparePassword($user, $data['password']);

        if(!$res) {
            throw new UserException([
                'message' => '密码错误',
                'status' => '60001'
            ]);
        }

        return $user;
    }

    public function checkCMS($data)
    {
        $telephone = $data['telephone'];

        $user = (new User())->getLoginUser($telephone, 2);

        if(!$user) {
            throw new UserException();
        }

        $res = $this->comparePassword($user, $data['password']);

        if(!$res) {
            throw new UserException([
                'message' => '密码错误',
                'status' => '60001'
            ]);
        }

        return $user;
    }

    private function comparePassword($user, $appPassword)
    {
        $md5Password = md5(config('md5_pre') . $appPassword . $user['salt']);
        if($md5Password == $user['password']) {
            return true;
        } else {
            return false;
        }
    }
}