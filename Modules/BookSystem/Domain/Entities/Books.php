<?php

namespace Modules\BookSystem\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Books extends Model {
    protected $table = 'Books';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
