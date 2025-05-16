<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMunicipalityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiar a política de autorización si es necesario
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('municipalities')
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Este municipio ya está registrado'
        ];
    }
}
