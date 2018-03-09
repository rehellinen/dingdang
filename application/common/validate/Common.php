<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/3/9
 * Time: 14:23
 */

namespace app\common\validate;


class common extends BaseValidate
{
    protected $rule = [
        ['status', 'number|in:-1,0,1,2'],
        ['id', 'number'],
        ['listorder', 'number']
    ];

    protected $scene = [
        'status' => ['id', 'status'],
        'id' => ['id'],
        'listorder' => ['listorder'],
    ];
}