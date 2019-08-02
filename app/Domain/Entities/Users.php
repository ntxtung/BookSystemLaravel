<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {
    protected $table = 'Users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'username', 'firstname', 'lastname', 'email', 'password'
    ];

    protected $guarded = [
        'role'
    ];

    protected $hidden = [
        'password', 'role', 'token'
    ];
}
