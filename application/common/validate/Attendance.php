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
        ['user_id', 'number', 'user_id 必须为数字'],
        ['lecture_id', 'number', 'lecture_id 必须为数字'],
        ['address', 'require', 'address不能为空']
    ];

    protected $scene = [

    ];
}