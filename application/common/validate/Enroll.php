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
        ['user_id', 'require|isPositiveInt', 'user_id不能为空|user_id必须是正整数'],
        ['lecture_id', 'require|isPositiveInt', 'lecture_id不能为空|lecture_id必须是正整数']
    ];
}