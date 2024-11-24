<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresentationWordRequest extends FormRequest
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
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp,avif|max:10240',
       ];
    }
    public function messages()
    {
        return [
            'body.required' => 'Le champ de texte est requis.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'Le type de ce ficher n\'est pas supporté',
            'image.max' => 'La taille du ficher ne doit pas dépasser 10Mo'
        ];
    }
}
