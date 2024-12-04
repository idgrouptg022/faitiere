<?php

namespace App\Http\Controllers\Auth;

use App\Enums\AnnuaireResponsableTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnnuaireResponsableRequest;
use App\Models\Annuaire;
use App\Models\AnnuaireResponsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnnuaireResponsableController extends Controller
{
    public function index()
    {
        return view("");
    }
    public function createResponsables(AnnuaireResponsableRequest $request, Annuaire $annuaire): RedirectResponse
    {
        $fields = $request->validated();
        $fields["annuaire_id"] = $annuaire->id;
       
            // $request->hasFile("image_maire") ? $maireFile = $request->file->store("AnnuaireResponsables", "public") : $maireFile = null;
            if ($request->hasFile('image_maire')) {
                $maireFile = $request->file('image_maire')->store('AnnuaireResponsables', 'public');
            } else {
                $maireFile = null;
            }
            if ($request->hasFile('image_adjoint1')) {
                $adjoint1File = $request->file('image_maire')->store('AnnuaireResponsables', 'public');
            } else {
                $adjoint1File = null;
            }
            if ($request->hasFile('image_adjoint2')) {
                $adjoint2File = $request->file('image_maire')->store('AnnuaireResponsables', 'public');
            } else {
                $adjoint2File = null;
            }
            
        
       
            // $request->hasFile("image_adjoint1") ? $adjoint1File = $request->file->store("AnnuaireResponsables", "public") : $adjoint1File = null;
        
       
            // $request->hasFile("image_adjoint2") ? $adjoint2File = $request->file->store("AnnuaireResponsables", "public") : $adjoint2File = null;
        
        

        if($fields['maire']){
            AnnuaireResponsable::updateOrCreate(
                [
                'annuaire_id' => $annuaire->id,
                'type' => AnnuaireResponsableTypes::Maire,
            ],
            [
                'annuaire_id' => $annuaire->id,
                'name' => $fields['maire'],
                'type' => AnnuaireResponsableTypes::Maire,
                'file' => $maireFile
            ]
        );
    }
    if($fields['adjoint1']){
        AnnuaireResponsable::updateOrCreate([
            'annuaire_id' => $annuaire->id,
            'type' => AnnuaireResponsableTypes::Adjoint1,
            ],
            [
                'annuaire_id' => $annuaire->id,
                'name' => $fields['adjoint1'],
                'type' => AnnuaireResponsableTypes::Adjoint1,
                'file' => $adjoint1File
            ]
        );
    }
    if($fields['adjoint2']){
            AnnuaireResponsable::updateOrCreate([
                'annuaire_id' => $annuaire->id,
                'type' => AnnuaireResponsableTypes::Adjoint2,
            ],
            [
                'annuaire_id' => $annuaire->id,
                'name' => $fields['adjoint2'],
                'type' => AnnuaireResponsableTypes::Adjoint2,
                'file' => $adjoint2File
            ]
        );
    }
    return back()->with('success','Les informations ont été enrégistrés avec succès.');

        
    }
}
