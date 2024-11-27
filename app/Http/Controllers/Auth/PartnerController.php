<?php

namespace App\Http\Controllers\Auth;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(): View
    {
        $partners = Partner::all();

        return view("auths.partners", compact('partners'));
    }

    public function store(PartnerRequest $request)
    {
        if (!$request->hasFile("image")) {
            return redirect()->back()->withErrors(['image' => "Veuillez saisir une image."]);
        }

        $fields = $request->validated();

        $filePath = $request->file('image')->store('partners', 'public');

        $fields['image'] = $filePath;

        $partner = Partner::create($fields);

        return redirect()->back()->with("success", "Partenaire ajouté avec succès");
    }

    public function update(PartnerRequest $request, Partner $partner): RedirectResponse
    {
        $fields = $request->validated();

        if ($request->hasFile("image")) {

            $oldFile = $partner->image;

            $filePath = $request->file('image')->store('partners', 'public');

            $fields['image'] = $filePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $partner->update($fields);

        return redirect()->back()->with("success", "Le partenaire a été modifié avec succès");
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        if (Storage::disk("public")->exists($partner->image)) {
            Storage::disk("public")->delete($partner->image);
        }

        $partner->delete();

        return redirect()->back()->with('success', 'Le partenaire a bien été retiré');
    }
}
