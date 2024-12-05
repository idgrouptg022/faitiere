<?php

namespace App\Http\Controllers\Auth;

use App\Models\Commune;
use App\Models\Annuaire;
use Illuminate\Http\Request;
use App\Models\AnnuaireAtout;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnnuaireAtoutRequest;
use Exception;

class AnnuaireAtoutController extends Controller
{


    public function store(AnnuaireAtoutRequest $request, Commune $commune, $atoutNum)
    {

        if ($commune == null || !$commune instanceof Commune) abort(404);

        $annuaire = Annuaire::where("commune_id", $commune->id)->first();

        if($annuaire == null) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Veuillez d'abord renseigner les informations primaires de la commune"
            ]);
        }

        if (!is_int($atoutNum) && !in_array($atoutNum, [1, 2, 3, 4])) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Atout invalide"
            ]);
        }

        $checkExistAnnuaireAtout = AnnuaireAtout::where([
            ["annuaire_id", "=", $annuaire->id],
            ["id", "=", $atoutNum]
        ])->first();

        $fields = $request->validated();

        if ($request->hasFile("image")) {

            if ($checkExistAnnuaireAtout != null && $checkExistAnnuaireAtout->image != null) {
                $oldImage = $checkExistAnnuaireAtout->image;
            }

            $filePath = $request->file('image')->store('annuaires/atouts', 'public');

            $fields['image'] = $filePath;

            if (isset($oldImage) && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }

        } else {
            if ($checkExistAnnuaireAtout != null && $checkExistAnnuaireAtout->image == null) {
                return redirect()->back()->withErrors(["image", "Veuillez fournir une image pour l'annuaire"]);
            }
        }

        $fields["annuaire_id"] = $annuaire->id;


        try {
            AnnuaireAtout::updateOrCreate(
                ["annuaire_id" => $annuaire->id, "id" => $atoutNum],
                $fields
            );

            return redirect()->back()->with("success", "L'atout de l'atout a été sauvegardée avec succès");
        } catch (Exception $e) {
            return redirect()->back()->withErrors(["title" => "Erreur lors de l'enregistrement de l'atout de l'annuaire"]);
        }

    }

}
