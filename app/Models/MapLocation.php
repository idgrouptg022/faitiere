<?php

namespace App\Models;

use App\Models\Commune;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MapLocation extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }
}
