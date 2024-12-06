<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth.basic'], function () {
    Route::get('/company', 'Api\CompanyController@index');
    Route::post('/company', 'Api\CompanyController@store');
    Route::get('/employees', 'Api\EmployeesController@index');
    Route::post('/employees', 'Api\EmployeesController@store');
});


