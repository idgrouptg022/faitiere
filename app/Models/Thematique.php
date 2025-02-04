<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thematique extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($thematique) {
            $thematique->slug = $thematique->generateSlug($thematique->title);
            $thematique->save();
        });

        static::updating(function ($thematique) {
            $thematique->slug = $thematique->generateSlug($thematique->title);
        });
    }

    private function generateSlug($title)
    {
        $slug = Str::slug($title);

        if (static::where("slug", $slug)->exists()) {
            $max = static::where("title", $title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    public function getRouteKeyName(): string
    {
        return "slug";
    }


    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }
}
