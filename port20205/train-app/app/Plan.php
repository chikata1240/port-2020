<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'content_id';
    protected $fillable = [
        'content',
        'limit',
        'rule',
        'type',
        'arrival',
        'user_id',
    ];

    public function executions(){
        return $this->hasMany("App\Execution");
    }
}
