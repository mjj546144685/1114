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

Route::get('/', function () {
    return view('/admin/user/index');
});




//后台首页
Route::get('/admin','Admin\IndexController@index');
//创建后台的用户路由
Route::controller('/admin/index','Admin\IndexController');
// Route::controller('/admin/user','Admin\IndexController');

