<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/16
 * Time: 14:25
 */

namespace app\common\service;


use think\Exception;

class Register
{
    public function encryptSave($data)
    {
        $password = $data['password'];
        $md5 = $this->encrypt($password);

        $data['salt'] = $md5[0];
        $data['password'] = $md5[1];

        $res = model('User')->save($data);
        if(!$res) {
            throw new Exception();
        }
        return $res;
    }

    //密码算法
    private function encrypt($password)
    {
        $time = time();
        $salt = substr($time, 5, 5);
        $md5Password = md5(config('setting.md5_pre') . $password . $salt);

        return [$salt, $md5Password];
    }
}