<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommuneLinkRequest extends FormRequest
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
            "presentation" => "nullable|file|mimes:pdf",
            "logo" => "nullable|file|image|mimes:png,jpg,jpeg,svg,webp",
            "population" => "nullable|string",
            "superficie" => "nullable|string",
            "townhall" => "nullable|string",
            "nom_maire" => "nullable|string",
            "contact" => "nullable|url",
            "lien_siteweb" => "nullable|url",
            "localisation" => "nullable|url",
            "contact_mail" => "nullable|email",
            "contact_whatsapp" => "nullable|string",
            "business" => "nullable|url",
            "public_markets" => "nullable|url",
            "jumelage" => "nullable|url",
            "bureau_citoyen" => "nullable|url",
            "annexe_exists" => "nullable|boolean",
            "administratif" => "nullable|url",
            "taxe" => "nullable|url",
            "be_partner" => "nullable|url",
            "give_project" => "nullable|url",
            "realization" => "nullable|url",
            "contact_message" => "nullable|string",
            "sante" => "nullable|url",
            "emploi" => "nullable|url",
            "social" => "nullable|url",
            "urbanisme" => "nullable|url",
            "environnement" => "nullable|url",
            "tourisme" => "nullable|url",
            "education" => "nullable|url",
            "culture" => "nullable|url",
            "securite" => "nullable|url",
            "slug" => "nullable|string",
            "district" => "nullable|url",
            "active" => "nullable|boolean",
        ];
    }

    public function messages(): array
    {
        return [
            "presentation.file" => "Le format de la présentation doit être un fichier valide.",
            "presentation.mimes" => "Le format de la présentation doit être un fichier pdf.",
            "logo.file" => "Le format du logo doit être un fichier valide.",
            "logo.image" => "Le format du logo doit être une image.",
            "logo.mimes" => "Le format du logo doit être une image (png, jpg, jpeg, svg, webp).",
            "population.string" => "Le champ population renseigné est invalide",
            "superficie.string" => "Le champ superficie renseigné est invalide",
            "townhall.string" => "Le champ mairie renseigné est invalide",
            "nom_maire.string" => "Le champ nom du maire renseigné est invalide",
            "contact.url" => "Le champ contact renseigné est invalide",
            "lien_siteweb" => "Le lien siteweb est invalide",
            "contact_message.string" => "Le champ message de contact renseigné est invalide",
            "district.string" => "Le district renseigné est invalide",
            "active.boolean" => "Le champ actif doit être un booléen.",
            "annexe_exists.boolean" => "Le champ annexe existe doit être un booléen.",
            "administratif.string" => "Le lien administratif est invalide",
            "taxe.string" => "Le lien taxe est invalide",
            "be_partner.string" => "Le lien BE partner est invalide",
            "give_project.string" => "Le lien donner un projet est invalide",
            "realization.string" => "Le lien réalisation est invalide",
            "sante.string" => "Le lien santé est invalide",
            "emploi.string" => "Le lien emploi est invalide",
            "social.string" => "Le lien social est invalide",
            "urbanisme.string" => "Le lien urbanisme est invalide",
            "environnement.string" => "Le lien environnement est invalide",
            "tourisme.string" => "Le lien tourisme est invalide",
            "education.string" => "Le lien éducation est invalide",
            "culture.string" => "Le lien culture est invalide",
            "securite.string" => "Le lien sécurité est invalide",
            "slug.string" => "slug invalide"
        ];
    }
}
