<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 14:41
 */

namespace app\common\model;


class Lecture extends BaseModel
{
    public function getNotDelete($path = '')
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->order('id desc')
                    ->paginate([
                        'list_rows' => 15,
                        'path' => 'index'
                    ]);
    }

    public function getLectureCount()
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->count();
    }

    public function getNormalLecture()
    {
        $condition = [
            'status' => 1
        ];
        return $this->where($condition)->order('time desc, id desc')->select();
    }

    public function getNormalActivity()
    {
        $condition = [
            'status' => 2
        ];
        return $this->where($condition)->order('time desc, id desc')->select();
    }

    public function getById($id)
    {
        $condition['status'] = array('neq', -1);
        $condition['id'] = $id;
        return $this->where($condition)->find()->toArray();
    }
}