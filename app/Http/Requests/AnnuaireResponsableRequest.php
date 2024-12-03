<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnuaireResponsableRequest extends FormRequest
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

            "name" => "required|string",
            "type" => "required|string",
            "file" => "required|string",
            "annuaire_id" => "required"
        ];
    }

    public function messages(): array
    {
        return [

            "name.required" => "Le nom est requis",
            "name.string" => "Nom saisie invalide",

        ];
    }
}
