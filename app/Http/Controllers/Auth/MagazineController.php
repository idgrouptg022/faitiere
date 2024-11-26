<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MagazineRequest;
use App\Models\Magazine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MagazineController extends Controller
{
    public function index()
    {
        $magazines = Magazine::latest()->get();

        return view("auths.magazines", [
            'magazines' => $magazines
        ]);
    }

    public function store(MagazineRequest $request): RedirectResponse
    {
        $fields = $request->validated();
        $filePath = null;
        if(!$request->hasFile("filepath")){
            return back()->withErrors(['filepath' => 'Veuillez ajouter le fichier du magazine.']);
        }else{
            $filePath = $request->filepath->store("magazines", "public");

            $fields["filepath"] = $filePath;
        }
        Magazine::create($fields);
        return back()->with("success", "Le magazine à été enrégistré avec succès.");
    }

    public function update(MagazineRequest $request, Magazine $magazine): RedirectResponse
    {
        $fields = $request->validated();

        $oldFilePath = $magazine->filepath;

        $filePath = $oldFilePath;

        if($request->hasFile("filepath"))

        $filePath = $request->filepath->store("magazines", "public");

        $fields["filepath"] = $filePath;

        Storage::disk("public")->delete($oldFilePath);

        $magazine->update($fields);

        return back()->with("success", "Le magazine à été modifié avec succès.");

    }

    public function destroy(Magazine $magazine)
    {
        if(Storage::disk("public")->exists($magazine->filepath)){
            Storage::disk("public")->delete($magazine->filepath);
        }

        $magazine->delete();
        return back()->with("success", "Le magazine à été supprimé avec succès.");
    }
}
