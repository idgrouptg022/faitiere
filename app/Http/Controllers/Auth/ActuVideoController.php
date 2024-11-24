<?php

namespace App\Http\Controllers\Auth;

use App\Models\ActuVideo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ActuVideoRequest;

class ActuVideoController extends Controller
{
    public function index()
    {
        $actuVideos = ActuVideo::latest()->get();

        return view("auths.actu_videos", compact("actuVideos"));
    }

    public function store(ActuVideoRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $fields["link"] = Str::substr($request->link, 17);

        ActuVideo::create($fields);

        return redirect()->back()->with("success", "Actu video ajoutée avec succès");
    }

    public function update(ActuVideoRequest $request, ActuVideo $actuVideo): RedirectResponse
    {
        $verify_video = ActuVideo::where('id', $actuVideo->id)->first();

        if ($verify_video == null) {
            return redirect()->back()->with('danger', 'Opération échouée');
        }

        $fields = $request->validated();

        $fields["link"] = Str::substr($request->link, 17);

        $actuVideo->update($fields);

        return redirect()->back()->with("success", "L'actu video a été modifiée avec succès");
    }

    public function destroy(ActuVideo $actuVideo): RedirectResponse
    {
        $verify_video = ActuVideo::where('id', $actuVideo->id)->first();

        if ($verify_video == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $actuVideo->delete();

        return redirect()->back()->with('success', 'L\'actu video a bien été retirée');
    }
}
