<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public $timestamps = false;
    protected $table = 'carrera';

    public $fillable = [
        'carrera'
    ];
}
