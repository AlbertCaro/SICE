<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|max:245',
            'apaterno'=>'required|max:105',
            'amaterno'=>'required|max:45',
            'fec_nac'=>'required|max:145',
            'tipo'=>'required|max:45',
            'sexo'=>'required|max:15',
            'estado_civil'=>'required|max:15',
            'religion'=>'required|max:45',
            'email'=>'required|email|max:50',
            'telefono'=>'required|max:45',
            'escolaridad'=>'required|max:45',
            'carrera_id'=>'required|max:11',
            'domicilio'=>'required|max:245',
            'actividad_economica'=>'required|max:145',
            'lug_nac'=>'required|max:145',
            'lug_res'=>'required|max:145',
        ];
    }

    public function response(array $errors)
    {
        toast('Verifique la información ingresada.', 'error', 'top');
        return parent::response($errors);
    }
}
