<?php

namespace App\Http\Controllers\Auth;

use App\Models\Commune;
use App\Models\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommuneLinkRequest;
use App\Models\CommuneLink;
use Exception;
use Illuminate\Http\RedirectResponse;

class CommuneLinkController extends Controller
{
    public function index(): View
    {
        $prefectures = Prefecture::all();

        $communes = Commune::all();

        return view("auths.annuaires.communes", compact("communes", "prefectures"));
    }

    public function show(Commune $commune): View
    {
        if ($commune == null || !$commune instanceof Commune) abort(404);

        $communeLink = $commune->communeLink()->first();

        return view("auths.annuaires.show", compact("commune", "communeLink"));
    }

    public function update(CommuneLinkRequest $request, Commune $commune): RedirectResponse
    {
        if ($commune == null || !$commune instanceof Commune) abort(404);

        $fields = $request->validated();

        $fields["name"] = $commune->name;

        if ($request->hasFile("presentation")) {
            $fields["presentation"] = $request->presentation->store("commune_presentations", "public");
        }

        try {
            $communeLink = CommuneLink::updateOrCreate(
                ["commune_id" => $commune->id],
                $fields
            );

            return redirect()->back()->with("success", "Les informations de la commune ont été mises à jour avec succès");
        } catch(Exception $e) {
            return redirect()->back()->withErrors(["townhall" => "Erreur survenue lors de la mise à jour des informations"]);
        }
    }
}
