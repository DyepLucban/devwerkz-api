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

Route::group(['prefix' => 'tasks'], function() {
    Route::get('/', 'TaskController@index');
    Route::get('/{id}', 'TaskController@browseSpecific');
    Route::post('/create', 'TaskController@createTask');
    Route::put('/update/{id}', 'TaskController@updateTask');
    Route::put('/completed/{id}', 'TaskController@markAsCompleted');
    Route::delete('/delete/{id}', 'TaskController@deleteTask');
});
