<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'result_id';

    protected $guarded = [
        'result_id',
        'result',
        'user_id',
    ];
}
