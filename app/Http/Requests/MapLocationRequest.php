<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapLocationRequest extends FormRequest
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
            // 'latitude' => 'required|numeric',
            // 'longitude' => 'required|numeric',
            // 'address' => 'required|string',
            'maplink' => 'required|url',
            'commune_id' => 'required|exists:communes,id'
        ];
    }

    public function messages(): array
    {
        return [
            // 'latitude.required' => 'La latitude est obligatoire.',
            // 'latitude.numeric' => 'La latitude doit être un nombre.',
            // 'longitude.required' => 'La longitude est obligatoire.',
            // 'longitude.numeric' => 'La longitude doit être un nombre.',
            // 'address.required' => 'L\'adresse est obligatoire.',
            // 'address.string' => 'L\'adresse doit être une chaîne de caractères.',
            'maplink.required' => 'Le lien de la carte est obligatoire.',
            'maplink.url' => 'Le lien de la carte doit être une URL valide.',
            'commune_id.required' => 'La commune est obligatoire.',
            'commune_id.exists' => 'La commune sélectionnée est invalide.',
        ];
    }
}
