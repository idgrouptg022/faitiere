<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnuaireRequest;
use App\Models\Annuaire;
use App\Models\Commune;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnnuaireController extends Controller
{
    // public function index(): View
    // {

    //     $annuaires = Annuaire::all();

    //     return view("auths.annuaire", compact( "annuaires"));
    // }

    public function store(AnnuaireRequest $request, Commune $commune )
    {


        $fields = $request->validated();

        $fields["commune_id"] = $commune->id;



        $annuaire = Annuaire::updateOrCreate(
            ["commune_id" => $commune->id],
            $fields
        );

        if($annuaire){
            return redirect()->back()->with("success", "Annuaire ajoutée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur d'ajout de l'annuaire");
        }


    }


    // public function destroy(Annuaire $annuaire): RedirectResponse
    // {


    //     $annuaire->delete();

    //     return redirect()->back()->with('success', "L'annuaire a bien été retirée");
    // }

}
