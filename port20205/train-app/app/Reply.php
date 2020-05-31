<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public $incrementing = true;
    protected $primaryKey = 'reply_id';
    protected $fillable = [
        'comment',
        'progress_id',
        'user_id',
    ];
}
