<?php


namespace Modules\BookSystem\Domain\Entities;


class RentLog {
    protected $table = 'Rent_Log';
    protected $primaryKey = 'rent_id';
    public $timestamps = false;
}
