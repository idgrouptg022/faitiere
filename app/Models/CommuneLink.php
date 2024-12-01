<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommuneLink extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }
}
