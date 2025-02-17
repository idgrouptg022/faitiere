<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaidoyerRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'filepath' => 'nullable|mimes:pdf'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Veuillez ajoutez le titre du rapport.',
            'filepath.mimes' => 'type de fichier non pris en charge, veuillez ajouter un pdf.'
        ];
    }
}
