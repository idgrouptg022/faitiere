<?php

namespace App\Http\Controllers\Auth;

use App\Models\Thematique;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ThematiqueRequest;

class ThematiqueController extends Controller
{
    public function index(): View
    {
        $thematiques = Thematique::latest()->get();


        return view("auths.thematiques.index", compact('thematiques'));
    }

    public function create(): View
    {
        return view("auths.thematiques.create");
    }

    public function store(ThematiqueRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $imagePath = null;

        if ($request->hasFile("image")) {
            $imagePath = $request->image->store("thematiques", "public");
        }

        $fields["image"] = $imagePath;

        Thematique::create($fields);

        return redirect()->route("auth:thematiques:index")->with("success", "La thématique a été crée avec succès");
    }

    public function show(Thematique $thematique): View|RedirectResponse
    {
        $findThematique = Thematique::where("id", $thematique->id)->doesntExist();

        if ($findThematique) {
            return redirect()->route("auth:thematiques:index")->with("error", "La thématique n'existe pas");
        }


        return view("auths.thematiques.show", compact('thematique'));
    }

    public function update(ThematiqueRequest $request, Thematique $thematique): RedirectResponse
    {
        $fields = $request->validated();

        $imagePath = null;

        if ($request->hasFile("image")) {

            $oldFile = $thematique->image;

            $imagePath = $request->image->store("thematiques", "public");

            $fields["image"] = $imagePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $thematique->update($fields);

        return redirect()->route("auth:thematiques:index")->with("success", "La thématique a été mise à jour avec succès");
    }

    public function destroy(Thematique $thematique)
    {

        $thematique->delete();
        return back()->with('success', "La thématique à été supprimée avec succès.");
    }

}
