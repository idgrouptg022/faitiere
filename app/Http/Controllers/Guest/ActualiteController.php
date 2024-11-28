<?php

namespace App\Http\Controllers\Guest;

use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ActualiteController extends Controller
{
    public function index(): View
    {
        $actualites = Actualite::latest()->get();

        return view("guests.actualites.index", compact('actualites'));
    }

    public function show(Actualite $actualite): View
    {
        if ($actualite == null) {
            abort(404);
        }

        if (!$actualite instanceof Actualite) {
            abort(404);
        }

        $actualites = Actualite::whereNotIn("id", [$actualite->id])->latest()->take(3)->get();

        return view("guests.actualites.show", compact('actualite', 'actualites'));
    }
}
