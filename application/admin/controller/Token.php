<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/16
 * Time: 10:49
 */

namespace app\admin\controller;

use app\common\service\Token as TokenService;

class Token extends BaseController
{
    public function getToken($id)
    {
        $token = (new TokenService())->get($id);
        return $token;
    }
}