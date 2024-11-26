<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualiteRequest extends FormRequest
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
            "image" => "nullable|mimes:jpg,jpeg,png,gif,svg|image|file",
            "description" => "nullable|string",
            "commune_id" => "required",

        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Le titre de l'actualité est obligatoire",
            "title.string" => "Le titre de l'actualité est invalide",
            "image.mimes" => "Le format de l'image doit être jpg, jpeg, png, gif ou svg",
            "image.image" => "Le format de l'image est invalide",
            "image.file" => "Le format de l'image est invalide",
            "image.max" => "La taille de l'image doit être inférieure à 5MB",
            "image.size" => "La taille de l'image doit être inférieure à 5MB",
            "commune_id.required" => "La commune de l'actualité est obligatoire",
            "description.string" => "La description de l'actualité renseigné est invalide",
        ];
    }
}
