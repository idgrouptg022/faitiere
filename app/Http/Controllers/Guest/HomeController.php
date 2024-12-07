<?php

namespace App\Http\Controllers\Guest;

use App\Models\Event;
use App\Models\Banner;
use App\Models\Region;
use App\Models\Content;
use App\Models\Partner;
use App\Enums\WordTypes;
use App\Models\Actualite;
use App\Models\ActuVideo;
use App\Models\Publicite;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\TwitterPost;

class HomeController extends Controller
{
    public function home(): View
    {
        $page = "home";

        $page_item = "";

        $banners = Banner::latest()->take(4)->get();

        $flashs = Actualite::latest()->take(8)->get();

        $presentation = Content::where(
            "type", WordTypes::Presentation
        )->first();

        $presidentWord = Content::where(
            "type", WordTypes::PresidentWord
        )->first();

        $slide_actualites = Actualite::latest()->take(4)->get();

        $actualites = Actualite::latest()->skip(4)->take(5)->get();

        $actu_videos = ActuVideo::latest()->take(3)->get();

        $primary_events = Event::latest()->take(2)->get();

        $events = Event::latest()->skip(2)->take(3)->get();

        $publicite = Publicite::latest()->first();

        $partners = Partner::all();

        $maritime = Region::where("slug", "region-maritime")->first();

        $plateaux = Region::where("slug", "region-plateaux")->first();

        $centrale = Region::where("slug", "region-centrale")->first();

        $kara = Region::where("slug", "region-kara")->first();

        $savanes = Region::where("slug", "region-savanes")->first();

        $twitter_post = TwitterPost::latest()->first();

        return view("guests.home", compact("page",
        "page_item", "banners", "flashs", "presentation",
        "presidentWord", "slide_actualites", "actualites", "actu_videos",
        "primary_events", "events", "publicite", "partners",
        "maritime", "plateaux", "centrale", "kara", "savanes", "twitter_post"));
    }
}
