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

// 收藏相关
Route::post('api/:version/collection', 'api/:version.Collection/add');
Route::get('api/:version/collection/all', 'api/:version.Collection/getAll');
Route::get('api/:version/collection/:type', 'api/:version.Collection/getByType');
Route::get('api/:version/collection/validity/:id', 'api/:version.Collection/validateCollection');


// 签到
Route::post('api/:version/attendance', 'api/:version.Attendance/sign');
