<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

// 轮播图
Route::get('api/:version/banner', 'api/:version.Banner/getBanner');

// 签到
Route::post('api/:version/attendance', 'api/:version.AttendanceException/sign');

// 报名
Route::post('api/:version/enroll', 'api/:version.Enroll/enroll');
Route::get('api/:version/enroll/:id/:status', 'api/:version.Enroll/isEnroll');
Route::get('api/:version/enroll/:status', 'api/:version.Enroll/getEnroll');
Route::get('api/:version/enroll/:id/:status/cancel', 'api/:version.Enroll/cancelEnroll');


// 讲座
Route::get('api/:version/allLectures', 'api/:version.Lecture/getAllLectures');
Route::get('api/:version/allActivities', 'api/:version.Lecture/getAllActivities');
Route::get('api/:version/activity/:id', 'api/:version.Lecture/getLectureById');

// 登录
Route::post('api/:version/login', 'api/:version.Login/appLogin');

// 用户
Route::post('api/:version/user', 'api/:version.User/register');
Route::get('api/:version/user', 'api/:version.User/getInfo');

// Token
Route::get('api/:version/token/check', 'api/:version.token/checkToken');
