<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanSimulationRequest extends FormRequest
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
            'montant' => ['required', 'numeric', 'min:10000'],
            'duree' => ['required', 'integer', 'min:3', 'max:60'],
            // 'taux_interet' => ['required', 'numeric', 'between:1,25'],
            // 'frais_dossier' => ['nullable', 'numeric', 'min:0'],
        ];
    }
}
