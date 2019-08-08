<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'users'
], function ($router) {
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/', 'UserManagementController@getUsersList');
        Route::get('/{userId}', 'UserManagementController@getUserById');
    });
});
