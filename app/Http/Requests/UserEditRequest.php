<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:145',
            'email'=>'required|email|max:60',
        ];
    }

    public function response(array $errors)
    {
        toast('Verifique la información ingresada.', 'error', 'top');
        return parent::response($errors);
    }
}
