<?php

namespace App\Http\Controllers;

use App\Domain\Entities\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getUsersList()
    {
        return Users::all();
    }

    public function getUserById($userId)
    {
        error_log("Input userId: $userId");
        return Users::find($userId);
    }
}
