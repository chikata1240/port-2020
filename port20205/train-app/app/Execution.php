<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Execution extends Model
{
    public $incrementing = true;
    protected $primaryKey = 'progress_id';
    protected $fillable = [
        'day',
        'progress',
        'memo',
        'content_id',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y年m月d日 H時i分',
        'updated_at' => 'datetime:Y年m月d日　H時i分',
    ];
}
