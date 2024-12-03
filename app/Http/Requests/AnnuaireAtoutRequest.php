<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnuaireAtoutRequest extends FormRequest
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
            "title" => "required|string",
            "description" => "required|string",
            "image" => "required|string",
            "annuaire_id" => "required"
        ];
    }

    public function messages(): array
    {
        return [

            "title.required" => "Le titre est requis",
            "title.string" => "Titre saisie invalide",
            "description.required" => "La description est requis",
            "description.string" => "Description saisie invalide",

        ];
    }
}
