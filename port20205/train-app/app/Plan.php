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
        'user_id',
        'type',
        'arrival',
    ];

    public function executions(){
        return $this->hasMany("App\Execution");
    }
}
