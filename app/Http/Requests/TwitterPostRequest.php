<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TwitterPostRequest extends FormRequest
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
            "url" => "required|url",
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Le titre du post Twitter est requis.",
            "url.required" => "Le lien du post Twitter est requis.",
            "url.url" => "Le lien du post Twitter doit être une URL valide.",
        ];
    }
}
