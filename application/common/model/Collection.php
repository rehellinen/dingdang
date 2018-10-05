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
            'collection_type' => $type,
            'foreign_id' => $id
        ];
        if (!$this->insert($data)) {
            throw new CollectionException();
        } else {
            throw new SuccessException([
                'message' => '成功收藏'
            ]);
        }
    }
}