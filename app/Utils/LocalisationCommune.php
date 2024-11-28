<?php

namespace App\Utils;

use App\Models\Commune;
use App\Models\MapLocation;

class LocalisationCommune
{
    public static function getMapLink(Commune $commune): string|null
    {
        return MapLocation::where("commune_id", $commune->id)->value("maplink");
    }
}
