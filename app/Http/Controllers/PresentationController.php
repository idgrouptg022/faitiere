<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PresentationWordRequest;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class PresentationController extends Controller
{
    public function index()
    {
        return view('auths.presentation');
    }

    public function updatePresentation(PresentationWordRequest $request)
    {
        $image = $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null;
        $data = [
            'body' => $request->body,
            'type' => $request->type,
            'image' => $image,
        ];

        try{
            $words = DB::table('words')->updateOrInsert(
                ['type' => 'presentation'],
                ['body' => $data['body'], 'image' => $data['image']],
            );
            return back()->with('success', 'La présentation à été ajouter avec succès.');
        }catch(Throwable $th){
            return back()->with('error', 'Une erreur est survenue lors de l\'enrégistrement des données.');
        }
    }
}
