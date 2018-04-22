<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/24
 * Time: 13:29
 */

namespace app\api\controller\v1;


use app\common\exception\AttendanceException;
use app\common\exception\SuccessException;
use think\Controller;
use app\common\validate\Attendance as AttendanceValidate;
use app\common\service\Token;
use app\common\model\Attendance as AttendanceModel;
use map\Map;
use app\common\model\Lecture;

class Attendance extends Controller
{
    public function sign()
    {
        (new AttendanceValidate())->goCheck('signIn');
        $data = (new AttendanceValidate())->getDataByScene('signIn');


        $this->checkLatLng($data['lat'], $data['lng'], $data['lecture_id']);

        $uid = (new Token())->getVarsByToken('uid');
        $data['user_id'] = $uid;

        if(!(new AttendanceModel())->where($data)->find()){
            $res =(new AttendanceModel())->save($data);
        }else{
            $res = null;
        }

        if(!$res) {
            throw new AttendanceException();
        } else {
            throw new SuccessException([
                'message' => '签到成功'
            ]);
        }
    }

    /**
     * 检查经纬度是否在误差范围
     * @param $lat
     * @param $lng
     * @param $lecture_id
     */
    private function checkLatLng($lat, $lng, $lecture_id)
    {
        $lecture = Lecture::get($lecture_id);
        print_r($lecture);exit;
        $place = $lecture_id['place_id']['name'];

        $res = Map::getLatLngByAddress($place);
        print_r($res);exit;
    }
}