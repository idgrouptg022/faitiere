<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnuaireFileRequest;
use App\Enums\AnnuaireFileType;
use App\Models\Annuaire;
use App\Models\AnnuaireFile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnnuaireFileController extends Controller
{


    public function store(AnnuaireFileRequest $request, Annuaire $annuaire )
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


}


