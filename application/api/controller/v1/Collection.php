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

        $cond = [
            'foreign_id' => $id,
            'collection_type' => $type,
            'user_id' => $uid
        ];
        $res = (new CollectionModel())->where($cond)->find();

        if (!$res) {
            (new CollectionModel())->addOne($id, $uid, $type);
        } else {
            (new CollectionModel())->save(['status' => StatusEnum::NORMAL], $cond);
        }

        throw new SuccessException([
            'message' => '新增收藏记录成功'
        ]);
    }

    public function delete($id, $type)
    {
        $uid = Token::getUserID();
        $cond = [
            'foreign_id' => $id,
            'collection_type' => $type,
            'user_id' => $uid
        ];
        $res = (new CollectionModel())->where($cond)->find();

        if (!$res) {
            throw new CollectionException([
                'message' => '该信息没有被收藏'
            ]);
        }

        $res = (new CollectionModel())->save([
            'status' => StatusEnum::DELETED
        ], $cond);

        if ($res) {
            throw new SuccessException([
                'message' => '删除收藏记录成功'
            ]);
        }
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
                'message' => '获取收藏记录成功',
                'data' => $res
            ]);
        }
    }

    public function getByType($type)
    {
        $uid = Token::getUserID();
        $relation = 'lectureId';
        if ($type === 1) {
            $relation = 'userId';
        } elseif ($type === 2) {
            $relation = 'cardId';
        }


        $res = (new CollectionModel())->where([
            'user_id' => $uid,
            'status' => StatusEnum::NORMAL,
            'collection_type' => $type
        ])->with($relation)->select();
        if (!$res) {
            throw new CollectionException();
        } else {
            throw new SuccessException([
                'message' => '获取收藏记录成功',
                'data' => $res
            ]);
        }
    }

    public function validateCollection($id, $type)
    {
        $uid = Token::getUserID();
        $res = (new CollectionModel())->where([
            'user_id' => $uid,
            'status' => StatusEnum::NORMAL,
            'foreign_id' => $id,
            'collection_type' => $type
        ])->find();
        if (!$res) {
            throw new CollectionException();
        } else {
            throw new SuccessException([
                'message' => '获取收藏记录成功',
                'data' => $res
            ]);
        }
    }
}