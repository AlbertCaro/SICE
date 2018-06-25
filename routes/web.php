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

Route::resource('user', 'UserController');
Route::resource('student', 'PersonController');

Route::get('/', ['as' => 'index', function () {
    return view('auth.home');
}]);

Auth::routes();

Route::get('/home', ['as' => 'home','uses' => 'HomeController@index']);
Route::post('register', ['as' => 'register.create','uses' => 'Auth\RegisterController@register']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('user_table', ['as' => 'user.table', 'uses' => 'UserController@table']);
Route::get('user_search/{search}/', ['as' => 'user.search', 'uses' => 'UserController@search']);
Route::get('person_table', ['as' => 'person.table', 'uses' => 'PersonController@table']);
Route::get('person_search/{search}/', ['as' => 'person.search', 'uses' => 'PersonController@search']);

Route::get('message/done', ['as' => 'message.done', function () {
    return view('messages.done');
}]);

