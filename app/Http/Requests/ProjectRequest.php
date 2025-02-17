<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            "filepath" => "nullable|mimes:pdf|file"
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Le titre est requis",
            "title.string" => "Le titre renseigné est invalide",
            "filepath.mimes" => "Le fichier doit être au format PDF",
            "filepath.file" => "Le fichier doit être un fichier"
        ];
    }
}
