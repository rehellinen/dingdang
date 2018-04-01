<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/3/9
 * Time: 15:07
 */

namespace app\common\validate;


class Enroll extends BaseValidate
{
    protected $rule = [
        ['user_id', 'require', 'user_id不能为空'],
        ['lecture_id', 'require', 'lecture_id不能为空'],
        ['status', 'require', 'status不能为空']
    ];

    protected $scene = [
        'enroll' => ['status', 'lecture_id'],
        'cancelEnroll' => ['status', 'lecture_id'],
        'isEnroll' => ['status', 'lecture_id'],
        'getEnroll' => ['status']
    ];
}