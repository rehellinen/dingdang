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
use think\Request;

class Enroll extends Controller
{
    public function enroll()
    {
        $post = Request::instance()->post();
        $lectureId = $post['lecture_id'];
        $status = $post['status'];

        $uid = (new Token())->getVarsByToken('uid');

        $data = [
            'lecture_id' =>$lectureId,
            'user_id' => $uid,
            'status' => $status
        ];

        $res = model('Enroll')->save($data);

        if(!$res) {
            throw new Exception();
        } else {
            throw new SuccessException([
                'message' => '报名成功'
            ]);
        }
    }

    public function isEnroll($id, $status)
    {
        $uid = (new Token())->getVarsByToken('uid');
        $data = [
            'lecture_id' =>$id,
            'user_id' => $uid,
            'status' => $status
        ];
        $res = model('Enroll')->where($data)->find();

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

    public function getEnroll($status)
    {
        $uid = (new Token())->getVarsByToken('uid');
        $data = [
            'user_id' => $uid,
            'status' => $status
        ];
        $res = model('Enroll')->where($data)->select();

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