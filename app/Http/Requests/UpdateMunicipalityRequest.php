<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMunicipalityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('municipalities')->ignore($this->route('municipality'))
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'El nombre del municipio ya está en uso'
        ];
    }
}