<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualiteRequest;
use App\Models\Actualite;
use App\Models\Commune;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActualiteController extends Controller
{
    public function index(): View
    {
        $actualites = Actualite::latest()->get();


        return view("auths.actualites.index", compact('actualites'));
    }

    public function create(): View
    {
        $communes = Commune::latest()->get();
        return view("auths.actualites.create", compact( 'communes'));
    }

    public function store(ActualiteRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $imagePath = null;

        if ($request->hasFile("image")) {
            $imagePath = $request->image->store("actualites", "public");
        }

        $fields["image"] = $imagePath;

        Actualite::create($fields);

        return redirect()->route("auth:actualites:index")->with("success", "L'actualité a été crée avec succès");
    }

    public function show(Actualite $actualite): View|RedirectResponse
    {
        $findActualite = Actualite::where("id", $actualite->id)->doesntExist();
        $communes = Commune::latest()->get();

        if ($findActualite) {
            return redirect()->route("auth:actualites:index")->with("error", "L'actualité n'existe pas");
        }



        return view("auths.actualites.show", compact('actualite', 'communes'));
    }

    public function update(ActualiteRequest $request, Actualite $actualite): RedirectResponse
    {
        $fields = $request->validated();

        $imagePath = null;

        if ($request->hasFile("image")) {

            $oldFile = $actualite->image;

            $imagePath = $request->image->store("actualites", "public");

            $fields["image"] = $imagePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $actualite->update($fields);

        return redirect()->route("auth:actualites:index")->with("success", "L'actualité a été mis à jour avec succès");
    }

    public function destroy(Actualite $actualite)
    {

        $actualite->delete();
        return back()->with('success', "L'actualité à été supprimée avec succès.");
    }

}
