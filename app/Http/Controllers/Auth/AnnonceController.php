<?php

namespace App\Http\Controllers\Auth;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnnonceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    public function index(): View
    {
        $annonces = Annonce::all();

        return view("auths.annonces", compact('annonces'));
    }

    public function store(AnnonceRequest $request)
    {
        if (!$request->hasFile("image")) {
            return redirect()->back()->withErrors(['image' => "Veuillez saisir une image."]);
        }

        $fields = $request->validated();

        $filePath = $request->file('image')->store('annonces', 'public');

        $fields['image'] = $filePath;

        $annonce = Annonce::create($fields);

        return redirect()->back()->with("success", "Publicité ajouté avec succès");
    }

    public function update(AnnonceRequest $request, Annonce $annonce): RedirectResponse
    {
        $fields = $request->validated();

        if ($request->hasFile("image")) {

            $oldFile = $annonce->image;

            $filePath = $request->file('image')->store('annonces', 'public');

            $fields['image'] = $filePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $annonce->update($fields);

        return redirect()->back()->with("success", "La publicité a été modifié avec succès");
    }

    public function destroy(Annonce $annonce) : RedirectResponse
    {

        if (Storage::disk("public")->exists($annonce->image)) {
            Storage::disk("public")->delete($annonce->image);
        }

        $annonce->delete();

        return redirect()->back()->with('success', 'La publicité a bien été retiré');
    }
}
