<?php

namespace App\Http\Controllers\Guest;

use App\Models\Thematique;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ThematiqueController extends Controller
{
    public function index(): View
    {
        $thematiques = Thematique::latest()->get();

        return view("guests.thematiques.index", compact('thematiques'));
    }

    public function show(Thematique $thematique): View
    {
        if ($thematique == null) {
            abort(404);
        }

        if (!$thematique instanceof Thematique) {
            abort(404);
        }

        $thematiques = Thematique::whereNotIn("id", [$thematique->id])->latest()->take(3)->get();

        return view("guests.thematiques.show", compact('thematique', 'thematiques'));
    }
}
