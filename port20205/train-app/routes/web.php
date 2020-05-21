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
Route::get('/details', function () {
    return view('user.details');
});
// Route::get('/main', function () {
//     return view('user.main');
// });
Route::get('/main', 'HomeController@main');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


