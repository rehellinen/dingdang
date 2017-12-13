<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 12:48
 */

namespace app\admin\controller;


use app\common\service\Register;
use app\common\validate\Api;
use think\Loader;
use think\Request;

class User extends BaseController
{
    public function index()
    {
        $users = Loader::model('User')->getNotDelete();

        return $this->fetch('', [
            'users' => $users
        ]);
    }
}