<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('users', 'UsersController@getUsersList');
Route::get('users/{userId}', 'UsersController@getUserById');
// Request
// Fund
// Rent
// Review

/// Book
// Basic
// Request
// Fund
// Rent
// Review

/// Auth
// Login
// Logout
// Register
Route::post('auth/register', 'AuthController@signUpNewUser');
Route::post('auth/login', 'AuthController@login');
