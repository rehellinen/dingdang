<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 14:58
 */

namespace app\common\model;


class Place extends BaseModel
{
    public function getPlaceCount()
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->count();
    }
}