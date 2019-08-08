<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthenticationController@login')->name('login');
    Route::post('register', 'AuthenticationController@register')->name('register');
    Route::get('/token/refresh', 'AuthenticationController@refresh');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('logout', 'AuthenticationController@logout')->name('logout');
    });
});
