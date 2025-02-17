<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;


    protected $guarded=["id"];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function prefectures()
{
    return $this->hasMany(Prefecture::class);
}
}
