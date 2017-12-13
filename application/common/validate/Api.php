<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/7
 * Time: 12:02
 */

namespace app\common\validate;


class Api extends BaseValidate
{
    protected $rule = [
        ['id', 'require|isPositiveInt', 'id不能为空|id必须是正整数'],
        ['status', 'require', '状态不能为空'],
        ['name', 'require', '姓名不能为空'],
        ['telephone', 'require', '电话号码不能为空'],
        ['password', 'require', '密码不能为空'],
        ['number', 'require', '学号不能为空']

    ];

    protected $scene = [
        'status' => ['status', 'id'],
        'register' => ['name', 'telephone', 'password', 'number'],
        'appLogin' => ['telephone', 'password'],
        'loginCMS' => ['name', 'password']
    ];
}