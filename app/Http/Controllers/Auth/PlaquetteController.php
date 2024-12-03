<?php

namespace App\Http\Controllers\Auth;

use App\Models\Commune;
use App\Models\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Annuaire;

class PlaquetteController extends Controller
{
    public function index(): View
    {
        $prefectures = Prefecture::all();
        return view("auths.annuaires.plaquettes.index", compact('prefectures'));
    }

    public function show(Commune $commune): View
    {
        $annuaire = Annuaire::where("commune_id", $commune->id)->first();


        if ($commune == null || !$commune instanceof Commune) abort(404);

        return view("auths.annuaires.plaquettes.show", compact( 'annuaire', 'commune'));
    }
}
