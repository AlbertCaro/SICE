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

    public function personalData() {
        return $this->hasOne(PersonalData::class, 'carrera_id', 'id');
    }

    public function getCareers() {

    }
}
