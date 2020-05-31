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
Route::get('/', function () {
    return view('top.toppage');
});
Route::get('/input', function () {
    return view('user.input');
});

Route::get('/main', 'HomeController@main');
Route::get('/reply', 'HomeController@reply');
Route::post('/reply', 'HomeController@reply');
Route::get('/reply_delete', 'HomeController@reply_delete');
Route::get('/user', 'HomeController@user');
Route::get('/details', 'HomeController@details');
Route::get('/archive', 'HomeController@archive_get');
Route::post('/archive', 'HomeController@archive_post');
Route::get('/user_edit', 'HomeController@user_edit_get');
Route::post('/user_edit', 'HomeController@user_edit_post');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


