<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PubliciteRequest;
use App\Models\Publicite;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PubliciteController extends Controller
{
    public function index(): View
    {
        $publicites = Publicite::all();

        return view("auths.publicites", compact('publicites'));
    }

    public function store(PubliciteRequest $request)
    {
        if (!$request->hasFile("image")) {
            return redirect()->back()->withErrors(['image' => "Veuillez saisir une image."]);
        }

        $fields = $request->validated();

        $filePath = $request->file('image')->store('publicites', 'public');

        $fields['image'] = $filePath;

        $publicite = Publicite::create($fields);

        return redirect()->back()->with("success", "Publicité ajouté avec succès");
    }

    public function update(PubliciteRequest $request, Publicite $publicite): RedirectResponse
    {
        $fields = $request->validated();

        if ($request->hasFile("image")) {

            $oldFile = $publicite->image;

            $filePath = $request->file('image')->store('publicites', 'public');

            $fields['image'] = $filePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $publicite->update($fields);

        return redirect()->back()->with("success", "La publicité a été modifié avec succès");
    }

    public function destroy(Publicite $publicite) : RedirectResponse
    {

        if (Storage::disk("public")->exists($publicite->image)) {
            Storage::disk("public")->delete($publicite->image);
        }

        $publicite->delete();

        return redirect()->back()->with('success', 'La publicité a bien été retiré');
    }
}
