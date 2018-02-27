<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/24
 * Time: 13:02
 */

namespace app\api\controller\v1;


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

        $uid = (new Token())->getVarsByToken('uid');

        $data = [
            'lecture_id' =>$lectureId,
            'user_id' => $uid
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

    public function isEnroll($id)
    {
        $uid = (new Token())->getVarsByToken('uid');

        $data = [
            'lecture_id' =>$id,
            'user_id' => $uid
        ];

        $res = model('Enroll')->where($data)->find();

        if(!$res) {
            throw new SuccessException([
                'message' => '预报名'
            ]);
        } else {
            throw new SuccessException([
                'message' => '已报名'
            ]);
        }
    }
}