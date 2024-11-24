<?php

namespace App\Http\Controllers\Auth;

use App\Enums\WordTypes;
use App\Models\word;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\WordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index(): View
    {
        $words = Word::orderBy("id", "desc")->get();


        $words = word::where('type', WordTypes::PresidentWord)->get();



        return view("auths.word", compact("words"));
    }



    public function store(WordRequest $request)
    {
        $data = [
            "image" => $request->image,
            "body" => $request->body
        ];

        if (!$request->hasFile("image")) {
            return redirect()->back()->withErrors(['image' => "Veuillez saisir une image."]);
        }

        $fields = $request->validated();

        $filePath = $request->file('image')->store('banners', 'public');

        $fields['image'] = $filePath;

    }

    // public function update(WordRequest $request, Word $word): RedirectResponse
    // {

    // }

    // public function destroy(Word $word): RedirectResponse
    // {

    // }
}
