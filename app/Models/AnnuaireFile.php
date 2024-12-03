<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnuaireFile extends Model
{
    use HasFactory;
    protected $guarded=["id"];

    public function annuaire()
    {
        return $this->belongsTo(Annuaire::class);
    }
}
