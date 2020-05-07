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
    return redirect('/login');
});

//Route::get('prueba/{name}', 'PruebaController@prueba');

Route::post('/sensors/store', 'SensorsController@store');
Route::get('/sensors', 'SensorsController@index');


Route::group(['middleware' => ['auth']], function() {
    Route::POST('especie/save','InfoController@especie_save');
    
    Route::POST('empleados/edit','Catalogs\Employees\EmployeeController@edit');
    Route::POST('empleados/delete','Catalogs\Employees\EmployeeController@delete');
    Route::get('empleados/fetch_data', 'Catalogs\Employees\EmployeeController@fetch_data');
    //Busqueda del select 2 en los roles de empleados
    Route::get('/select2-load-more', 'Catalogs\Employees\EmployeeController@select2LoadMore');

});

// Authentication Routes...
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/reg-56JSHF2', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes...
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');