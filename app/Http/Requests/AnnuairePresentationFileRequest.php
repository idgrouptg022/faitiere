<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnuairePresentationFileRequest extends FormRequest
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
            "presentation" => "required|file|image|mimes:png,jpg,jpeg,webp",
        ];
    }

    public function messages(): array
    {
        return [
            "presentation.required" => "Veuillez choisir une présentation pour l'annuaire.",
            "presentation.file" => "Le fichier choisi n'est pas une image.",
            "presentation.image" => "Le fichier choisi n'est pas une image.",
            "presentation.mimes" => "Seules les images (PNG, JPG, JPEG, WEBP) sont acceptées.",
        ];
    }
}
