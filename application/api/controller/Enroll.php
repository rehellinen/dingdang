<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/24
 * Time: 13:02
 */

namespace app\api\controller;


use app\common\service\Token;
use think\Controller;
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
            return show(0, '报名失败');
        } else {
            return show(1, '报名成功');
        }
    }
}