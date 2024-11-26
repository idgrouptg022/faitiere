<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommuneRequest;
use App\Models\Commune;
use App\Models\Prefecture;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    public function index(): View
    {
        $prefectures = Prefecture::all();
        $communes = Commune::all();

        return view("auths.commune", compact("prefectures", "communes"));
    }

    public function store(CommuneRequest $request)
    {


        $fields = $request->validated();


        $commune = Commune::create($fields);

        if($commune){
            return redirect()->back()->with("success", "Commune ajoutée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur d'ajout de la commune");
        }


    }

    public function update(CommuneRequest $request, Commune $commune): RedirectResponse
    {
        $fields = $request->validated();

        if($commune->update($fields))
        {
             return redirect()->back()->with("success", "La commune a été modifiée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur de modification de la commune");
        }


    }

    public function destroy(Commune $commune): RedirectResponse
    {


        $commune->delete();

        return redirect()->back()->with('success', 'La commune a bien été retirée');
    }



}
