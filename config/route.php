<?php

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
Route::delete('api/:version/collection', 'api/:version.Collection/delete');
Route::get('api/:version/collection/all', 'api/:version.Collection/getAll');
Route::get('api/:version/collection/:type', 'api/:version.Collection/getByType');
Route::get('api/:version/collection/validity/:id/:type', 'api/:version.Collection/validateCollection');

// 上传图片相关
Route::post('api/:version/card', 'api/:version.Image/cardUpload');

// 报名相关
Route::get('api/:version/attendance/:id', 'api/:version.Attendance/getAllUser');
Route::get('api/:version/attendance/validity/:id', 'api/:version.Attendance/check');
Route::post('api/:version/attendance', 'api/:version.Attendance/sign');
Route::get('api/:version/attendance', 'api/:version.Attendance/getSelf');

// 标签相关
Route::get('api/:version/tag', 'api/:version.Tag/getAll');
