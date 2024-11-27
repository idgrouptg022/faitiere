<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            "image" => "nullable|file|image|mimes:png,jpg,svg,jpeg,webp,gif",
            "weblink" => "nullable|url",
        ];
    }

    public function messages(): array
    {
        return [
            "image.file" => "Veuillez choisir une image",
            "image.image" => "Le format de l'image est invalide",
            "image.mimes" => "Le format de l'image doit être PNG, JPG, SVG, JPEG, WEBP ou GIF",
            "weblink.url" => "Veuillez saisir une URL valide",
        ];
    }
}
