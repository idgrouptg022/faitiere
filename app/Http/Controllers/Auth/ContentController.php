<?php

namespace App\Http\Controllers\Auth;

use App\Enums\WordTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Models\Content;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function presentationView(): View
    {
        $content = Content::where("type", WordTypes::Presentation)->first();
        return view("auths.presentation", compact("content"));
    }

    public function presentationStore(ContentRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $fields["type"] = WordTypes::Presentation;

        Content::updateOrCreate(
            ["type" => WordTypes::Presentation],
            $fields
        );

        return redirect()->back()->with("success", "Présentation mise à jour avec succès");
    }

    public function presidentWordView(): View
    {
        $content = Content::where("type", WordTypes::PresidentWord)->first();

        return view("auths.president_word", compact("content"));
    }

    public function presidentWordStore(ContentRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        if ($request->hasFile("image")) {
            $filePath = $request->file('image')->store('president_words', 'public');

            $fields['image'] = $filePath;
        }

        $fields["type"] = WordTypes::PresidentWord;

        Content::updateOrCreate(
            ["type" => WordTypes::PresidentWord],
            $fields
        );

        return redirect()->back()->with("success", "Mot de la présidente mis à jour avec succès");
    }
}
