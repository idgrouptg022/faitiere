<?php

namespace App\Http\Controllers\Guest;

use App\Enums\ProjectTypes;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

   public function plaidoyers(): View
   {

    $projects = Project::where("type", ProjectTypes::Plaidoyer)->get();

    // $projectFiles = $projects->mapWithKeys(function ($project) {
    //     return [$project->id =>  $project != null && $project->filepath != null ? $project->filepath : null];
    // });



    return view("guests.projets.plaidoyers", compact("projects"));
   }

   public function projetsEnCours(): View
   {

    $projects = Project::where("type", ProjectTypes::Pending)->get();





    return view("guests.projets.en-cours", compact("projects"));
   }



   public function projetsRealises(): View
   {

    $projects = Project::where("type", ProjectTypes::Complete)->get();



    return view("guests.projets.realises", compact("projects"));
   }



   public function downloadFile(Project $project)
   {
       try {
           return response()->download('storage/'. $project->filepath, $project->type);
       } catch (Exception $e) {
           abort(500);
       }
   }


}
