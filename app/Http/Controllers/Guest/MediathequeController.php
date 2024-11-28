<?php

namespace App\Http\Controllers\Guest;

use App\Enums\RapportTypes;
use App\Http\Controllers\Controller;
use App\Models\Rapport;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MediathequeController extends Controller
{

    public function ressources(): View
    {

     $rapports = Rapport::where("type", RapportTypes::Ressources)->get();

     // $projectFiles = $projects->mapWithKeys(function ($project) {
     //     return [$project->id =>  $project != null && $project->filepath != null ? $project->filepath : null];
     // });



     return view("guests.mediatheque.ressources", compact("rapports"));
    }

    public function rapportsAG(): View
    {

        $rapports = Rapport::where("type", RapportTypes::AssembleeGenerale)->get();

        return view("guests.mediatheque.rapports", compact("rapports"));
    }



    public function rapportsAnnuels(): View
    {

        $rapports = Rapport::where("type", RapportTypes::ActivitesAnnuelles)->get();

        return view("guests.mediatheque.rapports-an", compact("rapports"));
    }



    public function downloadFile(Rapport $rapport)
    {
        try {
            return response()->download('storage/'. $rapport->filepath, $rapport->type);
        } catch (Exception $e) {
            abort(500);
        }
    }


}
