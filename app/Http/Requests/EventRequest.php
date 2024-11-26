<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            "event_date" => "required|date",
            "image" => "nullable|mimes:jpg,jpeg,png,gif,svg|image|file",
            "event_area" => "nullable|in:national,international",
            "domaine" => "nullable|string",
            "description" => "nullable|string",
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Le titre de l'événement est obligatoire",
            "title.string" => "Le titre de l'événement est invalide",
            "event_date.required" => "La date de l'événement est obligatoire",
            "event_date.date" => "La date de l'événement doit être au format date",
            "image.mimes" => "Le format de l'image doit être jpg, jpeg, png, gif ou svg",
            "image.image" => "Le format de l'image est invalide",
            "image.file" => "Le format de l'image est invalide",
            "image.max" => "La taille de l'image doit être inférieure à 5MB",
            "image.size" => "La taille de l'image doit être inférieure à 5MB",
            "event_area.in" => "La zone de l'événement doit être national ou international",
            "domaine.string" => "Le domaine de l'événement renseigné est invalide",
            "description.string" => "La description de l'événement renseigné est invalide",
        ];
    }
}
