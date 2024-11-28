<?php

namespace App\Http\Controllers\Guest;

use App\Models\Region;
use App\Models\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class MapLocalisationController extends Controller
{
    public function index(Region $region): View
    {
        $prefectures = Prefecture::where("region_id", $region->id)->get();

        return view("guests.carte.index", compact('prefectures', 'region'));
    }
}
