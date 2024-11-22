<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function home(): View
    {
        return view("guests.home");
    }

    public function historique(): View
    {
        return view("guests.historique");
    }

    public function role(): View
    {
        return view("guests.role");
    }

    public function statut(): View
    {
        return view("guests.statut");
    }

    public function organigramme(): View
    {
        return view("guests.organigramme");
    }

    public function presidentWord(): View
    {
        return view("guests.president-word");
    }

    public function partenaires(): View
    {
        return view("guests.partenaires");
    }

    public function contact(): View
    {
        return view("guests.contact");
    }

    //Decentralisation
    public function lois(): View
    {
        return view("guests.decentralisation.lois");
    }

    public function informations(): View
    {
        return view("guests.decentralisation.informations");
    }

    public function plaidoyers(): View
    {
        return view("guests.projets.plaidoyers");
    }

    public function projetsEnCours(): View
    {
        return view("guests.projets.en-cours");
    }

    public function projetsRealises(): View
    {
        return view("guests.projets.realises");
    }


    // Mediatheque
    public function ressources(): View
    {
        return view("guests.mediatheque.ressources");
    }

    public function rapportsAG(): View
    {
        return view("guests.mediatheque.rapports");
    }

    public function rapportsAnnuels(): View
    {
        return view("guests.mediatheque.rapports-an");
    }


    // Togo Map
    public function savanes(): View
    {
        $communes = [
            "Tandjouare" => [
                "Tandjouare 1",
                "Tandjouare 2",
            ],
            "Oti Sud" => [
                "Oti Sud 1",
                "Oti Sud 2",
            ],
            "Oti" => [
                "Oti 1",
                "Oti 2",
            ],
            "Kpendjal Ouest" => [
                "Kpendjal Ouest 1",
                "Kpendjal Ouest 2",
            ],
            "Kpendjal" => [
                "Kpendjal 1",
                "Kpendjal 2",
            ],
            "Tone" => [
                "Tône 1",
                "Tône 2",
                "Tône 3",
                "Tône 4",
            ],
            "Cinkasse" => [
                "Cinkassé 1",
                "Cinkassé 2",
            ],
    
        ];
        return view("guests.carte.savanes", compact("communes"));
    }

    public function kara(): View
    {
        $communes = [
            "Assoli" => [
                "Assoli 1",
                "Assoli 2",
                "Assoli 3",
            ],
            "Doufelgou" => [
                "Doufelgou 1",
                "Doufelgou 2",
                "Doufelgou 3",
            ],
            "Binah" => [
                "Binah 1",
                "Binah 2",
            ],
            "Kozah" => [
                "Kozah 1",
                "Kozah 2",
                "Kozah 3",
                "Kozah 4",
            ],
            "Dankpen" => [
                "Dankpen 1",
                "Dankpen 2",
                "Dankpen 3",
            ],
            "Bassar" => [
                "Bassar 1",
                "Bassar 2",
                "Bassar 3",
                "Bassar 4",
            ],
            "Keran" => [
                "Kéran 1",
                "Kéran 2",
                "Kéran 3",
            ],
        ];
        return view("guests.carte.kara", compact("communes"));
    }

    public function centrale(): View
    {
        $communes = [
            "Blitta" => [
                "Blitta 1",
                "Blitta 2",
                "Blitta 3",
            ],
            "Tchamba" => [
                "Tchamba 1",
                "Tchamba 2",
                "Tchamba 3",
            ],
            "Mo" => [
                "Mô 1",
                "Mô 2",
            ],
            "Sotubooua" => [
                "Sotouboua 1",
                "Sotouboua 2",
                "Sotouboua 3",
            ],
            "Tchaoudjo" => [
                "Tchaoudjo 1",
                "Tchaoudjo 2",
                "Tchaoudjo 3",
                "Tchaoudjo 4",
            ],
        ];

        return view("guests.carte.centrale", compact("communes"));
    }

    public function plateaux(): View
    {
        $communes = [
            "Haho" => [
                "Haho 1",
                "Haho 2",
                "Haho 3",
                "Haho 4",
            ],
            "Wawa" => [
                "Wawa 1",
                "Wawa 2",
                "Wawa 3",
            ],
            "Amou" => [
                "Amou 1",
                "Amou 2",
                "Amou 3",
            ],
            "Ogou" => [
                "Ogou 1",
                "Ogou 2",
                "Ogou 3",
                "Ogou 4",
            ],
            "Kloto" => [
                "Kloto 1",
                "Kloto 2",
                "Kloto 3",
            ],
            "Kpele" => [
                "Kpélé 1",
                "Kpélé 2",
            ],
            "Akebou" => [
                "Akébou 1",
                "Akébou 2",
            ],
            "Danyi" => [
                "Danyi 1",
                "Danyi 2",
            ],
            "Agou" => [
                "Agou 1",
                "Agou 2",
            ],
            "Moyen-Mono" => [
                "Moyen-Mono 1",
                "Moyen-Mono 2",
            ],
            "Est-Mono" => [
                "Est-Mono 1",
                "Est-Mono 2",
                "Est-Mono 3",
            ],
            "Anie" => [
                "Anié 1",
                "Anié 2",
            ],
        ];

        return view("guests.carte.plateau", compact("communes"));
    }
    
    public function maritime(): View
    {
        $communes = [
            "Golfe" => [
                "Golfe 1",
                "Golfe 2",
                "Golfe 3",
                "Golfe 4",
                "Golfe 5",
                "Golfe 6",
                "Golfe 7",
            ],
            "Agoe" => [
                "Agoè-Nyivé 1",
                "Agoè-Nyivé 2",
                "Agoè-Nyivé 3",
                "Agoè-Nyivé 4",
                "Agoè-Nyivé 5",
                "Agoè-Nyivé 6",
            ],
            "Zio" => [
                "Zio 1",
                "Zio 2",
                "Zio 3",
                "Zio 4",
            ],
            "Lacs" => [
                "Lacs 1",
                "Lacs 2",
                "Lacs 3",
                "Lacs 4",
            ],
            "Vo" => [
                "Vo 1",
                "Vo 2",
                "Vo 3",
                "Vo 4",
            ],
            "Yoto" => [
                "Yoto 1",
                "Yoto 2",
                "Yoto 3",
            ],
            "Bas-Mono" => [
                "Bas-Mono 1",
                "Bas-Mono 2",
            ],
            "Ave" => [
                "Avé 1",
                "Avé 2",
            ],
        ];

        return view("guests.carte.maritime", compact("communes"));
    }
}
