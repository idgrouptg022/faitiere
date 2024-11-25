<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RapportRequest extends FormRequest
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
            'title' => 'required|string',
            'filepath' => 'nullable|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Le champ du titre est requis.',

            'filepath.mimes' => 'Le type de ce ficher n\'est pas supporté',

        ];
    }
}
