<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/3/9
 * Time: 15:42
 */

namespace app\common\validate;


class User extends BaseValidate
{
    protected $rule = [
        ['name', 'require', '姓名不能为空'],
        ['telephone', 'require', '电话号码不能为空'],
        ['password', 'require', '密码不能为空'],
        ['number', 'require', '学号不能为空']
    ];

    protected $scene = [
        'login' => ['telephone', 'password'],
        'register' => ['telephone', 'password', 'number', 'name']
    ];
}