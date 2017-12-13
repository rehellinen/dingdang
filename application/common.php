<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function show($status, $message, $data = array())
{
    $return = array(
        'status' => $status,
        'message' => $message,
        'data' => $data
    );
    return json($return);
}

function getRandChars($length = 32)
{
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $max = strlen($strPol) - 1;

    for($i = 0; $i < $length; $i++)
    {
        $str.= $strPol[rand(0, $max)];
    }

    return $str;
}

function getLectureType($status)
{
    if($status==1) {
        return '讲座';
    } elseif($status==2) {
        return '活动';
    }elseif($status==-1) {
        return '已删除';
    }else{
        return '出错';
    }
}