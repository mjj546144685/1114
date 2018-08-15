<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//后台首页
Route::get('/admin', function () {
    return view('admin/index/index');
});




















//后台友情链接
Route::controller('/admin/youqing','Admin\YouqingController');
























































//创建后台的用户路由
Route::controller('/admin/user','Admin\UserController');
//后台轮播图
Route::controller('/admin/lbt','Admin\LbtController');
//后台敏感词
Route::controller('/admin/mgc','Admin\MgcController');