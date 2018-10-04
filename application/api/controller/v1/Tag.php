<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/10/4
 * Time: 12:35
 */

namespace app\api\controller\v1;


use app\common\exception\SuccessException;
use enum\StatusEnum;
use think\Controller;

class Tag extends Controller
{
    public function getAll()
    {
        $res = (new \app\common\model\Tag())
            ->where(['status' => StatusEnum::NORMAL])
            ->select()->hidden(['status']);
        throw new SuccessException([
            'data' => $res,
            'message' => '获取所有标签成功'
        ]);
    }
}