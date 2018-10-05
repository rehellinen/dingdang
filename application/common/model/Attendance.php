<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 15:04
 */

namespace app\common\model;


class Attendance extends BaseModel
{
    public function lectureId ()
    {
        return $this->belongsTo('Lecture', 'lecture_id', 'id');
    }

    public function getNotDelete($path = '')
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->order('id desc')->paginate(15);
    }
}