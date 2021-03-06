<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['can:isAdmin']], function () {
    // user route
    Route::resource('user', 'UserController'); 
});

// disability routes
Route::match(['get', 'post'], '/disable', 'DisableController@index')->name('disable.index');
Route::post('disable/store', 'DisableController@store')->name('disable.store');
Route::resource('disable', 'DisableController', ['except' => ['index', 'store']]);

// senior citizens routes
Route::match(['get', 'post'], '/senior', 'SeniorCitizenController@index')->name('senior.index');
Route::post('senior/store', 'SeniorCitizenController@store')->name('senior.store');
Route::resource('senior', 'SeniorCitizenController', ['except' => ['index', 'store']]);

// import excel file in database
Route::get('/import/sheet', 'ExcelController@index')->name('excel');
Route::post('/import/sheet/disability', 'ExcelController@disability')->name('import.disability');
Route::post('/import/sheet/senior', 'ExcelController@senior')->name('import.senior');

// certifier route
Route::resource('certifier', 'CertifierController');

// invokable routes
Route::get('/districts', 'DistrictController')->name('district');
Route::get('/local-level', 'LocalLevelController')->name('local-level');
