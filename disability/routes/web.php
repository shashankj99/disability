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
