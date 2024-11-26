<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prefecture extends Model
{
    use HasFactory;


    protected $guarded=["id"];


    public function region()
{
    return $this->belongsTo(Region::class);
}

public function communes(): HasMany
{
    return $this->hasMany(Commune::class);
}

}
