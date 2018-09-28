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

// Token
Route::get('api/:version/token', 'api/:version.token/getToken');
Route::get('api/:version/token/check', 'api/:version.token/checkToken');

// 用户
Route::put('api/:version/user', 'api/:version.User/edit');
Route::get('api/:version/user', 'api/:version.User/getInfo');

// 讲座
Route::get('api/:version/lecture/all', 'api/:version.Lecture/getAllLectures');
Route::get('api/:version/lecture/:id', 'api/:version.Lecture/getLectureById');

// 轮播图
Route::get('api/:version/banner', 'api/:version.Banner/getBanner');

// 签到
Route::post('api/:version/attendance', 'api/:version.Attendance/sign');

// 报名
Route::post('api/:version/enroll', 'api/:version.Enroll/enroll');
Route::get('api/:version/enroll/:lecture_id/:status', 'api/:version.Enroll/isEnroll');
Route::get('api/:version/enroll/:status', 'api/:version.Enroll/getEnroll');
Route::delete('api/:version/enroll/:lecture_id/:status', 'api/:version.Enroll/cancelEnroll');

// 登录
Route::post('api/:version/login', 'api/:version.Login/appLogin');
