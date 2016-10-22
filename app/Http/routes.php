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

// Route::get('/', function () {
//     return view('welcome');
// });

//测试用 - 测试能否跑通
Route::get('test/index',function()
{
    return view('index');
});

//测试用 - 检测是否登录
Route::get('/auth/test',function(){
    return Auth::check() ? Auth::user()->uid:'login is required';
});




/* 首页 */
Route::get('home','IndexController@index');
Route::get('/','IndexController@index');



/* 用户注册, 登录, 退出 */
//用户注册
Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');


// 用户登录
Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');


// 用户退出
Route::get('auth/logout','Auth\AuthController@getLogout');




/* 借款 */
//借款
Route::get('jie','ProjectController@getJie');
Route::post('jie','ProjectController@postJie');




/* 项目审核 */
//项目列表
Route::get('prolist','CheckController@getProlist');

//审核项目
Route::get('check/{pid}','CheckController@getCheck');

//提交审核结果
Route::post('check/{pid}','CheckController@postCheck');



/* 投资 */
//首页展示

