<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 11:27
 */

namespace app\admin\controller;


use think\Loader;

class Index extends BaseController
{
    public function index()
    {
        $userCount = Loader::model('user')->getUserCount();

        $lectureCount = Loader::model('lecture')->getLectureCount();

        $placeCount = Loader::model('place')->getPlaceCount();

        $enrollCount = Loader::model('enroll')->getEnrollCount();

        return $this->fetch('', [
            'userCount' => $userCount,
            'lectureCount' => $lectureCount,
            'placeCount' => $placeCount,
            'enrollCount' => $enrollCount
        ]);
    }

    public function test()
    {
        return $this->fetch();
    }
}