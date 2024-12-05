<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\Commune;
use App\Models\Annuaire;
use App\Models\AnnuaireFile;
use Illuminate\Http\Request;
use App\Enums\AnnuaireFileType;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnnuaireFileRequest;
use App\Http\Requests\AnnuairePartnerRequest;
use App\Http\Requests\AnnuairePresentationFileRequest;

class AnnuaireFileController extends Controller
{


    public function store(AnnuaireFileRequest $request, Commune $commune )
    {
        $type = '';

        foreach (AnnuaireFileType::cases() as $fileType) {
            if ($request->hasFile($fileType->value)) {
                $type = $fileType;
                break;
            }
        }

        if (!$type) {
            return back()->withErrors(['image' => 'Aucun type valide trouvé.']);
        }

        if ($commune == null || !$commune instanceof Commune) abort(404);

        $annuaire = Annuaire::where("commune_id", $commune->id)->first();

        if($annuaire == null) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Veuillez d'abord renseigner les informations primaires de la commune"
            ]);
        }

        $request->validated([
            $type->value => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);



        $filePath = $request->file($type->value)->store($type->value, 'public');

        $annuaireFile = AnnuaireFile::updateOrCreate(
            [
                "annuaire_id" => $annuaire->id,
                "type" => $type->value

        ],
            [
                'annuaire_id' => $annuaire->id,
                'file' => $filePath,
                'type' => $type->value,
            ]
        );

        if($annuaireFile){
            return redirect()->back()->with("success", "Fichier d'annuaire ajoutée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur d'ajout de fichier de l'annuaire");
        }


    }


    public function domaineStore(AnnuaireFileRequest $request, Annuaire $annuaire )
    {
        $validated = $request->validate([
            'annuaires' => 'required|array',
            'annuaires.domaine_prior1' => 'nullable',
            'annuaires.domaine_prior2' => 'nullable',
            'annuaires.domaine_prior3' => 'nullable',
        ]);


        $annuaires = $validated['annuaires'];



        foreach ($annuaires as $key => $domaine) {
            if (!empty($domaine)) {

                if ($domaine instanceof \Illuminate\Http\UploadedFile) {

                    $filePath = $domaine->store($key, 'public');
                }

                $annuaireFile = AnnuaireFile::updateOrCreate(
                    [
                        "annuaire_id" => $annuaire->id,
                        "type" => $key
                    ],
                    [
                        'file' => $filePath,
                        "type" => $key,

                    ]
                );
            }
        }



        if($annuaireFile){
            return redirect()->back()->with("success", "Fichier de domaine ajoutée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur d'ajout de fichier de domaine");
        }
    }

    public function presentation(Request $request, Commune $commune): RedirectResponse
    {
        if ($commune == null || !$commune instanceof Commune) abort(404);

        $annuaire = Annuaire::where("commune_id", $commune->id)->first();

        if($annuaire == null) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Veuillez d'abord renseigner les informations primaires de la commune"
            ]);
        }

        if (!$request->hasFile("presentation1") && !$request->hasFile("presentation2") && !$request->hasFile("presentation3") && !$request->hasFile("presentation4")) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Au moins un fichier est requis"
            ]);
        }

        $presentations = [
            AnnuaireFileType::Presentation1,
            AnnuaireFileType::Presentation2,
            AnnuaireFileType::Presentation3,
            AnnuaireFileType::Presentation4,
        ];

        foreach ($presentations as $presentation) {
            if(!$this->presentationFileStore($request, $annuaire, $presentation->value)) {
                return redirect()->back()->withErrors([
                    "title" => "Erreur lors de l'enregistrement du fichier de la $presentation->value"
                ]);
            }
        }

        return redirect()->back()->with("success", "Opération effectuée avec succès");
    }

    private function presentationFileStore(Request $request, $annuaire, $presentation)
    {
        if ($request->hasFile($presentation)) {

            $request->validate(
            [$presentation => "required|image|mimes:jpeg,png,jpg,gif"],
            [
                $presentation.".required" => "Veuillez sélectionner un fichier pour la présentation 1",
                $presentation.".image" => "Le fichier choisi n'est pas une image",
                $presentation.".mimes" => "Le format de l'image doit être jpg, jpeg, png, gif",
                $presentation.".max" => "Le fichier est trop volumineux. Le maximum est de 2 Mo"
            ]);

            try {
                $filePath = $request->file($presentation)->store("presentations", "public");

                AnnuaireFile::updateOrCreate(
                    ["annuaire_id" => $annuaire->id, "type" => $presentation],
                    ["file" => $filePath, "type" => $presentation]
                );

            } catch (Exception $e) {
                return false;
            }
        }

        return true;
    }

    public function partner(AnnuairePartnerRequest $request, Commune $commune): RedirectResponse
    {

        if ($commune == null || !$commune instanceof Commune) abort(404);

        $annuaire = Annuaire::where("commune_id", $commune->id)->first();

        if($annuaire == null) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Veuillez d'abord renseigner les informations primaires de la commune"
            ]);
        }

        $partnerType = AnnuaireFileType::Partner;

        $fields = $request->validated();

        $files = $fields["images"];

        foreach ($files as $file) {
            AnnuaireFile::create([
                "file" => $file->store('annuaires/partners', 'public'),
                "annuaire_id" => $annuaire->id,
                "type" => $partnerType->value
            ]);
        }

        return redirect()->back()->with("success", "Opération effectuée avec succès");
    }

    public function updatePartner(Request $request, Annuaire $annuaire, AnnuaireFile $annuaireFile): RedirectResponse
    {
        $request->validate([
            "file" => "required|file|image|mimes:png,jpg,jpeg,svg"
        ], [
            "file.required" => "Veuillez sélectionner un fichier logo pour le partenaire",
            "file.image" => "Le fichier choisi n'est pas une image",
            "file.mimes" => "Le format de l'image doit être jpg, jpeg, png, svg",
        ]);

        if ($annuaire == null || !$annuaire instanceof Annuaire) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Une erreur inconnue s'est produite"
            ]);
        }

        $oldFile = $annuaireFile->file;

        $file = $request->file("file");

        $filePath = $file->store("annuaires/partners", "public");

        if ($oldFile != null && Storage::disk("public")->exists($oldFile)) {
            Storage::disk("public")->delete($oldFile);
        }

        $annuaireFile->update([
            "file" => $filePath
        ]);

        return redirect()->back()->with("success", "Opération effectuée avec succès");
    }

    public function deletePartner(AnnuaireFile $annuaireFile): RedirectResponse
    {
        if ($annuaireFile == null || !$annuaireFile instanceof AnnuaireFile) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Une erreur inconnue s'est produite"
            ]);
        }

        if (Storage::disk("public")->exists($annuaireFile->file)) {
            Storage::disk("public")->delete($annuaireFile->file);
        }

        $annuaireFile->delete();

        return redirect()->back()->with("success", "Opération effectuée avec succès");
    }
}


