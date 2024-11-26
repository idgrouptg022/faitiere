<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($actualite) {
            $actualite->slug = $actualite->generateSlug($actualite->title);
            $actualite->save();
        });

        static::updating(function ($actualite) {
            $actualite->slug = $actualite->generateSlug($actualite->title);
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

    public function getRouteKeyName()
    {
        return "slug";
    }


    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
}
