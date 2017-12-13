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
    public function userId()
    {
        return $this->hasOne('user', 'id', 'user_id');
    }

    public function lectureId()
    {
        return $this->hasOne('lecture', 'id', 'lecture_id');
    }

    public function getNotDelete()
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->order('id desc')->with(['userId', 'lectureId'])->paginate(15);
    }
}