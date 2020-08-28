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
Auth::routes();

Route::get('/', 'DashboardController@index')->middleware('auth');
Route::get('/did/add', 'DIDController@add');
Route::get('/did/list', 'DIDController@list');
Route::get('/did/detail/{code}', 'DIDController@detail');


Route::get('/connection/list', 'ConnectionController@list');
Route::get('/connection/detail/{id}', 'ConnectionController@detail');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/events', 'EventController@index');

//
//Route::get('/home', 'HomeController@index')->name('home');

Route::group([], function () {
    Route::get('/role','RoleController@index');
    Route::get('/role/add','RoleController@add');
    Route::post('/role/delete','RoleController@delete');
    Route::get('/role/edit/{id}','RoleController@edit');
    Route::post('/role/editRequest', 'RoleController@editRequest');
    Route::post('/role/addRequest','RoleController@addRequest');

    Route::get('/permission/add','PermissionController@add');
    Route::post('/permission/addRequest','PermissionController@addRequest');
});

