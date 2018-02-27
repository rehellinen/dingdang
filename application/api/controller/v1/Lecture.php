<?php
namespace app\api\controller\v1;

use think\Controller;
use app\common\exception\LectureException;
use app\common\exception\SuccessException;

/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/18
 * Time: 0:06
 */
class Lecture extends Controller
{
    public function getAllLectures()
    {

        $lectures = model('Lecture')->getNormalLecture();

        if(!$lectures) {
            throw new LectureException();
        }
        throw new SuccessException([
            'message' => '获取全部讲座信息成功',
            'data' => $lectures
        ]);
    }

    public function getAllActivities()
    {
        $activities = model('Lecture')->getNormalActivity();

        if(!$activities) {
            throw new LectureException();
        }

        throw new SuccessException([
            'message' => '获取全部活动信息成功',
            'data' => $activities
        ]);
    }

    public function getLectureById($id)
    {
        $lecture = model('Lecture')->with('placeId')->getById($id);
        if(!$lecture) {
            throw new LectureException();
        }

        throw new SuccessException([
            'message' => '获取全部活动信息成功',
            'data' => $lecture
        ]);
    }
}