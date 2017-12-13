<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/18
 * Time: 20:50
 */

namespace app\api\controller;


use think\Controller;
use app\common\validate\Api;
use app\common\service\Register;
use app\common\service\Token;

class User extends Controller
{
    public function register()
    {
        (new Api())->goCheck('register');
        $data = (new Api())->getDataByScene('register');

        $res = (new Register)->encryptSave($data);

        if($res){
            return show(1,'注册成功');
        }else{
            return show(0, '注册失败');
        }
    }

    public function getInfo()
    {
        $uid = (new Token())->getVarsByToken('uid');

        $res = model('User')->where('id='.$uid)->find();

        if($res){
            return show(1,'获取成功', $res);
        }else{
            return show(0, '获取失败');
        }
    }
}



