<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annuaire extends Model
{
    use HasFactory;
    protected $guarded=["id"];


    public function annuaireAtouts()
    {
        return $this->hasMany(AnnuaireAtout::class);
    }

    public function annuaireFiles()
    {
        return $this->hasMany(AnnuaireFile::class);
    }

    public function annuaireResponables()
    {
        return $this->hasMany(AnnuaireResponsable::class);
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
}
