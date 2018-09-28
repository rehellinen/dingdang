<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/9/28
 * Time: 14:20
 */

namespace app\common\model;


use app\common\exception\CollectionException;
use app\common\exception\SuccessException;

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
            throw new CollectionException();
        } else {
            throw new SuccessException([
                'message' => '已收藏'
            ]);
        }
    }
}