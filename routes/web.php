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


Route::resource('user', 'UserController');
Route::resource('client', 'ClientController');
Route::resource('student', 'PersonController');

/**
 * Rutas de los usuarios  (modelo User).
 */
// Ruta de la tabla de usuarios (para la paginación asíncrona)
Route::get('user_table', ['as' => 'user.table', 'uses' => 'UserController@table']);

// Ruta para generar la tabla a partir de un parámetro de búsqueda (necesaria para la paginación y buscador)
Route::get('user/search/{search}/', ['as' => 'user.search', 'uses' => 'UserController@search']);

/**
 * Rutas de los estudiantes (modelo Person)
 */

// Ruta para generar la tabla (necesaria para la paginación asíncrona)
Route::get('person/table', ['as' => 'student.table', 'uses' => 'PersonController@table']);

// Ruta para generar la tabla a partir de un parámetro de búsqueda (también necesaria para la paginación asíncrona)
Route::get('person/search/{search}/', ['as' => 'student.search', 'uses' => 'PersonController@search']);

// Ruta del formulario para la importación de datos a partir de una hoja de cálculo.
Route::get('/person/import', ['as' => 'student.import', 'uses' => 'PersonController@import']);

// Ruta para ingresar los datos de la hoja de cálculo y el despliegue de la vista con la tabla que muestra los importados.
Route::post('/person/imported', ['as' => 'student.importing', 'uses' => 'PersonController@importing']);

/**
 * Rutas de los clientes de las APIs
 */

// Ruta para generar la tabla (necesaria para la paginación asíncrona)
Route::get('client_table', ['as' => 'client.table', 'uses' => 'ClientController@table']);

// Ruta para generar la tabla a partir de un parámetro de búsqueda (también necesaria para la paginación asíncrona)
Route::get('client/search/{search}/', ['as' => 'client.search', 'uses' => 'ClientController@search']);

/**
 * Rutas de sesión e index.
 */
Auth::routes();

// Ruta para el index
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

// Ruta del formulario para registrar un nuevo usuario
Route::post('register', ['as' => 'register.create','uses' => 'Auth\RegisterController@register']);

// Ruta para cerrar sesión
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);



