<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/24
 * Time: 13:29
 */

namespace app\api\controller\v1;


use app\common\exception\AttendanceException;
use app\common\exception\LectureException;
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
        $validate = new AttendanceValidate();
        $validate->goCheck('sign');
        $data = $validate->getDataByScene('sign');

        if(!(new AttendanceModel())->save($data)){
            throw new AttendanceException();
        }else{
            throw new SuccessException([
                '报名成功'
            ]);
        }
    }


    public function sign1()
    {
        (new AttendanceValidate())->goCheck('signIn');
        $data = (new AttendanceValidate())->getDataByScene('signIn');


        $this->checkLatLng($data['lat'], $data['lng'], $data['lecture_id']);

        $uid = (new Token())->getVarsByToken('uid');
        $data['user_id'] = $uid;
        unset($data['lat']);
        unset($data['lng']);
        if(!(new AttendanceModel())->where($data)->find()){
            $res =(new AttendanceModel())->save($data);
        }else{
            throw new AttendanceException([
                'message' => '已经成功签到，不用再次签到'
            ]);
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
     * @throws LectureException 讲座不存在
     */
    private function checkLatLng($lat, $lng, $lecture_id)
    {
        $lecture = Lecture::get($lecture_id);
        if(!$lecture_id){
            throw new LectureException();
        }
        $place = $lecture->place_id->name;

        $res = Map::getLatLngByAddress($place);
        $this->checkDistance($lat, $res['lat'], $lng, $res['lng']);
    }

    private function checkDistance($lat1, $lat2, $lng1, $lng2)
    {
        // 经典计算方式
        if ((abs($lat1) > 90  ) || (abs($lat2) > 90 )) {
            return "纬度错误";
        }
        if ((abs($lng1) > 180  ) || (abs($lng2) > 180 )) {
            return "经度错误";
        }
        $radLat1 = $this->rad($lat1);
        $radLat2 = $this->rad($lat2);
        $a = $radLat1 - $radLat2;
        $b = $this->rad($lng1) - $this->rad($lng2);
        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
        $s = $s * 6378.137;
        // EARTH_RADIUS; 单位Km
        $s = round($s * 10000) / 10000;

        // 整理显示方式
        $result = $s * 1000;
        if ($result > 2000) {
            throw new AttendanceException([
                'message' => '地点相距太远'
            ]);
        }else{
            return true;
        }
    }

    private function rad($d)
    {
        return $d * pi() / 180.0;
    }
}