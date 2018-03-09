<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/3/9
 * Time: 15:05
 */

namespace app\common\validate;


class Banner extends BaseValidate
{
    protected $rule = [
        ['photo_url', 'require']
    ];
}