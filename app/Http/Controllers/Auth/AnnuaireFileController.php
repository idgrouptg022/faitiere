<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnuaireFileRequest;
use App\Models\AnnuaireFile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnnuaireFileController extends Controller
{
    public function index(): View
    {

        $annuaire_files = AnnuaireFile::all();

        return view("auths.annuaire-file", compact( "annuaire_files"));
    }

    public function store(AnnuaireFileRequest $request)
    {


        $fields = $request->validated();


        $annuaire_file = AnnuaireFile::create($fields);

        if($annuaire_file){
            return redirect()->back()->with("success", "Fichier ajoutée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur d'ajout du fichier de l'annuaire");
        }


    }

    public function update(AnnuaireFileRequest $request, AnnuaireFile $annuaire_file): RedirectResponse
    {
        $fields = $request->validated();

        if($annuaire_file->update($fields))
        {
             return redirect()->back()->with("success", "Le fichier a été modifiée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur de modification du fichier de l'annuaire");
        }


    }

    public function destroy(AnnuaireFile $annuaire_file): RedirectResponse
    {


        $annuaire_file->delete();

        return redirect()->back()->with('success', "Le fichier de l'annuaire a bien été retirée");
    }
}
