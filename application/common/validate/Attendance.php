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
        ['user_id', 'number'],
        ['lecture_id', 'require|number'],
        ['address', 'require']
    ];

    protected $scene = [
        'signIn' => ['lecture_id', 'address']
    ];
}