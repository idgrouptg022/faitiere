<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RapportTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\RapportRequest;
use App\Models\Rapport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Raw;

class RapportController extends Controller
{

    public function index()
    {
        $rapports = Rapport::where("type", RapportTypes::AssembleeGenerale)->latest()->get();
        return view("auths.rapports.assemblee", [
            'rapports' => $rapports
        ]);
    }

    public function store(RapportRequest $request): RedirectResponse
    {
        $fields = $request->validated();
        $fields["type"] = RapportTypes::AssembleeGenerale;
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
        $fields["type"] = RapportTypes::AssembleeGenerale;
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


    // View

    public function ressourcesView(): View
    {


        $ressources = Rapport::where("type", RapportTypes::Ressources)->get();



        return view("auths.rapports.ressources", compact('ressources'));
    }



    public function activitesAnnuellesView(): View
    {

        $activites = Rapport::where("type", RapportTypes::ActivitesAnnuelles)->get();
        return view("auths.rapports.activites_annuelles", compact('activites'));
    }



    // Store

    public function ressourcesStore(RapportRequest $request): RedirectResponse
    {
        $fields = $request->validated();
        $fields["type"] = RapportTypes::Ressources;

        $filePath = null;

        if ($request->hasFile("filepath")) {
            $filePath = $request->filepath->store("ressources", "public");
        }else {

            return back()->withErrors(["filepath" => "Le fichier du rapport est requis"]);
        }

        $fields["filepath"] = $filePath;

        Rapport::create($fields);

        return redirect()->route("auth:ressources:view")->with("success", "L'événement a été crée avec succès");
    }


    public function activitesAnnuellesStore(RapportRequest $request): RedirectResponse
    {

        $fields = $request->validated();
        $fields["type"] = RapportTypes::ActivitesAnnuelles;

        $filePath = null;

        if ($request->hasFile("filepath")) {
            $filePath = $request->filepath->store("activites", "public");
        }else {

            return back()->withErrors(["filepath" => "Le fichier du rapport est requis"]);
        }

        $fields["filepath"] = $filePath;

        Rapport::create($fields);

        return redirect()->route("auth:activites_annuelles:view")->with("success", "L'événement a été crée avec succès");

    }



    // Update

    public function ressourcesUpdate(RapportRequest $request, Rapport $ressource): RedirectResponse
    {
        $fields = $request->validated();

        $filePath = null;

        if ($request->hasFile("filepath")) {

            $oldFile = $ressource->filepath;

            $filePath = $request->filepath->store("ressources", "public");

            $fields["filepath"] = $filePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $ressource->update($fields);

        return redirect()->route("auth:ressources:view")->with("success", "L'événement a été mis à jour avec succès");
    }


    public function activitesAnnuellesUpdate(RapportRequest $request, Rapport $activite): RedirectResponse
    {

        $fields = $request->validated();

        $filePath = null;

        if ($request->hasFile("filepath")) {

            $oldFile = $activite->filepath;

            $filePath = $request->filepath->store("activites", "public");

            $fields["filepath"] = $filePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $activite->update($fields);

        return redirect()->route("auth:activites_annuelles:view")->with("success", "L'événement a été mis à jour avec succès");

    }



    // Delete


    public function rapportDestroy( string $id) : RedirectResponse
    {

        $action = Rapport::destroy($id);

     if(!$action){
        return redirect()->back()->with('error', 'Opération échouée');
     }
        return redirect()->back()->with('success', 'La ressource a bien été retirée');
    }

}
