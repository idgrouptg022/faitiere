<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\Commune;
use App\Models\Prefecture;
use App\Models\MapLocation;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MapLocationRequest;

class MapLocationController extends Controller
{
    public function index(): View
    {
        $communes = Commune::all();

        $prefectures = Prefecture::all();

        $map_locations = MapLocation::all();

        return view("auths.map_location", compact("communes", "map_locations", "prefectures"));
    }

    public function store(MapLocationRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $mapLocation = MapLocation::updateOrCreate(
            ["commune_id" => $fields["commune_id"]],
            $fields
        );

        return redirect()->back()->with("success", "Opération effectuée avec succès");
    }

    public function destroy(MapLocation $mapLocation): RedirectResponse
    {
        $verify_map_location = MapLocation::where("id", $mapLocation->id)->first();

        if ($verify_map_location == null) {
            return redirect()->back()->with("error", "Opération échouée");
        }

        try {
            $mapLocation->delete();
            return redirect()->back()->with("success", "Opération effectuée avec succès");
        } catch (Exception $e) {
            return redirect()->back()->withErrors(["title" => "Opération de suppression échouée"]);
        }
    }
}
