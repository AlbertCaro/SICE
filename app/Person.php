<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $timestamps = false;
    protected $table = "persona";
    protected $primaryKey = "codigo";

    protected $fillable = [
        'codigo',
        'apaterno',
        'amaterno',
        'nombre',
        'tipo',
        'fotografia',
        'fec_nac',
        'sexo'
    ];

    public function getFullNameAttribute() {
        return $this->nombre.' '.$this->apaterno.' '.$this->amaterno;
    }

    public function personalData() {
        return $this->hasOne(PersonalData::class, 'persona_codigo', 'codigo');
    }
}
