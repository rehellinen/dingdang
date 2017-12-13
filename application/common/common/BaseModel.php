<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 13:10
 */

namespace app\common\common;


use think\Model;

class BaseModel extends Model
{
    public function updateStatus($id, $status)
    {
        $data['status'] = $status;
        return $this->where('id='.$id)->update($data);
    }

    public function getNotDelete()
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->order('id desc')->paginate(15);
    }

    public function getById($id)
    {
        $condition['status'] = array('neq', -1);
        $condition['id'] = $id;
        return $this->where($condition)->find();
    }

    public function updateById($id, $data)
    {
        return $this->where('id='.$id)->update($data);
    }
}