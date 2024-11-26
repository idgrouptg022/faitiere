<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RapportTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\RapportRequest;
use App\Models\Rapport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActiviteAnnuelleController extends Controller
{
    public function index()
    {
        $rapports = Rapport::where("type", RapportTypes::ActivitesAnnuelles)->latest()->get();
        return view("auths.rapports.activites_annuelles", [
            'rapports' => $rapports
        ]);
    }

    public function store(RapportRequest $request): RedirectResponse
    {
        $fields = $request->validated();
        $fields["type"] = RapportTypes::ActivitesAnnuelles;
        $filePath = null;
        if (!$request->hasFile("filepath")) {
            return back()->withErrors(['filepath' => 'Veuillez ajouter un fichier pour le rapport.']);
        } else {

            $filePath = $request->filepath->store("rapports", "public");

            $fields["filepath"] = $filePath;
        }
        Rapport::create($fields);
        return back()->with('success', 'Le rapport à été enrégistré avec succès.');
    }
    public function update(RapportRequest $request, Rapport $rapport)
    {
        $fields = $request->validated();
        $fields["type"] = RapportTypes::ActivitesAnnuelles;
        $oldRapport = $rapport->filepath;
        $filePath = $oldRapport;
        if ($request->has("filepath"))  {  

            $filePath = $request->filepath->store("rapports", "public");

            $fields["filepath"] = $filePath;
            if (Storage::disk("public")->exists($oldRapport)) 
                Storage::disk("public")->delete($oldRapport);
        }
            

            $rapport->update($fields);
            return back()->with('success', 'Le rapport à été modifié avec succès.');
        
    }
    public function destroy(Rapport $rapport)
    {
        if (Storage::disk("public")->exists($rapport->filepath)) {
            Storage::disk("public")->delete($rapport->filepath);
        }
        $rapport->delete();
        return back()->with('success', 'Le rapport à été supprimée avec succès.');
    }
}
