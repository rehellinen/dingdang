<?php
namespace app\api\controller\v1;

use think\Controller;
use app\common\exception\LectureException;
use app\common\exception\SuccessException;
use app\common\model\Lecture as LectureModel;

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

        $lectures = (new LectureModel())->getNormalLecture();

        if($lectures->isEmpty()) {
            throw new LectureException();
        }
        throw new SuccessException([
            'message' => '获取全部讲座信息成功',
            'data' => $lectures
        ]);
    }

    public function getLectureById($id)
    {
        $lecture = (new LectureModel())->getById($id);
        if(!$lecture) {
            throw new LectureException();
        }

        throw new SuccessException([
            'message' => '获取讲座信息成功',
            'data' => $lecture
        ]);
    }
}