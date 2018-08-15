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

Route::get('/admin', function () {
    return view('admin/index/index');
});




//后台首页
Route::get('/admina','Admin\IndexController@index');
//创建后台的用户路由
Route::controller('/admin/index','Admin\IndexController');
Route::controller('/admin/user','Admin\IndexController');

//创建后台的分类的路由
Route::resource('/admin/cates','Admin\CatesController');


//创建前台用户注册路由
Route::get('/user/register','UsersController@register');
//创建提交用户注册路由
Route::post('/user/register','UsersController@store');











//后台友情链接
Route::controller('/admin/youqing','Admin\YouqingController');