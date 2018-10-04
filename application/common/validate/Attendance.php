<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/3/9
 * Time: 13:54
 */

namespace app\common\validate;


class Attendance extends BaseValidate
{
    protected $rule = [
        ['name', 'require', '姓名不能为空'],
        ['telephone', 'require', '电话号码不能为空'],
        ['user_id', 'number', '用户id不能为空'],
        ['lecture_id', 'require|number', '讲座id不能为空'],
        ['address', 'require', '地址不能为空'],
        ['email', 'require', '邮箱不能为空'],
        ['occupation', 'require', '职业不能为空'],
        ['remark', 'require', '备注不能为空']
    ];

    protected $scene = [
        'sign' => ['name', 'telephone', 'user_id', 'lecture_id', 'address', 'email', 'occupation', 'remark']
    ];
}