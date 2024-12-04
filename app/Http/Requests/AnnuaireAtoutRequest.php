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
            "image" => "nullable|file|image|mimes:png,jpg,jpeg,webp",
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Le titre est requis",
            "title.string" => "Titre saisie invalide",
            "description.required" => "La description est requis",
            "description.string" => "Description saisie invalide",
            "image.file" => "Le fichier doit être un fichier valide",
            "image.image" => "Le fichier doit être une image",
            "image.mimes" => "Le format de l'image doit être PNG, JPG, JPEG ou WEBP",
        ];
    }
}
