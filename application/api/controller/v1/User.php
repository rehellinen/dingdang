<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/18
 * Time: 20:50
 */

namespace app\api\controller\v1;


use app\common\exception\SuccessException;
use think\Controller;
use app\common\service\Token;
use app\common\validate\User as UserValidate;
use think\Exception;
use app\common\model\User as UserModel;

class User extends Controller
{
    public function edit()
    {
        $uid = Token::getUserID();
        (new UserValidate())->goCheck('edit');
        $data = (new UserValidate())->getDataByScene('edit');
        $res = (new UserModel())->where([
            'id' => $uid
        ])->insert($data);

        if($res){
            throw new SuccessException([
                'message' => '更改信息成功'
            ]);
        }else{
            throw new Exception();
        }
    }

    public function getInfo()
    {
        $uid = Token::getUserID();

        $res = (new UserModel())
            ->where('id='.$uid)
            ->find()
            ->hidden([
                'open_id', 'status'
            ]);

        if($res){
            throw new SuccessException([
                'message' => '获取成功',
                'data' => $res
            ]);
        }else{
            throw new Exception();
        }
    }
}



