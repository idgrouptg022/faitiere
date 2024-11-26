<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrefectureRequest;
use App\Models\Prefecture;
use App\Models\Region;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PrefectureController extends Controller
{
    public function index(): View
    {
        $prefectures = Prefecture::all();
        $regions = Region::all();

        return view("auths.prefecture", compact("prefectures", "regions"));
    }

    public function store(PrefectureRequest $request)
    {


        $fields = $request->validated();


        $prefecture = Prefecture::create($fields);

        if($prefecture){
            return redirect()->back()->with("success", "Préfecture ajoutée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur d'ajout de la préfecture");
        }


    }

    public function update(PrefectureRequest $request, Prefecture $prefecture): RedirectResponse
    {
        $fields = $request->validated();

        if($prefecture->update($fields))
        {
             return redirect()->back()->with("success", "La péfecture a été modifiée avec succès");
        }else {
            return redirect()->back()->withErrors("Erreur", "Erreur de modification de la préfecture");
        }


    }

    public function destroy(Prefecture $prefecture): RedirectResponse
    {


        $prefecture->delete();

        return redirect()->back()->with('success', 'La préfecture a bien été retirée');
    }

}
