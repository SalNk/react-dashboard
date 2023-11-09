<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Veuillez saisir votre nom',
            'name.min' => 'Le nom doit être de minimum 5 caractères',
            'email.required' => 'L\'adresse mail est requis',   
            'email.email' => 'Le format du mail est incorrect',
            'email.unique' => 'Cette adresse mail existe déjà dans la base de données',
            'password.required' => 'Votre mot de passe est incorrect',
            'password.min' => 'Votre mot de passe doit avoir au minimum 8 caractères',
        ];
    }
}
