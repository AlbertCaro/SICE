<?php

use \Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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

/**
 * Rutas de los usuarios  (modelo User).
 */
Route::resource('user', 'UserController');
Route::get('user/table', ['as' => 'user.table', 'uses' => 'UserController@table']);
Route::get('user/search/{search}/', ['as' => 'user.search', 'uses' => 'UserController@search']);

/**
 * Rutas de los estudiantes (modelo Person)
 */
Route::resource('student', 'PersonController');
Route::get('person/table', ['as' => 'student.table', 'uses' => 'PersonController@table']);
Route::get('person/search/{search}/', ['as' => 'student.search', 'uses' => 'PersonController@search']);
Route::get('/person/import', ['as' => 'student.import', 'uses' => 'PersonController@import']);
Route::post('/person/imported', ['as' => 'student.importing', 'uses' => 'PersonController@importing']);

/**
 * Rutas de sesión e index.
 */
Auth::routes();
// Ruta para el index
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::post('register', ['as' => 'register.create','uses' => 'Auth\RegisterController@register']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);



