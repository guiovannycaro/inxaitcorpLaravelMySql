<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'nombre' => 'required|regex:/^[\pL\s]+$/u|max:100',
        'apellido' => 'required|regex:/^[\pL\s]+$/u|max:100',
        'tipoDocumento_id' => 'nullable|integer',
        'numeroDocumento' => 'required|numeric|digits_between:6,20',
        'ciudadId' => 'required|integer',
        'telefono' => 'required|numeric|digits_between:6,20',
        'correo' => 'required|email|max:100',
        'fechaCreacion' => 'nullable|date',
        'habeasData' => 'required|boolean'
        ];
    }
}
