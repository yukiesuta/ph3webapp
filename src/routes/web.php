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

Route::get('/admin/user/new', 'AdminController@newuser');
Route::post('/admin/user/new', 'AdminController@newuserpost');

Route::get('/admin/user/delete/{id}', 'AdminController@deleteuser');
Route::post('/admin/user/delete/{id}', 'AdminController@deleteuserpost');

Route::get('/admin/language/new', 'AdminController@newlanguage');
Route::post('/admin/language/new', 'AdminController@newlanguagepost');

Route::get('/admin/language/delete/{id}', 'AdminController@deletelanguage');
Route::post('/admin/language/delete/{id}', 'AdminController@deletelanguagepost');

Route::get('/admin/content/new', 'AdminController@newcontent');
Route::post('/admin/content/new', 'AdminController@newcontentpost');

Route::get('/admin/content/delete/{id}', 'AdminController@deletecontent');
Route::post('/admin/content/delete/{id}', 'AdminController@deletecontentpost');


// api
Route::get('/news', 'NewsController@index')->name('news');

// メールテスト
Route::get('/test', function () {
    Mail::to('test@example.com')->send(new Test);
    return 'メール送信しました！';
});