<?php

namespace App\Http\Controllers\Auth;

use App\Enums\AnnuaireFileType;
use App\Models\Commune;
use App\Models\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Annuaire;
use App\Models\AnnuaireFile;

class PlaquetteController extends Controller
{
    public function index(): View
    {
        $prefectures = Prefecture::all();
        return view("auths.annuaires.plaquettes.index", compact('prefectures'));
    }

    public function show(Commune $commune)//: View
    {
      
        if ($commune == null || !$commune instanceof Commune) abort(404);


        $annuaireLogoFile =  null ;
        $annuaireBannerFile =  null;
        $annuaireDomaine1File =  null;
        $annuaireDomaine2File =  null;
        $annuaireDomaine3File =  null;
        $annuairePresentationFile =  null;
        $annuairePartnerFile =  null;


        $annuaire = Annuaire::where("commune_id", $commune->id)->first();
        $annuaireFilesByType = [];

        if($annuaire){

            $annuaireFiles = AnnuaireFile::where("annuaire_id", $annuaire->id)->get();

            foreach (AnnuaireFileType::cases() as $type) {
            $annuaireFilesByType[$type->value] = $annuaireFiles->where('type', $type->value)
                ;
                }
                $annuaireLogoFile = $annuaireFilesByType['logo']->first() ?? null ;
                $annuaireBannerFile = $annuaireFilesByType['banner']->first() ?? null;
                $annuaireDomaine1File = $annuaireFilesByType['domaine_prior1']->first() ?? null;
                $annuaireDomaine2File = $annuaireFilesByType['domaine_prior2']->first() ?? null;
                $annuaireDomaine3File = $annuaireFilesByType['domaine_prior3']->first() ?? null;
                $annuairePresentationFile = $annuaireFilesByType['presentation']->first() ?? null;
                $annuairePartnerFile = $annuaireFilesByType['partner']->first() ?? null;


        }



        // $annuaireLogoFile = AnnuaireFile::where('annuaire_id', $annuaire->id)
        //                 ->where('type', AnnuaireFileType::Logo->value)
        //                 ->first();

        return view("auths.annuaires.plaquettes.show", compact( 'annuaire', 'commune', 'annuaireLogoFile', 'annuaireBannerFile', 'annuaireDomaine1File', 'annuaireDomaine2File', 'annuaireDomaine3File', 'annuairePresentationFile', 'annuairePartnerFile'));
    }
}
