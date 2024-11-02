<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifierProfilerequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email|unique:profiles,email,' . $this->profile->id,  // Ignore l'email actuel
            'password' => 'nullable|min:8|max:12|confirmed',  // Le mot de passe peut être facultatif pour la modification
            'bio' => 'required',
            'image'=>'|image|mimes:png,jpg,jpeg,svg|max:10240'
        ];
    }
}
