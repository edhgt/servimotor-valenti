<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VehiculoUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $vehiculo = $this->route('vehiculo');

        return [
            'id_cliente' => ['required', 'integer', 'exists:clientes,id_cliente'],
            'placa' => ['required', 'string', 'max:20', 'unique:vehiculos,placa,' . $vehiculo->id_vehiculo . ',id_vehiculo'],
            'marca' => ['required', 'string', 'max:60'],
            'modelo' => ['required', 'string', 'max:60'],
            'anio' => ['nullable', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'color' => ['nullable', 'string', 'max:30'],
            'vin' => ['nullable', 'string', 'max:50'],
            'kilometraje_actual' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
