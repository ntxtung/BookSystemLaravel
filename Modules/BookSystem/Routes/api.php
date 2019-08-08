<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'users'
], function ($router) {
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/', 'UsersController@getUsersList');
        Route::get('/{userId}', 'UsersController@getUserById');
    });
});

/// Auth
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register')->name('register');
    Route::get('/token/refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('logout', 'AuthController@logout')->name('logout');
    });
});
