<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/3/9
 * Time: 15:13
 */

namespace app\common\validate;


class Lecture extends BaseValidate
{
    protected $rule = [
        ['title', 'require'],
        ['holder', 'require'],
        ['detail', 'require'],
        ['time', 'require'],
        ['place_id', 'require'],
        ['photo_url', 'require'],
    ];
}