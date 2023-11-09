<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeRequest extends FormRequest
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
            'departement_id' => 'required|integer',
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',
            'email' => 'required',
            'contact' => 'required',
            'montant_journalier' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'departement_id' => 'Veillez choisir le département',
            'nom.required' => 'Le champ nom est requis',
            'prenom.required' => 'Le champ prénom est requis',
            'email.required' => 'Le champ email est requis',
            'contact.required' => 'Le numéro de téléphone est requis',
            'montant_journalier.required' => 'Le montant journalier est requis',
        ];
    }
}
