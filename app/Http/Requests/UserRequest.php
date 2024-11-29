<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "avatar" => "nullable|file|image|mimes:png,jpg,jpeg,svg,webp"
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Le nom de l'utilisateur est requis",
            "name.max" => "Le nom de l'utilisateur est trop long",
            "name.string" => "Le nom de l'utilisateur est invalide",
            "email.required" => "L'email de l'utilisateur est requis",
            "email.max" => "L'email de l'utilisateur est trop long",
            "email.email" => "L'email de l'utilisateur est invalide",
            "email.unique" => "L'email de l'utilisateur est déjà utilisé",
            "avatar.file" => "L'avatar de l'utilisateur est un fichier invalide",
            "avatar.image" => "L'avatar de l'utilisateur est invalide. Veuillez uploader une image",
            "avatar.mimes" => "L'avatar de l'utilisateur doit être un fichier png ou jpeg ou jpg ou svg ou webp"
        ];
    }
}
