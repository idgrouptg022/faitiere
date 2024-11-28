<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "fullname" => "required|string",
            "email" => "required|email",
            "body" => "required|string"
        ];
    }

    public function messages(): array
    {
        return [
            "fullname.required" => "Le nom complet est requis",
            "fullname.string" => "Le nom complet renseigné est invalide",
            "email.required" => "L'email est requis",
            "email.email" => "L'email renseigné est invalide",
            "body.required" => "Le message est requis",
            "body.string" => "Le message renseigné est invalide"
        ];
    }
}
