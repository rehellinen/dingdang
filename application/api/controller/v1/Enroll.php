<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/24
 * Time: 13:02
 */

namespace app\api\controller\v1;


use app\common\exception\EnrollException;
use app\common\exception\SuccessException;
use app\common\service\Token;
use think\Controller;
use think\Exception;
use app\common\validate\Enroll as EnrollValidate;
use app\common\model\Enroll as EnrollModel;

class Enroll extends Controller
{
    public function enroll()
    {
//        print_r($_POST);exit;
        $validate = (new EnrollValidate);
        $validate->goCheck('enroll');

        $data = $validate->getDataByScene('enroll');
        $uid = (new Token())->getVarsByToken('uid');
        $data['user_id'] = $uid;

        $isExist = (new EnrollModel())->where($data)->find();
        if(!$isExist){
            $res = (new EnrollModel())->save($data);

            if(!$res) {
                throw new Exception();
            } else {
                throw new SuccessException([
                    'message' => '报名 / 收藏成功'
                ]);
            }
        }else{
           throw new EnrollException([
                'status' => '70003',
                'message' => '用户已收藏 \ 报名当前活动，无法重复操作'
           ]);
        }
    }

    public function cancelEnroll()
    {
        $validate = (new EnrollValidate);
        $validate->goCheck('cancelEnroll');

        $data = $validate->getDataByScene('cancelEnroll');
        $uid = (new Token())->getVarsByToken('uid');
        $data['user_id'] = $uid;

        $isExisted = (new EnrollModel())->where($data)->find();

        if($isExisted){
            $res = (new EnrollModel())->where($data)->update(['status' => -1]);
            if(!$res) {
                throw new Exception();
            } else {
                throw new SuccessException([
                    'message' => '取消报名 / 收藏成功'
                ]);
            }
        }else{
            throw new EnrollException([
                'message' => '用户没有收藏 \ 报名当前的活动',
                'status' => '70002'
            ]);
        }
    }

    public function isEnroll()
    {
        $validate = (new EnrollValidate());
        $validate->goCheck('isEnroll');

        $data = $validate->getDataByScene('isEnroll');
        $uid = (new Token())->getVarsByToken('uid');
        $data['user_id'] = $uid;

        $res = (new EnrollModel())->where($data)->find();

        if(!$res) {
            throw new EnrollException([
                'message' => '未报名 / 收藏',
                'status' => 70002
            ]);
        } else {
            throw new SuccessException([
                'message' => '已报名 / 收藏'
            ]);
        }
    }

    public function getEnroll()
    {
        $validate = (new EnrollValidate());
        $validate->goCheck('getEnroll');

        $data = $validate->getDataByScene('getEnroll');
        $uid = (new Token())->getVarsByToken('uid');
        $data['user_id'] = $uid;

        $res = (new EnrollModel())->where($data)->select();

        if(!$res) {
            throw new EnrollException([
                'message' => '没有报名的记录',
                'status' => 70001
            ]);
        } else {
            throw new SuccessException([
                'message' => '获取报名记录成功',
                'data' => $res
            ]);
        }
    }
}