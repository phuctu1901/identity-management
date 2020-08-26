<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/citizen/getbyid', 'CitizenController@getById');



Route::post('/credential/issue', 'DIDController@issueCredential');
Route::get('/credential/get/{id}', 'DIDController@getCredential');
Route::get('/did/getDids', 'DIDController@getDids');


Route::get('/connection/create', 'ConnectionController@createConnection');
Route::get('/connection/get/{id}', 'ConnectionController@getConnection');
Route::get('/connection/getConnections', 'ConnectionController@getConnections');

Route::get('/did/connected/{id}', 'API\DID\AddController@connected');
Route::get('/did/issued/{id}', 'API\DID\AddController@issued');

