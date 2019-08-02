<?php


namespace App\Domain\Entities;


class RentLog {
    protected $table = 'Rent_Log';
    protected $primaryKey = 'rent_id';
    public $timestamps = false;
}
