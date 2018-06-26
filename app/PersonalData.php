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

    public function setDomicilioAttribute($value)
    {
        $this->attributes['domicilio'] = utf8_encode($value);
    }

    public function getDomicilioAttribute($value)
    {
        return utf8_decode($value);
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'persona_codigo', 'codigo');
    }

    public function career()
    {
        return $this->belongsTo(Career::class, 'carrera_id', 'id');
    }

    public static function getEstadosCiviles()
    {
        return [
            '' => 'Seleccione una opción...',
            'Soltero' => 'Soltero',
            'Casado' => 'Casado',
            'Divorciado' => 'Divorciado',
            'Viudo' => 'Viudo',
            'Unión libre' => 'Unión libre',
        ];
    }

    public static function getEscolaridades()
    {
        return [
            '' => 'Seleccione una opción...',
            'Primaria' => 'Primaria',
            'Secundaria' => 'Secundaria',
            'Preparatoria' => 'Preparatoria',
            'Licenciatura' => 'Licenciatura',
            'Maestría' => 'Maestría',
            'Doctorado' => 'Doctorado',
        ];
    }

    public static function getActividadesEconomicas()
    {
        return [
            '' => 'Seleccione una opción...',
            'Empleado' => 'Empleado',
            'Otra' => 'Otra',
        ];
    }
}
