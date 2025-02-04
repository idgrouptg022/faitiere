<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class AnnuaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user =  User::where('login_token', session()->get("authenticate_token"))->first();
        if ($user != null) return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "domaine_prior1" => "required|string",
            "domaine_prior2" => "required|string",
            "domaine_prior3" => "required|string",
            "superficie" => "required|string",
            "population" => "required|string",
            "vision" => "required|string",
            "presentation" => "required",
            "sante" => "required|string",
            "hotels" => "nullable|string",
            "prescolaires" => "nullable|string",
            "primaires" => "nullable|string",
            "secondaires" => "nullable|string",
            "artisanaux" => "nullable|string",
            "agences_bancaires" => "nullable|string",
            "barrages_hydrauliques" => "nullable|string",
            "etablissements_scolaires" => "nullable|string",
            "commune_id" => "nullable"
        ];
    }

    public function messages(): array
    {
        return [

            "domaine_prior1.required" => "Tout les domaines sont requis",
            "domaine_prior1.string" => "Domaine saisie invalide",
            "domaine_prior2.required" => "Tout les domaines sont requis",
            "domaine_prior2.string" => "Domaine saisie invalide",
            "domaine_prior3.required" => "Tout les domaines sont requis",
            "domaine_prior3.string" => "Domaine saisie invalide",
            "superficie.required" => "Les champs superficie, population, vision, présentation, santé sont requis",
            "population.required" => "Les champs superficie, population, vision, présentation, santé sont requis",
            "vision.required" => "Les champs superficie, population, vision, présentation, santé sont requis",
            "presentation.required" => "Le champs présentation, est requis",
            "sante.required" => "Les champs superficie, population, vision, présentation, santé sont requis",
        ];
    }
}
