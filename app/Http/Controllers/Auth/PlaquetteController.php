<?php

namespace App\Http\Controllers\Auth;

use App\Models\Commune;
use App\Models\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class PlaquetteController extends Controller
{
    public function index(): View
    {
        $prefectures = Prefecture::all();
        return view("auths.annuaires.plaquettes.index", compact('prefectures'));
    }

    public function show(Commune $commune): View
    {
        if ($commune == null || !$commune instanceof Commune) abort(404);

        return view("auths.annuaires.plaquettes.show", compact('commune'));
    }
}
