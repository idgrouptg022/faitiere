<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotationRequest extends FormRequest
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
            "filepath" => "nullable|mimes:pdf|file"
        ];
    }

    public function messages(): array
    {
        return [
            "body.required" => "Le contenu de la demande de devis est requis.",
            "body.string" => "Le contenu de la demande de devis est invalide.",
            "filepath.file" => "Le format du fichier doit être un fichier.",
            "filepath.mimes" => "Le fichier doit être un PDF.",
        ];
    }
}
