<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 13:10
 */
namespace app\common\model;

class User extends BaseModel
{
    protected $hidden = [
        'password', 'salt'
    ];

    public function getUserCount()
    {
        $condition['status'] = array('neq', -1);
        return $this->where($condition)->count();
    }

    public function getLoginUser($telephone, $status)
    {
        $condition = [
            'status' => $status,
            'telephone' => $telephone
        ];

        return $this->where($condition)->find();
    }
}