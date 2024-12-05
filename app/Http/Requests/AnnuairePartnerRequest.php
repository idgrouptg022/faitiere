<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnuairePartnerRequest extends FormRequest
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
            "images" => "required|array|min:1",
            "images.*" => "file|image|mimes:png,jpg,jpeg,webp,svg"
        ];
    }

    public function messages(): array
    {
        return [
            "images.required" => "Veuillez bien ajouter les logos des partenaires",
            "images.array" => "Veuillez bien ajouter les logos",
            "images.min" => "Veuillez bien ajouter au moins une image ",
            "images.*.file" => "Veuillez bien ajouter les images",
            "images.*.image" => "Veuillez bien ajouter les images",
            "images.*.mimes" => "Veuillez bien ajouter des images au format png jpg, jpeg, webp, svg"
        ];
    }
}
