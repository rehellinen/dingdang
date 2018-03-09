<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/3/9
 * Time: 15:22
 */

namespace app\common\validate;


class Place extends BaseValidate
{
    protected $rule = [
        ['name', 'require'],
        ['max', 'require']
    ];
}