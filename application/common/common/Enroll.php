<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 15:08
 */

namespace app\common\common;


class Enroll extends BaseModel
{
    public function getLectureIdAttr($value)
    {
        $lecture = new Lecture();
        return $value = $lecture->find($value);
    }

    public function getUserIdAttr($value)
    {
        $user = new User();
        return $user->find($value);
    }

    public function getEnrollCount()
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->count();
    }

    public function getNotDelete()
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->order('id desc')->paginate(15);
    }
}