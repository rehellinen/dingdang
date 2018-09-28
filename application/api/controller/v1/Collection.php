<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/9/28
 * Time: 14:17
 */

namespace app\api\controller\v1;

use app\common\exception\CollectionException;
use app\common\exception\SuccessException;
use app\common\service\Token;
use app\common\model\Collection as CollectionModel;
use enum\StatusEnum;
use think\Controller;

class Collection extends Controller
{
    public function add($id, $type)
    {
        $uid = Token::getUserID();
        (new CollectionModel())->addOne($id, $uid, $type);

        throw new SuccessException([
            'message' => '新增收藏记录成功'
        ]);
    }

    public function getAll()
    {
        $uid = Token::getUserID();
        $res = (new CollectionModel())->where([
            'user_id' => $uid,
            'status' => StatusEnum::NORMAL
        ])->select();
        if (!$res) {
            throw new CollectionException();
        } else {
            throw new SuccessException([
                'message' => '获取收藏记录成功'
            ]);
        }
    }

    public function getByType($type)
    {
        $uid = Token::getUserID();
        $res = (new CollectionModel())->where([
            'user_id' => $uid,
            'status' => StatusEnum::NORMAL,
            'type' => $type
        ])->select();
        if (!$res) {
            throw new CollectionException();
        } else {
            throw new SuccessException([
                'message' => '获取收藏记录成功'
            ]);
        }
    }
}