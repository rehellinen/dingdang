<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 15:03
 */

namespace app\admin\controller;

use think\Loader;

class Attendance extends BaseController
{
    public function index()
    {
        $attendance = Loader::model('AttendanceException')->getNotDelete();
        $attendanceArray = Loader::model('AttendanceException')->getNotDelete()->toArray();

        return $this->fetch('', [
            'attendance' => $attendance,
            'attendanceArray' => $attendanceArray['data']
        ]);
    }

}