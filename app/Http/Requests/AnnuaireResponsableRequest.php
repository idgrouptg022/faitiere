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
            "maire" => "required|string",
            "adjoint1" => "nullable|string",
            "adjoint2" => "nullable|string",
            "image_maire" => "nullable|mimes:jpg,jpeg,png,svg,webp,avif|max:10240",
            "image_adjoint1" => "nullable|mimes:jpg,jpeg,png,svg,webp,avif|max:10240",
            "image_adjoint2" => "nullable|mimes:jpg,jpeg,png,svg,webp,avif|max:10240",
        ];
    }

    public function messages(): array
    {
        return [
            "maire.required" => "Veuillez entrer le nom du responsable.",
            "maire.string" => "Le nom saisi est invalide.",
            "adjoint1.string" => "Le nom saisi est invalide.",
            "adjoint2.string" => "Le nom saisi est invalide.",
            "image_maire.mimes" =>"Le type de ce ficher n\'est pas supporté",
            "image_adjoint1.mimes" =>"Le type de ce ficher n\'est pas supporté",
            "image_adjoint2.mimes" =>"Le type de ce ficher n\'est pas supporté",
            "image_maire.max" => "La taille du ficher ne doit pas dépasser 10Mo",
            "image_ajoint1.max" => "La taille du ficher ne doit pas dépasser 10Mo",
            "image_adjoint2.max" => "La taille du ficher ne doit pas dépasser 10Mo",
        ];
}
}
