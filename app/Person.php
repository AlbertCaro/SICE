<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $timestamps = false;
    protected $table = "persona";
    protected $primaryKey = "codigo";
    public $incrementing = false;

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
        return $this->apaterno.' '.$this->amaterno.' '.$this->nombre;
    }

    public function personalData() {
        return $this->hasOne(PersonalData::class, 'persona_codigo', 'codigo');
    }

    public function getTipoAttribute($value) {
        switch ($value) {
            case '1':
                return 'Estudiante';
                break;
            case '2':
                return 'Académico';
                break;
            case '3':
                return 'Administrativo';
                break;
            default:
                return 'Tipo no definido';
        }
    }
}
