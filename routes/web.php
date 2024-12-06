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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Auth::routes(['register' => false]);
Route::middleware(['auth'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::resource('company', 'CompanyController');
    Route::get('companies/data', 'CompanyController@data')->name('companies.data');
    Route::resource('employees', 'EmployeesController');
    Route::get('get_employees', 'EmployeesController@data')->name('employees.data');
});

// Route::get('/home', 'HomeController@index')->name('home');
