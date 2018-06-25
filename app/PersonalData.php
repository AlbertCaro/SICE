<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    public $timestamps = false;
    protected $table = 'datos_personales';
    protected $primaryKey = 'id_datper';

    protected $fillable = [
        'telefono',
        'domicilio',
        'religion',
        'estado_civil',
        'lug_nac',
        'lug_res',
        'escolaridad',
        'actividad_economica',
        'interrogatorio',
        'carrera_id',
        'persona_codigo',
        'email',
    ];

    public function person() {
        return $this->belongsTo(Person::class, 'persona_codigo', 'codigo');
    }

    public function career() {
        return $this->belongsTo(Career::class, 'carrera_id', 'id');
    }

    public function getDomicilioAttribute($value) {
        return utf8_decode($value);
    }
}
