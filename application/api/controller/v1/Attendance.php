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

class Attendance extends Controller
{
    public function sign()
    {
        $validate = new AttendanceValidate();
        $validate->goCheck('signIn');

        $data = $validate->getDataByScene('signIn');
        $uid = (new Token())->getVarsByToken('uid');
        $data['user_id'] = $uid;

        if(!model('Attendance')->where($data)->find()){
            $res = model('Attendance')->save($data);
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
}