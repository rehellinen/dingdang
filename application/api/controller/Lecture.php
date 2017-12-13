<?php
namespace app\api\controller;

use think\Controller;
use app\common\exception\LectureException;

/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/18
 * Time: 0:06
 */
class Lecture extends Controller
{
    public function getAllLecture()
    {

        $lectures = model('Lecture')->getNormalLecture();

        if(!$lectures) {
            throw new LectureException();
        }

        return show(1,'获取全部讲座信息成功', $lectures);
    }

    public function getAllActivity()
    {
        $activities = model('Lecture')->getNormalActivity();

        if(!$activities) {
            throw new LectureException();
        }

        return show(1,'获取全部活动信息成功', $activities);
    }

    public function getLectureById($id)
    {
        $lecture = model('Lecture')->get($id);
        if(!$lecture) {
            throw new LectureException();
        }

        return show(1,'获取讲座信息成功', $lecture);

    }
}