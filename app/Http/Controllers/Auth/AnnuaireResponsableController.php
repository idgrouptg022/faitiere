<?php

namespace App\Http\Controllers\Auth;

use App\Models\Commune;
use App\Models\Annuaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\AnnuaireResponsable;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Enums\AnnuaireResponsableTypes;
use App\Http\Requests\AnnuaireResponsableRequest;

class AnnuaireResponsableController extends Controller
{
    public function index()
    {
        return view("");
    }
    public function createResponsables(AnnuaireResponsableRequest $request, Commune $commune): RedirectResponse
    {
        $fields = $request->validated();

        if ($commune == null || !$commune instanceof Commune) abort(404);

        $annuaire = Annuaire::where("commune_id", $commune->id)->first();

        if ($annuaire == null) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Veuillez d'abord renseigner les informations primaires de la commune"
            ]);
        }

        $fields["annuaire_id"] = $annuaire->id;

        if ($fields['maire']) {

            if ($request->hasFile('image_maire')) {
                $maireFile = $request->file('image_maire')->store('AnnuaireResponsables', 'public');
                $fields["file"] = $maireFile;
            } else {
                unset($fields["file"]);
            }

            $fields["name"] = $fields['maire'];
            $fields["type"] = AnnuaireResponsableTypes::Maire;
            unset($fields["maire"]);

            AnnuaireResponsable::updateOrCreate(
                [
                    'annuaire_id' => $annuaire->id,
                    'type' => AnnuaireResponsableTypes::Maire,
                ],
                $fields
            );
        }

        if ($fields['adjoint1']) {

            if ($request->hasFile('image_adjoint1')) {
                $adjoint1File = $request->file('image_adjoint1')->store('AnnuaireResponsables', 'public');
                $fields["file"] = $adjoint1File;
            } else {
                unset($fields["file"]);
            }

            $fields["name"] = $fields['adjoint1'];
            $fields["type"] = AnnuaireResponsableTypes::Adjoint1;
            unset($fields["adjoint1"]);

            AnnuaireResponsable::updateOrCreate(
                [
                    'annuaire_id' => $annuaire->id,
                    'type' => AnnuaireResponsableTypes::Adjoint1,
                ],
                $fields
            );
        }

        if ($fields['adjoint2']) {

            if ($request->hasFile('image_adjoint2')) {
                $adjoint2File = $request->file('image_adjoint2')->store('AnnuaireResponsables', 'public');
                $fields["file"] = $adjoint2File;
            } else {
                unset($fields["file"]);
            }

            $fields["name"] = $fields['adjoint2'];
            $fields["type"] = AnnuaireResponsableTypes::Adjoint2;
            unset($fields["adjoint2"]);

            AnnuaireResponsable::updateOrCreate(
                [
                    'annuaire_id' => $annuaire->id,
                    'type' => AnnuaireResponsableTypes::Adjoint2,
                ],
                $fields
            );
        }

        return back()->with('success', 'Les informations ont été enrégistrés avec succès.');
    }

    public function deleteResponsableImage(Commune $commune, string $type) // RedirectResponse
    {


        if ($commune == null || !$commune instanceof Commune) abort(404);

        $annuaire = Annuaire::where("commune_id", $commune->id)->first();
        if (!$annuaire) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Annuaire introuvable pour cette commune."
            ]);
        }

        $responsable = AnnuaireResponsable::where([
            'annuaire_id' => $annuaire->id,
            'type' => $type
        ])->first();

        if (!$responsable || !$responsable->file) {
            return redirect()->back()->withErrors([
                "title" => "Erreur: Image introuvable pour ce responsable."
            ]);
        }

        // Suppression du fichier de stockage
        if (Storage::disk('public')->exists($responsable->file)) {
            Storage::disk('public')->delete($responsable->file);
        }

        // Suppression de la référence de l'image dans la base de données
        $responsable->file = null;
        $responsable->save();

        return back()->with('success', 'L\'image a été supprimée avec succès.');
    }
}
