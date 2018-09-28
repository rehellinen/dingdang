<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/9/28
 * Time: 14:20
 */

namespace app\common\model;


use app\common\exception\CollectionException;

class Collection extends BaseModel
{
    public function addOne($id, $uid, $type)
    {
        $data= [
            'user_id' => $uid,
            'type' => $type,
            'foreign_id' => $id
        ];
        if (!$this->where($data)->find()) {
            return $this->save($data);
        } else {
            throw new CollectionException();
        }
    }
}