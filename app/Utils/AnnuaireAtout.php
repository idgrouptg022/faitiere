<?php

namespace App\Utils;

use App\Models\Annuaire;
use Illuminate\Database\Eloquent\Collection;
use App\Models\AnnuaireAtout as ModelsAnnuaireAtout;
use Illuminate\Database\Eloquent\Model;

class AnnuaireAtout
{
    public static function get(Annuaire $annuaire = null, $atoutNum): ModelsAnnuaireAtout|null
    {
        if (!$annuaire) return null;

        if (!$annuaire instanceof Annuaire) return null;

        if (!is_int($atoutNum) && !in_array($atoutNum, [1, 2, 3, 4])) return null;

        $annuaireAtout = ModelsAnnuaireAtout::where([
            ["annuaire_id", "=", $annuaire->id],
            ["id", "=", $atoutNum]
        ])->first();

        return $annuaireAtout;
    }
}
