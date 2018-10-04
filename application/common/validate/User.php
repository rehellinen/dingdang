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
        ['company', 'require', '公司不能为空'],
        ['domain', 'require', '主营不能为空'],
        ['occupation', 'require', '职业不能为空'],
        ['address', 'require', '地址不能为空'],
        ['focus', 'require', '专注点不能为空'],
        ['email', 'require', '邮箱不能为空']
    ];

    protected $scene = [
        'edit' => ['telephone', 'name', 'company', 'domain', 'occupation', 'address', 'focus', 'email']
    ];
}