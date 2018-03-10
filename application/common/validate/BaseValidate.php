<?php

/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 13:40
 */
namespace app\common\validate;


use app\common\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck($scene)
    {
        //获取所有参数
        $param = Request::instance()->param();

        //检测
        $result = $this->scene($scene)->check($param);

        //获取错误信息
        $error = $this->error;

        if(!$result){
        throw new ParameterException([
            'message' => $error,
            'status' => 10000
        ]);
    }
        return true;
    }

    // validate 检测什么参数则对什么参数进行操作
    public function getDataByScene($scene)
    {
        $params = Request::instance()->param();
        $rule = $this->scene[$scene];
        $newData = array();

        foreach ($rule as $key => $value)
        {
            $newData[$value] = $params[$value];
        }

        return $newData;
    }

    protected function isPositiveInt($value)
    {
        if(is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){
            return true;
        }else{
            return false;
        }
    }
}