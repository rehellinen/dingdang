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
    protected $hidden = [

    ];

    public function getPlaceIdAttr($value)
    {
        $place = new Place();
        return $value = $place->find($value);
    }

    public function getNotDelete()
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->order('id desc')
                ->paginate(15);
    }

    public function getPhotoUrlAttr($value)
    {
        $value = str_replace('\\',"/",$value);
        $value = config('img_url').$value;
        return $value;
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