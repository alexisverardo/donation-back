<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'province_id' => 'required|numeric',
            'location_id' => 'required|numeric',
            'birthday' => 'required|date',
            'blood_type_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El Email es requerido!',
            'first_name.required' => 'Nombre requerido!',
            'last_name.required' => 'Apellido requerido!',
            'province_id.required' => 'La Provincia es requerida!',
            'location_id.required' => 'La Localidad es requerida!',
            'blood_type_id.required' => 'El Tipo de sangre es requerido!',
        ];
    }
}
