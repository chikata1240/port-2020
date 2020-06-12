<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('top.welcome');
// });
Route::get('/test', 'HomeController@test');

// トップページ
Route::get('/', function () {
    return view('top.toppage');
});
// メインページ
Route::get('/home', 'HomeController@main')->name('home');
// リプライページ
Route::get('/reply', 'HomeController@reply');
Route::post('/reply_post', 'HomeController@reply_post');
Route::get('/reply_delete', 'HomeController@reply_delete');
// ユーザーページ
Route::get('/user', 'HomeController@user');
// 計画確認ページ
Route::get('/details', 'HomeController@details');
Route::get('/details_destroy', 'HomeController@details_destroy');
Route::get('/details_arrival', 'HomeController@details_arrival');
Route::get('/details_release', 'HomeController@details_release');
// 計画入力ページ
Route::get('/input', 'HomeController@input_get')->name('user.input');
Route::post('/input_book', 'HomeController@input_book')->middleware('plan');
Route::post('/input_training', 'HomeController@input_training');
// 実行入力ページ
Route::get('/archive', 'HomeController@archive_get');
Route::get('/archive_delete', 'HomeController@archive_delete');
Route::post('/archive_training', 'HomeController@archive_training')->middleware('archive');
Route::post('/archive_book', 'HomeController@archive_book')->middleware('archive');
// 画像登録ページ
Route::get('/user_edit', 'HomeController@user_edit_get');
Route::post('/user_edit', 'HomeController@user_edit_post');


Auth::routes();




