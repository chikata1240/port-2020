<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PlanMiddleware;

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

Route::get('/test', 'HomeController@test');

Route::get('/home', 'HomeController@main')->name('home');

// Route::get('/main', 'HomeController@main');
Route::get('/reply', 'HomeController@reply');
Route::post('/reply', 'HomeController@reply');
Route::get('/reply_delete', 'HomeController@reply_delete');
Route::get('/user', 'HomeController@user');
Route::get('/details', 'HomeController@details');
Route::get('/details_destroy', 'HomeController@details_destroy');
Route::get('/input', 'HomeController@input_get')->name('user.input');
Route::post('/input_book', 'HomeController@input_book')->middleware('plan');
Route::post('/input_training', 'HomeController@input_training');
Route::get('/archive_delete', 'HomeController@archive_delete');
Route::get('/archive', 'HomeController@archive_get');
Route::post('/archive', 'HomeController@archive_post');
Route::get('/user_edit', 'HomeController@user_edit_get');
Route::post('/user_edit', 'HomeController@user_edit_post');


Auth::routes();




