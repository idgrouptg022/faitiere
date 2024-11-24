<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
            "body" => "required|string",
            "image" => "nullable|mimes:jpg,jpeg,png,gif,svg|image|file",
        ];
    }

    public function messages(): array
    {
        return [
            "body.required" => "Le corps du contenu est requis",
            "body.string" => "Le corps du contenu est invalide",
            "image.mimes" => "Le format de l'image doit être jpg, jpeg, png, gif ou svg",
            "image.image" => "Le format de l'image est invalide",
            "image.file" => "Le format de l'image est invalide",
        ];
    }
}
