<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDistrictRequest extends FormRequest
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
                Rule::unique('districts')->where(function ($query) {
                    return $query->where('municipality_id', $this->municipality_id);
                })
            ],
            'municipality_id' => [
                'required',
                'exists:municipalities,id'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Ya existe un distrito con este nombre en el municipio seleccionado',
            'municipality_id.exists' => 'El municipio seleccionado no es válido'
        ];
    }
}