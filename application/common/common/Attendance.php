<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 15:04
 */

namespace app\common\common;


class Attendance extends BaseModel
{
    public function getUserIdAttr($value)
    {
        $user = new User();
        return $user->find($value);
    }

    public function getLectureIdAttr($value)
    {
        $lecture = new Lecture();
        return $lecture->find($value);
    }

    public function getNotDelete()
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->order('id desc')->paginate(15);
    }
}