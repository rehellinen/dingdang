<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/18
 * Time: 20:50
 */

namespace app\api\controller\v1;


use app\common\exception\SuccessException;
use app\common\exception\UserException;
use think\Controller;
use app\common\service\Register;
use app\common\service\Token;
use app\common\validate\User as UserValidate;
use think\Exception;

class User extends Controller
{
    public function register()
    {
        (new UserValidate())->goCheck('register');
        $data = (new UserValidate())->getDataByScene('register');

        $res = (new Register)->encryptSave($data);

        if($res){
            throw new SuccessException([
                'message' => '注册成功'
            ]);
        }else{
            throw new Exception();
        }
    }

    public function getInfo()
    {
        $uid = (new Token())->getVarsByToken('uid');

        $res = model('User')->where('id='.$uid)->find();

        if($res){
            throw new SuccessException([
                'message' => '获取成功'
            ]);
        }else{
            throw new Exception();
        }
    }
}



