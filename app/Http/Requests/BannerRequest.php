<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            "link" => "nullable|url",
            "image" => "nullable|mimes:jpg,jpeg,png,gif,svg|image|file",
        ];
    }

    public function messages(): array
    {
        return [
            "image.mimes" => "Le format de l'image doit être jpg, jpeg, png, gif ou svg",
            "image.image" => "Le format de l'image est invalide",
            "image.file" => "Le format de l'image est invalide",
            "title.required" => "Le titre de la bannière est requis",
            "title.string" => "Le titre de la est invalide",
            "link.url" => "Le lien doit être une URL valide",
        ];
    }
}
