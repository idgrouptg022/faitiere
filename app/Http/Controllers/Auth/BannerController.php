<?php

namespace App\Http\Controllers\Auth;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index(): View
    {
        $banners = Banner::orderBy("id", "desc")->get();

        return view("auths.banner", compact("banners"));
    }

    public function store(BannerRequest $request)
    {
        if (!$request->hasFile("image")) {
            return redirect()->back()->withErrors(['image' => "Veuillez saisir une image."]);
        }

        $fields = $request->validated();

        $filePath = $request->file('image')->store('banners', 'public');

        $fields['image'] = $filePath;

        $banner = Banner::create($fields);

        return redirect()->back()->with("success", "Bannière ajoutée avec succès");
    }

    public function update(BannerRequest $request, Banner $banner): RedirectResponse
    {
        $fields = $request->validated();

        if ($request->hasFile("image")) {

            $oldFile = $banner->image;

            $filePath = $request->file('image')->store('banners', 'public');

            $fields['image'] = $filePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $banner->update($fields);

        return redirect()->back()->with("success", "La bannière a été modifiée avec succès");
    }

    public function destroy(Banner $banner): RedirectResponse
    {
        if (Storage::disk("public")->exists($banner->image)) {
            Storage::disk("public")->delete($banner->image);
        }

        $banner->delete();

        return redirect()->back()->with('success', 'La bannière a bien été retirée');
    }
}
