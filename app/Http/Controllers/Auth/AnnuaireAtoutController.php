<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnuaireAtoutRequest;
use App\Models\AnnuaireAtout;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnnuaireAtoutController extends Controller
{
    public function index(): View
    {

        $annuaire_atouts = AnnuaireAtout::all();

        return view("auths.annuaire-atout", compact( "annuaire_atouts"));
    }

    public function store(AnnuaireAtoutRequest $request)
    {


        $fields = $request->validated();


        $annuaire_atout = AnnuaireAtout::create($fields);

        if($annuaire_atout){
            return redirect()->back()->with("success", "Annuaire ajoutée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur d'ajout de l'annuaire");
        }


    }

    public function update(AnnuaireAtoutRequest $request, AnnuaireAtout $annuaire_atout): RedirectResponse
    {
        $fields = $request->validated();

        if($annuaire_atout->update($fields))
        {
             return redirect()->back()->with("success", "L'annuaire a été modifiée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur de modification de l'annuaire");
        }


    }

    public function destroy(AnnuaireAtout $annuaire_atout): RedirectResponse
    {


        $annuaire_atout->delete();

        return redirect()->back()->with('success', "L'annuaire a bien été retirée");
    }
}
