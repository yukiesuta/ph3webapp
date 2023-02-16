<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@post_data');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/new/user', 'AdminController@new');
Route::post('/admin/new/user', 'AdminController@newpost');

Route::get('/admin/new/language', 'AdminController@newlanguage');
Route::post('/admin/new/language', 'AdminController@newlanguagepost');

Route::get('/admin/new/content', 'AdminController@newcontent');
Route::post('/admin/new/content', 'AdminController@newcontentpost');

// メールテスト
Route::get('/test', function () {
    Mail::to('test@example.com')->send(new Test);
    return 'メール送信しました！';
});