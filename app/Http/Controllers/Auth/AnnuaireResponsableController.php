<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnuaireResponsableRequest;
use App\Models\AnnuaireResponsable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnnuaireResponsableController extends Controller
{
    public function index(): View
    {

        $annuaire_responsables = AnnuaireResponsable::all();

        return view("auths.annuaire-responsable", compact( "annuaire_responsables"));
    }

    public function store(AnnuaireResponsableRequest $request)
    {


        $fields = $request->validated();


        $annuaire_responsable = AnnuaireResponsable::create($fields);

        if($annuaire_responsable){
            return redirect()->back()->with("success", "Annuaire ajoutée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur d'ajout de l'annuaire");
        }


    }

    public function update(AnnuaireResponsableRequest $request, AnnuaireResponsable $annuaire_responsable): RedirectResponse
    {
        $fields = $request->validated();

        if($annuaire_responsable->update($fields))
        {
             return redirect()->back()->with("success", "L'annuaire a été modifiée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur de modification de l'annuaire");
        }


    }

    public function destroy(AnnuaireResponsable $annuaire_responsable): RedirectResponse
    {


        $annuaire_responsable->delete();

        return redirect()->back()->with('success', "L'annuaire a bien été retirée");
    }
}
