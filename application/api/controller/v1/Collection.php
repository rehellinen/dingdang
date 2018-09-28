<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/9/28
 * Time: 14:17
 */

namespace app\api\controller\v1;

use app\common\exception\SuccessException;
use app\common\service\Token;
use app\common\model\Collection as CollectionModel;
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
}