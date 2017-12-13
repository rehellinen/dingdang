<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/24
 * Time: 13:29
 */

namespace app\api\controller;


use think\Controller;
use think\Request;
use app\common\service\Token;

class Attendance extends Controller
{
    public function sign()
    {
        $post = Request::instance()->post();
        $lectureId = $post['lecture_id'];
        $address = $post['address'];

        $uid = (new Token())->getVarsByToken('uid');

        $data = [
            'lecture_id' => $lectureId,
            'user_id' => $uid,
            'address' => $address
        ];

        $res = model('Attendance')->save($data);

        if(!$res) {
            return show(0, '签到失败');
        } else {
            return show(1, '签到成功');
        }
    }

//    public function get()
//    {
//        $attendance = model('Attendance')->with(['userId', 'lecture_id'])->select();
//        return show(1,'test', $attendance);
//    }
}