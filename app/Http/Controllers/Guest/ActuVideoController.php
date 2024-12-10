<?php

namespace App\Http\Controllers\Guest;

use App\Models\ActuVideo;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ActuVideoController extends Controller
{
    public function index(): View
    {
        $actu_videos = ActuVideo::latest()->get();

        return view("guests.actu_videos", compact("actu_videos"));
    }
}
