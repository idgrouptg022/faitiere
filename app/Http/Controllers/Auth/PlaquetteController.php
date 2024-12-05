<?php

namespace App\Http\Controllers\Auth;

use App\Models\Commune;
use App\Models\Annuaire;
use App\Models\Prefecture;
use App\Models\AnnuaireFile;
use Illuminate\Http\Request;
use App\Enums\AnnuaireFileType;
use App\Models\AnnuaireResponsable;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Enums\AnnuaireResponsabletypes;

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
        $annuairePresentation1File =  null;
        $annuairePresentation2File =  null;
        $annuairePresentation3File =  null;
        $annuairePresentation4File =  null;
        $annuairePartnerFile =  null;
        $annuaireResponsableMaire =  null;
        $annuaireResponsableAdjoint1 = null;
        $annuaireResponsableAdjoint2 = null;
        $partners = [];


        $annuaire = Annuaire::where("commune_id", $commune->id)->first();

        $annuaireFilesByType = [];

        if($annuaire) {

            $annuaireFiles = AnnuaireFile::where("annuaire_id", $annuaire->id)->get();

            foreach (AnnuaireFileType::cases() as $type) {
                $annuaireFilesByType[$type->value] = $annuaireFiles->where('type', $type->value);
            }

            $annuaireLogoFile = $annuaireFilesByType['logo']->first() ?? null ;

            $annuaireBannerFile = $annuaireFilesByType['banner']->first() ?? null;

            $annuaireDomaine1File = $annuaireFilesByType['domaine_prior1']->first() ?? null;

            $annuaireDomaine2File = $annuaireFilesByType['domaine_prior2']->first() ?? null;

            $annuaireDomaine3File = $annuaireFilesByType['domaine_prior3']->first() ?? null;

            $annuairePresentation1File = $annuaireFilesByType['presentation1']->first() ?? null;

            $annuairePresentation2File = $annuaireFilesByType['presentation2']->first() ?? null;

            $annuairePresentation3File = $annuaireFilesByType['presentation3']->first() ?? null;

            $annuairePresentation4File = $annuaireFilesByType['presentation4']->first() ?? null;

            $annuairePartnerFile = $annuaireFilesByType['partner']->first() ?? null;

            $annuaireResponsableMaire = AnnuaireResponsable::where([
                ["annuaire_id", $annuaire->id],
                ["type", AnnuaireResponsabletypes::Maire]
            ])->first();

            $annuaireResponsableAdjoint1 = AnnuaireResponsable::where([
                ["annuaire_id", $annuaire->id],
                ["type", AnnuaireResponsableTypes::Adjoint1]
            ])->first();

            $annuaireResponsableAdjoint2 = AnnuaireResponsable::where([
                ["annuaire_id", $annuaire->id],
                ["type", AnnuaireResponsableTypes::Adjoint2]
            ])->first();

            $partners = AnnuaireFile::where([
                ["annuaire_id", "=", $annuaire->id],
                ["type", AnnuaireFileType::Partner]
            ])->get();
        }

        return view("auths.annuaires.plaquettes.show", compact(
            'annuaire', 'commune', 'annuaireLogoFile', 'annuaireBannerFile',
            'annuaireDomaine1File', 'annuaireDomaine2File', 'annuaireDomaine3File', 'annuairePartnerFile',
            'annuaireResponsableMaire', 'annuaireResponsableAdjoint1', 'annuaireResponsableAdjoint2',
            'annuairePresentation1File', 'annuairePresentation2File', 'annuairePresentation3File', 'annuairePresentation4File',
            'partners'
        ));
    }
}
