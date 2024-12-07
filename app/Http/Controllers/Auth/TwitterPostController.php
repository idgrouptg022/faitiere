<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\TwitterPostRequest;
use App\Models\TwitterPost;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TwitterPostController extends Controller
{
    public function index(): View
    {
        $twitter_posts = TwitterPost::latest()->get();

        return view("auths.twitter_post", compact("twitter_posts"));
    }

    public function store(TwitterPostRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        TwitterPost::create($fields);

        return redirect()->back()->withSuccess("Le post twitter a été enregistré avec succès.");
    }

    public function update(TwitterPostRequest $request, TwitterPost $twitterPost): RedirectResponse
    {
        $fields = $request->validated();

        $twitterPost->update($fields);

        return redirect()->back()->withSuccess("Le post twitter a été modifié avec succès.");
    }

    public function destroy(TwitterPost $twitterPost): RedirectResponse
    {
        $twitterPost->delete();

        return redirect()->back()->withSuccess("Le post twitter a été supprimé avec succès.");
    }
}
